<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use App\Models\Providers;
use App\User;
use App\Models\Products;
use App\Models\Services;
use App\Http\Requests\ProvidersRequest;
use Barryvdh\DomPDF\Facade as PDF;

class ProvidersController extends Controller
{
    public function __construct(){
    }
    public function index(Request $request){
       return view('providers.index')->with('providers',Providers::where('id_user',Auth::user()->id)->where('active','1')->paginate(10));
    }
    public function addProvider(){
        return view('providers.add');
    }
    public function storeProvider(ProvidersRequest $request){
        Providers::create($this->dataProvider($request));
        return redirect()->route('providers');
    }
    public function editProvider($id){
        return view('providers.edit')->with('provider',Providers::where('id',$id)->first());
    }
    public function updateProvider(ProvidersRequest $request,$id){
        Providers::where('id',$id)->update($this->dataUpdateProvider($request));
        return redirect()->route('providers',$id);
    }
    public function deleteProvider($id){
        $provider = Providers::find($id);
        try{
            $provider->active = '0';
            $provider->save();
            $this->desactiveProductsServices($id);
            $messageDelete = 'El proveedor ha sido borrado';
            
        }catch(\Exception $e){
            $messageDelete = 'Hubo un error al borrar el proveedor';
        }
        return redirect()->route('providers',compact('messageDelete'));
    }
    public function pdf(){
        $providers = Providers::where('id_user',Auth::user()->id)->get();
        $pdf = PDF::loadView('providers.pdf.providers',compact('providers'));
        return $pdf->download('listado_proveedores.pdf');
    }
    public function pdfProvider($id){
        $provider = Providers::where('id',$id)->get()->first();
        $pdf = PDF::loadView('providers.pdf.provider',compact('provider'));
        return $pdf->download('ficha_proveedor.pdf');
    }
    private function dataProvider($request){
        return  [
            'name' => $request->name,
            'address' => $request->address,
            'CIF' => $request->CIF,
            'phone' => $request->phone,
            'cc' => $request->cc,
            'id_user'=>Auth::user()->id,
            'id_provider_user'=>$this->numProviderUser($request),
            'active'=>'1'
        ];
    }
    private function dataUpdateProvider($request){
        return  [
            'name' => $request->name,
            'address' => $request->address,
            'CIF' => $request->CIF,
            'phone' => $request->phone,
            'cc' => $request->cc,
        ];
    }
    private function numProviderUser($request){
        return Auth::user()->providers()->max('id_provider_user')+1;  
    }
    private function desactiveProductsServices($id){
        $products = Auth::user()->products()->with('services')->where('provider_id',$id)->get();
        Auth::user()->products()->where('provider_id',$id)->update(['active'=>0]);
        $services_ids = [];
        foreach($products as $product){
            $services_ids =array_merge($services_ids,$product->services->pluck('id')->toArray());
        }
        Services::whereIn('id',$services_ids)->update(['active'=>0]);
    }
}

