<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Providers;
use App\Models\Services;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ProductsController extends Controller{
    public function index(Request $request){
        return view('products.index')->with('products',Products::where('id_user',Auth::user()->id)->where('active','1')->paginate(10));
    }
    public function addProduct(){
        return view('products.add')->with('providers',Providers::where('id_user',Auth::user()->id)->where('active','1')->orderBy('name')->pluck('name','id'));
    }
    public function storeProduct(ProductsRequest $request){
        $product = Products::create($this->dataProduct($request));
        $product->provider_id = $request->provider;
        $product->save();
        return redirect()->route('products');
    }
    public function editProduct($id){
        return view('products.edit')->with('product',Products::find($id))->with('providers',Providers::where('id_user',Auth::user()->id)->orderBy('name')->pluck('name','id')->all());
    }
    public function updateProduct(ProductsRequest $request, $id){
        $product = Products::where('id',$id)->get()->first();
        $product->update($this->dataUpdateProduct($request));
        $product->provider_id = $request->provider;
        $product->save();
        return redirect()->route('products',$id);
    }
    public function deleteProduct($id){
        $product = Products::find($id);
        try{
            $product->active = '0';
            $product->save();
            $this->desactiveServices($id);
            $messageDelete = 'El producto ha sido borrado';
        }catch(\Exception $e){
            $messageDelete = 'Hubo un error al borrar el producto';
        }
        return redirect()->route('products',compact('messageDelete'));
    }
    public function pdf(){
        $products = Products::where('id_user',Auth::user()->id)->get();
        $pdf = PDF::loadView('products.pdf.products',compact('products'));
        return $pdf->download('listado_productos.pdf');
    }
    public function pdfProduct($id){
        $product = Products::where('id',$id)->get()->first();
        $product->name_providers = Providers::where('id',$product->provider_id)->get()->first()->name;
        $pdf = PDF::loadView('products.pdf.product',compact('product'));
        return $pdf->download('ficha_productos.pdf');
    }
    private function dataProduct($request){
        return  [
            'name' => $request->name,
            'price' => $request->price,
            'description'=>$request->description,
            'id_user'=>Auth::user()->id,
            'id_product_user'=>$this->numProductUser($request),
            'active'=>'1',
        ];
    }
    private function dataUpdateProduct($request){
        return  [
            'name' => $request->name,
            'price' => $request->price,
            'description'=>$request->description
        ];
    }
    private function numProductUser($request){
        return Auth::user()->products()->max('id_product_user')+1;
    }
    private function desactiveServices($id){
        $products = Auth::user()->products()->with('services')->where('id',$id)->get();
        $services_ids = [];
        foreach($products as $product){
            $services_ids =array_merge($services_ids,$product->services->pluck('id')->toArray());
        }
        Services::whereIn('id',$services_ids)->update(['active'=>0]);
    
    }
}
