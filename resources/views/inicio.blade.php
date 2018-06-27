@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
<main style="height:80%">
        <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
                <div class="panel-body" style="margin-top:2%">
                        <div class="col-12">
                            <div class="panel-title card-header"><h5 style="text-align:justify;font-weight:bold;font-size:1.2em;">Bienvenido {{Auth::user()->name}},</h5></div>
                            <p style="text-align:justify">
                                Te agradecemos tu confianza {{Auth::user()->name}} depositada en nuestra empresa para gestionar
                                tu empresa. Actualmente estamos trabajando para mejorar nuestro producto y poder aumentar las funcionalidades
                                que tiene nuestra aplicacion para que podamos seguir creciendo a la vez que crecen nuestros clientes. Nuestro 
                                mayor deseo es que tu empresa crezca y mejore como nosotros intentamos mejorar.
                            </p>
                        </div>
                        <div class="col-12">
                                <div class="panel-title card-header"><h5 style="text-align:justify;font-weight:bold;font-size:1.2em;">Gestiona tu Facturación</h5></div>
                                    <div class="row">
                                        <div class="col-7">
                                                <p style="text-align:justify">
                                                        Te agradecemos tu confianza {{Auth::user()->name}} depositada en nuestra empresa para gestionar
                                                        tu empresa. Actualmente estamos trabajando para mejorar nuestro producto y poder aumentar las funcionalidades
                                                        que tiene nuestra aplicacion para que podamos seguir creciendo a la vez que crecen nuestros clientes. Nuestro 
                                                        mayor deseo es que tu empresa crezca y mejore como nosotros intentamos mejorar.
                                                </p>
                                        </div>
                                        <div class="col-3" style="margin-left:5%;">
                                                <img src="/images/example_factura.jpg"  width="100%" height="100%">
                                        </div>
                                    </div>
                            </div>
                </div>
        </section>
</main>    
@endsection