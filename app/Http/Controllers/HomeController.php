<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mailgun\Mailgun;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inicio');
    }
    public function contact(){
        return view('contact');
    }
    public function legal(){
        return view('legal');
    }
    public function welcome(){
        return view('welcome');
    }
    public function correo(Request $request){
        return $request->all();
    }
    public function sendMail(){
        $mgClient = new Mailgun('bc6d6827dcfd0e63277525369fed00f2-b892f62e-4466cf03');
        $domain = 'sandboxd9eb53bc44e14e10b56d52e113e55e32.mailgun.org';

        $result = $mgClient->sendMessage($domain,array(
            'from'=> 'javi.noguera@icloud.com',
            'to'=>'javiernoguerapm@gmail.com',
            'subject'=>'Hola amigo',
            'text'=>'Este  es un correo d epruea'
        ));
        return 'finalizado';
    }
}
