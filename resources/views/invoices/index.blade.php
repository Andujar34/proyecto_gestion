@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
   <main style="height:80%;">
   
    
    <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
    <a href="/invoices/add" class="btn btn-primary" style="width:15%;font-size:0.7em">Crear una Factura</a>
    @if(count($services_customers)>0)
    <table class="table" style="font-size:0.7em">
            <thead class='thead-dark'>
                <tr>
                    <th scope="col" style="text-align: center">NºFactura</th>
                    <th scope="col" style="text-align: center">Cliente</th>
                    <th scope="col" style="text-align: center">Fecha</th>
                    <th scope="col" style="text-align: center">Importe</th>
                    <th scope="col" style="text-align: center">Acciones</th>
                </tr>
            </thead>
            <tbody>
        @foreach($services_customers as $service_customer)
                <tr style="background:white;">
                    <td scope="row" style="background:whitesmoke;text-align: center">
                   {{$service_customer->id_customer_service_user}}
                    </td>
                    <td style="background:whitesmoke;text-align: center">{{$service_customer->customer}}</td>
                    <td style="background:whitesmoke;text-align: center">{{$service_customer->date}}</td>
                    <td style="background:whitesmoke;text-align: center">{{$service_customer->importe}}</td>
                    <td style="background:whitesmoke;text-align: center">
                            <div class="dropdown"  style="width: 100%">
                                    
                                            <button style="font-size:0.7em" class="btn btn-primary" onclick="window.location.href='{{route('invoices.edit', $service_customer->id_customer_service_user) }}'" >Editar</button>
                                            <button  style="font-size:0.7em"class="btn btn-primary" onclick="window.location.href='#'" data-toggle="modal" data-target="#divConfirmDelete{{$service_customer->id_customer_service_user}}" >Borrar</button>
                                            <button  style="font-size:0.7em"class="btn btn-primary" onclick="window.location.href='{{ route('invoice.pdf', $service_customer->id_customer_service_user) }}'"  >Exportar</button>
                                    </div>
                            </div>
                    </td>
                    </tr>
                    <div id="divConfirmDelete{{$service_customer->id_customer_service_user}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                    <h4 class="modal-title">Eliminar Factura</h4>
                                <button type="button"class="close" data-dismiss="modal">&times;</button>
                                
                            </div>
                            <div class="modal-body">
                                <p>
                                    ¿Desea eliminar la factura?
                                </p>
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-primary btnRunners" onclick="window.location.href='{{ route('invoices.delete', $service_customer->id_customer_service_user) }}'" data-dismiss="modal">Aceptar</button>
                                    <button type="button" class="btn btn-primary btnRunners" data-dismiss="modal">Cancelar</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </tr>
        @endforeach
    </table>
    <div style="margin: 0 auto";>
            {!! $services_customers->render(); !!}
    </div>
    <a href="{{ route('invoices.pdf') }}" class="btn btn-sm btn-primary" style="font-size: 0.8em">
            Descargar Facturas en PDF
        </a>
    @else
   <span style="margin-top:4%">No tiene ninguna factura creada, puede <a href="/invoices/add">crear una factura</a></span>
    @endif
    </section>
    
    </main>

@endsection