<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CustomersRequest;
use Barryvdh\DomPDF\Facade as PDF;

class CustomersController extends Controller
{
   
    public function index(Request $request){
        return view('customers.index')->with('customers',Customers::where('id_user',Auth::user()->id)->where('active','1')->paginate(10));
    }
    public function addCustomer(){
        return view('customers.add');
    }
    public function storeCustomer(CustomersRequest $request){
        Customers::create($this->dataCreateCustomer($request));
        return redirect()->route('customers');
    }
    public function editCustomer($id){
        return view('customers.edit')->with('customer',Customers::where('id',$id)->first());
    }
    public function updateCustomer(CustomersRequest $request, $id){
        Customers::where('id',$id)->update($this->dataUpdateCustomer($request));
        return redirect()->route('customers',$id);
    }
    public function deleteCustomer($id){
        $customer = Customers::find($id);
        $messageDelete = 'No existe el cliente';
        if($customer->id){
            $customer->active = '0';
            $customer->save();
            $messageDelete = 'El cliente ha sido borrado';
        } 
        return redirect()->route('customers',compact('messageDelete'));
    }
    public function pdf(){
        $customers = Customers::where('id_user',Auth::user()->id)->get();
        $pdf = PDF::loadView('customers.pdf.customers',compact('customers'));
        return $pdf->download('listado_clientes.pdf');
    }
    public function pdfCustomer($id){
        $customer = Customers::where('id',$id)->get()->first();
        $pdf = PDF:: loadView('customers.pdf.customer',compact('customer'));
        return $pdf->download('ficha_cliente.pdf');
    }
    private function dataCreateCustomer($request){
       return  [
            'name' => $request->name,
            'surname' => $request->surname,
            'address' => $request->address,
            'CIF' => $request->CIF,
            'phone' => $request->phone,
            'cc' => $request->cc,
            'id_user'=> Auth::user()->id,
            'id_customer_user'=>$this->numCustomerUser($request),
            'active'=>'1'
        ];
    }
    private function dataUpdateCustomer($request){
        return  [
            'name' => $request->name,
            'surname' => $request->surname,
            'address' => $request->address,
            'CIF' => $request->CIF,
            'phone' => $request->phone,
            'cc' => $request->cc,
        ];
    }
    private function numCustomerUser($request){
        return Auth::user()->customers()->max('id_customer_user')+1;
    }
}
