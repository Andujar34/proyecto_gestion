<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
class AccountingController extends Controller
{
    public function index(Request $request){
        $invoices = $this->createAccounting($request);
        return view('accounting.index',compact('invoices'));
    }
    public function pdf(Request $request){
        $invoices = $this->createAccounting($request);
        $pdf = PDF::loadView('accounting.pdf.accounting',compact('invoices'));
        return $pdf->download('listado_resultado_cuentas.pdf');
    }
    private function createAccounting($request){
        $services_customers = Auth::user()->customers()->has('services')->with('services')->get();
        $invoices =array();
        foreach($services_customers as $service_customer){
            foreach($service_customer->services as $aux){
                $price = $aux->price * $aux->pivot->amount*1.21;
                $date = $this->transformDate($aux->pivot->date);
                $trimester = $this->getTrimester($date);
                try{
                    $invoices[$date[2]][$trimester] += $price;
                }catch(\Exception $e){
                    $invoices[$date[2]][$trimester] = $price;
                }
                
            }
        }
        return $invoices;
    }
    private function transformDate($date){
        return explode('/',$date,3);
    }
    private function getTrimester($date){
        if($date[1]<4){
            return 'primer';
        }
        if($date[1]>3 && $date[1]<7 ){
                return 'segundo';
        }
        if($date[1]>6 && $date[1]<10 ){
            return 'tercer';
        }
        return 'cuarto';
      
    }
}
