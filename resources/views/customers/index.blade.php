@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
   <main style="height:80%;">
   
    
    <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
    <a href="/customers/add" class="btn btn-primary" style="width:15%;font-size:0.7em">Crear un Cliente</a>
    @if(count($customers)>0)
    <table class="table" style="font-size:0.7em">
        <thead class='thead-dark'>
            <tr>
                <th scope="col" style="text-align: center">ID</th>
                <th scope="col" style="text-align: center">Nombre</th>
                <th scope="col" style="text-align: center">Apellidos</th>
                <th scope="col" style="text-align: center">DNI/CIF</th>
                <th scope="col" style="text-align: center">Dirección</th>
                <th scope="col" style="text-align: center">Teléfono</th>
                <th scope="col" style="text-align: center">CC</th>
                <th scope="col" style="text-align: center">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
        <tr style="background:white;">
            <td scope="row" style="background:whitesmoke;text-align: center">
            {{ $customer->id_customer_user }}
            </td>
            <td style="background:whitesmoke;text-align: center">{{ $customer->name }}</td>
            <td style="background:whitesmoke;text-align: center">{{ $customer->surname }}</td>
            <td style="background:whitesmoke;text-align: center">{{ $customer->address }}</td>
            <td style="background:whitesmoke;text-align: center">{{ $customer->CIF }}</td>
            <td style="background:whitesmoke;text-align: center">{{ $customer->phone }}</td>
            <td style="background:whitesmoke;text-align: center">{{ $customer->cc }}</td>
            <td style="background:whitesmoke;text-align: center">
                    <div class="dropdown" style="width: 100%">
                            <button style="font-size:0.7em" class="btn btn-primary" onclick="window.location.href='{{route('customers.edit', $customer->id) }}'" >Editar</button>
                            <button style="font-size:0.7em" class="btn btn-primary" onclick="window.location.href='#'" data-toggle="modal" data-target="#divConfirmDelete{{$customer->id}}" >Borrar</button>
                            <button style="font-size:0.7em" class="btn btn-primary" onclick="window.location.href='{{route('customer.pdf',$customer->id)}}'" >Exportar</button>   
                        </div>
            </td>
        </tr>
        <div id="divConfirmDelete{{$customer->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                            <h4 class="modal-title">Eliminar Cliente</h4>
                        <button type="button"class="close" data-dismiss="modal">&times;</button>
                       
                    </div>
                    <div class="modal-body">
                        <p>
                            ¿Desea eliminar al Cliente?
                        </p>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-primary btnRunners" onclick="window.location.href='{{ route('customers.delete', $customer->id) }}'" data-dismiss="modal">Aceptar</button>
                            <button type="button" class="btn btn-primary btnRunners" data-dismiss="modal">Cancelar</button>
                        </div>
                </div>
            </div>
        </div>
        @endforeach
        </tbody>
    
    </table>
    
    <div style="margin: 0 auto";>
        {!! $customers->render(); !!}
    </div>
    <a href="{{ route('customers.pdf') }}" class="btn btn-sm btn-primary" style="font-size:0.8em">
            Descargar Clientes en PDF
        </a>
   </section>
   @else
   <span style="margin-top:4%">No tiene ningun cliente creado, puede <a href="/customers/add">crear un cliente</a></span>
    @endif
    </main>
    
@endsection