@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
   <main style="height:80%;">
   
    
    <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
    <a href="/providers/add" class="btn btn-primary" style="width:15%;font-size:0.7em">Crear un Proveedor</a>
    @if(count($providers)>0)
    <table class="table" style="font-size:0.7em">
        <thead class='thead-dark'>
            <tr>
                <th scope="col" style="text-align: center">ID</th>
                <th scope="col" style="text-align: center">Nombre</th>
                <th scope="col" style="text-align: center">DNI/CIF</th>
                <th scope="col" style="text-align: center">Dirección</th>
                <th scope="col" style="text-align: center">Teléfono</th>
                <th scope="col" style="text-align: center">CC</th>
                <th scope="col" style="text-align: center">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($providers as $provider)
        <tr style="background:white;">
            <td scope="row" style="background:whitesmoke;text-align: center">
            {{ $provider->id_provider_user }}
            </td>
            <td style="background:whitesmoke;text-align: center">{{ $provider->name }}</td>
            <td style="background:whitesmoke;text-align: center">{{ $provider->CIF }}</td>
            <td style="background:whitesmoke;text-align: center">{{ $provider->address }}</td>
            <td style="background:whitesmoke;text-align: center">{{ $provider->phone }}</td>
            <td style="background:whitesmoke;text-align: center">{{ $provider->cc }}</td>
            <td style="background:whitesmoke;text-align: center">
                <div class="dropdown" style="width: 100%">
                            <button style="font-size:0.7em" class="btn btn-primary" onclick="window.location.href='{{route('prodivers.edit', $provider->id) }}'" >Editar</button>
                            <button style="font-size:0.7em" class="btn btn-primary" onclick="window.location.href='#'" data-toggle="modal" data-target="#divConfirmDelete{{$provider->id}}" >Borrar</button>
                            <button style="font-size:0.7em" class="btn btn-primary" onclick="window.location.href='{{route('provider.pdf',$provider->id)}}'">Exportar</button>
                        </div>
            </td>
        </tr>
        <div id="divConfirmDelete{{$provider->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                       
                        <h4 class="modal-title card-header">Eliminar Proveedor</h4>
                        <button type="button"class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>
                            ¿Desea eliminar al Proveedor?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('providers.delete', $provider->id) }}'" data-dismiss="modal">Aceptar</button>     
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </tbody>
    
    </table>
    
    <div style="margin: 0 auto";>
        {!! $providers->render(); !!}
    </div>
    <a href="{{ route('providers.pdf') }}" class="btn btn-sm btn-primary" style="font-size:0.7em">
            Descargar listado de proveedores en PDF
        </a>
   </section>
   @else
   <span style="margin-top:4%">No tiene ningun proveedor creado, puede <a href="/providers/add">crear un proveedor</a></span>
    @endif
    </main>


@endsection