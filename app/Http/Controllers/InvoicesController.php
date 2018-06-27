<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;
use App\Models\Customers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Services;
use App\Users;
use App\Http\Request\InvoicesRequest;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class InvoicesController extends Controller{
    public function index(Request $request){
        $services_customers = $this->createInvoices();
        return view('invoices.index',compact('services_customers'));
    }
    public function addInvoice(Request $request){

        $customers = Customers::where('id_user',Auth::user()->id)->orderBy('name','asc')->pluck('name','id')->all();
        $services_select = Services::where('id_user',Auth::user()->id)->orderBy('name','asc')->pluck('name','id')->all();
        $numFactura = $this->numInvoiceUser($request);
        return view('invoices.add',compact('services_select','customers','numFactura'));
    }
    public function storeInvoice(Request $request){
       $customer = Customers::find($request->customer_id);
        $services = json_decode($request->invisible,true);
        foreach($services as $key =>$value ){
            if($value !== null){
                $customer->services()->attach(
                    [$key => [ 'id_customer_service_user' => $request->numInvoice,
                                 'amount' => $value,
                                 'date' => $request->date,
                                 'id_user' => Auth::user()->id]]
                  );
            }
        }
        return redirect()->route('invoices'); 
    }
    public function editInvoice($id){
        $services_select = Services::where('id_user',Auth::user()->id)->orderBy('name','asc')->pluck('name','id')->all();
      
        $servs = $services_select;
        $invoices = DB::table('customers_services')->select('id','service_id','customer_id','id_user','id_customer_service_user','amount','date')->where('id_customer_service_user',$id)->where('id_user',Auth::user()->id)->get();
        $invoice = [];
        foreach($invoices as $invo){
            $service = Services::find($invo->service_id);
            $invoice[] = [
                'id'=>$invo->id,
                'id_usarer'=>$invo->id_user,
                'id_customer_service_user'=>$invo->id_customer_service_user,
                'name'=> $service->name,
                'amount'=>$invo->amount,
                'date'=>$invo->date,
                'id_customer'=>$invo->customer_id,
                'id_service'=>$invo->service_id
            ];
            foreach($services_select as $servi_seleKey => $servi_selecValue){
                if($servi_seleKey === $invo->service_id){
                    unset($servs[$servi_seleKey]);
                }
            }
        }
        $services_select = $servs;
        $customer = Customers::find($invoice[0]['id_customer']);
        $customers = Customers::where('id_user',Auth::user()->id)->orderBy('name','asc')->pluck('name','id')->all();
        $numFactura = $invoice[0]['id_customer_service_user'];
        $services = Services::all();
        return view('invoices.edit',compact('invoices','customer','customers','numFactura','services_select','services','invoice'));
    }
    public function updateInvoice(Request $request,$id){
        $customer = Customers::find($request->customer_id);
        $validator = $this->validateInvoice($request);
        if($validator->fails()){
            $services_select = Services::where('id_user',Auth::user()->id)->orderBy('name','asc')->pluck('name','id')->all();
      
            $servs = $services_select;
            $invoices = DB::table('customers_services')->select('id','service_id','customer_id','id_user','id_customer_service_user','amount','date')->where('id_customer_service_user',$id)->where('id_user',Auth::user()->id)->get();
            $invoice = [];
            foreach($invoices as $invo){
                $service = Services::find($invo->service_id);
                $invoice[] = [
                    'id'=>$invo->id,
                    'id_user'=>$invo->id_user,
                    'id_customer_service_user'=>$invo->id_customer_service_user,
                    'name'=> $service->name,
                    'amount'=>$invo->amount,
                    'date'=>$invo->date,
                    'id_customer'=>$invo->customer_id,
                    'id_service'=>$invo->service_id
                ];
                foreach($services_select as $servi_seleKey => $servi_selecValue){
                    if($servi_seleKey === $invo->service_id){
                        unset($servs[$servi_seleKey]);
                    }
                }
            }
            $services_select = $servs;
            $customer = Customers::find($invoice[0]['id_customer']);
            $customers = Customers::where('id_user',Auth::user()->id)->orderBy('name','asc')->pluck('name','id')->all();
            $numFactura = $invoice[0]['id_customer_service_user'];
            $services = Services::all();
            return view('invoices.edit',compact('errors','invoices','customer','customers','numFactura','services_select','services','invoice'));
        }
        $services_old = json_decode($request->invisible_old,true);
        foreach($services_old as $key => $value){
            if($value !== null){
                $customer->services()->detach($key);
            }
        }
        $services = json_decode($request->invisible,true);
        foreach($services as $key => $value){
            if($value !== null){
                $customer->services()->attach(
                    [$key => [
                        'id_customer_service_user'=>$request->numInvoice,
                        'amount'=>$value,
                        'date'=>$request->date,
                        'id_user'=>Auth::user()->id
                    ]]);
            }
        }

        return redirect()->route('invoices'); 
    }
    public function deleteInvoice($id){
        $invoices = DB::table('customers_services')->select('id')->where('id_customer_service_user',$id)->where('id_user',Auth::user()->id)->get();
        $messageDelete = 'No existe la factura';
        if($invoices){
            foreach($invoices as $invoice){
                DB::table('customers_services')->where('id',$invoice->id)->delete();
                $messageDelete = 'La factura ha sido borrado';
            }
        } 
        return redirect()->route('invoices',compact('messageDelete'));
    }
    public function pdf(){
        $services_customers = $this->createInvoices();
        $pdf = PDF::loadView('invoices.pdf.invoices',compact('services_customers'));
        return $pdf->download('listado_facturas.pdf');
    }
    public function pdfInvoice($id){
        $invoices = DB::table('customers_services')->select('id','service_id','customer_id','id_user','id_customer_service_user','amount','date')->where('id_customer_service_user',$id)->where('id_user',Auth::user()->id)->get();
        $invoice = [];
        foreach($invoices as $invo){
            $service = Services::find($invo->service_id);
            $invoice[] = [
                'id'=>$invo->id,
                'id_user'=>$invo->id_user,
                'id_customer_service_user'=>$invo->id_customer_service_user,
                'name'=> $service->name,
                'amount'=>$invo->amount,
                'date'=>$invo->date,
                'id_customer'=>$invo->customer_id,
                'id_service'=>$invo->service_id,
                'price'=>$service->price
            ];
        }
       
        $customer = Customers::where('id',$invoice[0]['id_customer'])->get()->first();
        $numFactura = $invoice[0]['id_customer_service_user'];
        $services = Services::all();
        $pdf = PDF::loadview('invoices.pdf.invoice', compact('invoices','customer','numFactura','services','invoice'));
        return $pdf->download('factura.pdf');
    }
    private function createInvoices(){
        $services_customers = DB::table('customers_services')->select('id_customer_service_user')->where('id_user',Auth::user()->id)->groupBy('id_customer_service_user')->paginate(10);
        foreach($services_customers as $service_customer){
            $tuplas = DB::table('customers_services')->where('id_customer_service_user',$service_customer->id_customer_service_user)->get();
            $importe = 0;
            foreach($tuplas as $tupla){
                $service_price = DB::table('services')->select('price')->where('id',$tupla->service_id)->get()->first()->price;
                $importe += ($tupla->amount * $service_price);
            }
            $service_customer->importe = ($importe/1000)*1.21;
            $data = DB::table('customers_services')->where('id_customer_service_user',$service_customer->id_customer_service_user)->get()->first();
            $service_customer->date = $data->date;
            $service_customer->customer = DB::table('customers')->select('name')->where('id',$data->customer_id)->get()->first()->name;
        }
        return $services_customers;
    }
    
    private function validateInvoice($request){
        return Validator::make($request->all(),[
            'date'=>'required',
            'invisible'=>'required',
            'customer_id'=>'required',
            'numInvoice'=>'required'
        ]);
    }
    private function dataInvoice($request,$value,$user_id){
        return [
            'id_customer_service_user' => $request->numInvoice,
            'amount' => $value,
            'date'=>Carbon::createFromFormat('d/m/Y', $request->date)->toDateTimeString(),
            'id_user' => $user_id
        ];
    }
    private function numInvoiceUser($request){
        return DB::table('customers_services')->where('id_user',Auth::user()->id)->max('id_customer_service_user') +1;   
    }
    private function dataUpdateInvoice($request,$value){
        return [
            'customer_id'=>$request->customer_id,
            'service_id'>$request->service_id,
            'amount'=>$value
        ];
    }

}
