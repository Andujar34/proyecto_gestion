@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
   <main class="col-12" style="height:80%;">
   
    
    <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
    <a href="/services/add" class="btn btn-primary" style="width:15%;font-size:0.7em">Crear un Servicio</a>
    @if(count($services)>0)
    <table class="table" style="font-size:0.7em">
        <thead class='thead-dark' >
            <tr>
                <th scope="col" style="text-align: center">ID</th>
                <th scope="col" style="text-align: center">Nombre</th>
                <th scope="col" style="text-align: center">Precio</th>
                <th scope="col" style="text-align: center">Descripción</th>
                <th scope="col" style="text-align: center">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
        <tr style="background:white;">
            <td scope="row" style="background:whitesmoke;text-align: center;">
            {{ $service->id_service_user }}
            </td>
            <td style="background:whitesmoke;text-align: center;">{{ $service->name }}</td>
            <td style="background:whitesmoke;text-align: center;">{{ $service->price }}</td>
            <td style="background:whitesmoke;text-align: center;">{{ $service->description }}</td>
            <td style="background:whitesmoke;text-align: center;">
                <div class="dropdown" style="width: 100%">
                            <button style="font-size:0.7em" class="btn btn-primary" onclick="window.location.href='{{route('services.edit', $service->id) }}'" >Editar</button>
                            <button style="font-size:0.7em" class="btn btn-primary" onclick="window.location.href='#'" data-toggle="modal" data-target="#divConfirmDelete{{$service->id}}" >Borrar</button>
                            <button style="font-size:0.7em" class="btn btn-primary" onclick="window.location.href='{{route('service.pdf',$service->id)}}'">Exportar</button>
                              
                </div>
            </td>
        </tr>
        <div id="divConfirmDelete{{$service->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                            <h4 class="modal-title">Eliminar Servicio</h4>
                        <button type="button"class="close" data-dismiss="modal">&times;</button>
                       
                    </div>
                    <div class="modal-body">
                        <p>
                            ¿Desea eliminar al Servicio?
                        </p>
                    </div>
                    <div class="modal-footer">
                       <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('services.delete', $service->id) }}'" data-dismiss="modal">Aceptar</button>     
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </tbody>
    
    </table>
    <div style="margin: 0 auto";>
        {!! $services->render(); !!}
    </div>
    <a href="{{ route('services.pdf') }}" class="btn btn-sm btn-primary" style="font-size:0.8em">
            Descargar servicios en PDF
        </a>
   </section>
    @else
    <span style="margin-top:4%">No tiene ningun servicio creado, puede <a href="/services/add">crear un servicio</a></span>
    @endif
    </main>

@endsection