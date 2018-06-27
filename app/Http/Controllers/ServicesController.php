<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ServicesRequest;
use Barryvdh\DomPDF\Facade as PDF;

class ServicesController extends Controller
{
    public function index(Request $request){
        $services = Services::where('id_user',Auth::user()->id)->where('active','1')->paginate(10);
        return view('services.index',compact('services'));
    }
    public function addService(){
        $products = Products::where('id_user',Auth::user()->id)->orderBy('name','asc')->pluck('name','id')->all();
        return view('services.add',compact('products'));
    }
    public function storeService(ServicesRequest $request){
    
        $service = Services::create($this->dataService($request));
        $services_products = json_decode($request->invisible,true);
        $num=$this->numServiceProductUser($request);
        foreach($services_products as $key => $value ){
            if($value !== null){
                $service->products()->attach(
                    [$key => ['id_product_service_user' => $num,
                                      'amount' =>$value,
                                      'id_user' => Auth::user()->id]]
                  );
            }
        }
        return redirect()->route('services');
    }
    public function editService($id){
        $service = Services::findOrFail($id);
        $productos_services = DB::table('products_services')->select('*')->where('service_id',$id)->get();
        $productos = Products::where('id_user',Auth::user()->id)->orderBy('name','asc')->pluck('name','id')->all();
        $products = $productos;
        $num=1;
        foreach($productos_services as $product_service){
            $products_services[]=array(
                'name'=>(Products::find($product_service->product_id))->name,
                'id'=>$product_service->product_id,
                'amount'=>$product_service->amount,
                'product'=>'products'.$num,
                'num'=>'amount'.$num,
                'cant'=>$num);
                $num++;
            foreach($productos as $productKey => $productValue){
                if($productKey === $product_service->product_id){
                    unset($products[$productKey]);
                }
            }
        }
        
        return view('services.edit',compact('service','products_services','products'));
    }
    public function updateService(ServicesRequest $request, $id){
      
        $service = Services::all()->where('id',$id)->first();
        $service->update($this->dataUpdateService($request));
        $service->save();
        $services_products = json_decode($request->invisible,true);
        $services_products_old = json_decode($request->invisible_old,true);

        foreach($services_products_old as $key => $value){
            if($value !==null){
                $service->products()->detach($key);
            }
        }
        $num=$this->numServiceProductUser($request);
        foreach($services_products as $key => $value ){
            if($value !== null){
                $service->products()->attach(
                    [$key => ['id_product_service_user' => $num,
                                      'amount' =>$value,
                                      'id_user' => Auth::user()->id]]
                  );
            }
        }

        return redirect()->route('services',[$service->id]);
   
    }
    public function deleteService($id){
        $service = Services::find($id);
        $messageDelete = 'No existe el servicio';
        if($service->id){
            $service->active = '0';
            $service->save();
            $messageDelete = 'El servicio ha sido borrado';
        } 
        return redirect()->route('services',compact('messageDelete'));
    }
    public function pdf(){
        $services = Services::where('id_user',Auth::user()->id)->get();
        $pdf = PDF::loadView('services.pdf.services',compact('services'));
        return $pdf->download('listado_servicios.pdf');
    }
    public function pdfService($id){
        $service = Auth::user()->services()->with('products')->where('id',$id)->get()->first();
        $pdf = PDF::loadView('services.pdf.service',compact('service')); 
        return $pdf->download('ficha_servicio.pdf');
    }
    private function dataService($request){
        return  [
            'name' => $request->name,
            'price' => $request->price,
            'description'=>$request->name,
            'id_user'=>Auth::user()->id,
            'id_service_user'=>$this->numServiceUser($request),
            'active'=>'1'
        ];
    }
    private function dataUpdateService($request){
        return  [
            'name' => $request->name,
            'price' => $request->price,
            'description'=>$request->name
        ];
    }
    private function numServiceUser($request){
        return Auth::user()->services()->max('id_service_user')+1;   
    }
    private function numServiceProductUser($request){
        return DB::table('products_services')->where('id_user',Auth::user()->id)->max('id_product_service_user') +1;
    }
}
