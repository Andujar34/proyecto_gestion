@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
   <main style="height:80%;">
   
    
    <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
    <a href="/products/add" class="btn btn-primary" style="width:15%;font-size:0.7em">Crear un Producto</a>
    @if(count($products)>0)
    <table class="table" style="font-size:0.7em">
        <thead class='thead-dark'>
            <tr>
                <th scope="col" style="text-align: center">ID</th>
                <th scope="col" style="text-align: center">Nombre</th>
                <th scope="col" style="text-align: center">Precio</th>
                <th scope="col" style="text-align: center">Descripción</th>
                <th scope="col" style="text-align: center">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr style="background:white;">
            <td scope="row" style="background:whitesmoke;text-align: center">
            {{ $product->id_product_user }}
            </td>
            <td style="background:whitesmoke;text-align: center">{{ $product->name }}</td>
            <td style="background:whitesmoke;text-align: center">{{ $product->price }}</td>
            <td style="background:whitesmoke;text-align: center">{{ $product->description }}</td>
            <td style="background:whitesmoke;text-align: center">
                <div class="dropdown" style="width: 100%">
                            <button style="font-size:0.7em" class="btn btn-primary" onclick="window.location.href='{{route('products.edit', $product->id) }}'" >Editar</button>
                            <button style="font-size:0.7em" class="btn btn-primary" onclick="window.location.href='#'" data-toggle="modal" data-target="#divConfirmDelete{{$product->id}}" >Borrar</button>
                            <button style="font-size:0.7em" class="btn btn-primary" onclick="window.location.href='{{route('product.pdf',$product->id)}}'" >Exportar</button>
                        </div>
            </td>
        </tr>
        <div id="divConfirmDelete{{$product->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                            <h4 class="modal-title">Eliminar Producto</h4>
                        <button type="button"class="close" data-dismiss="modal">&times;</button>
                        
                    </div>
                    <div class="modal-body">
                        <p>
                            ¿Desea eliminar al Producto?
                        </p>
                    </div>
                    <div class="modal-footer">
                       <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('products.delete', $product->id) }}'" data-dismiss="modal">Aceptar</button>     
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </tbody>
    
    </table>
   
    <div style="margin: 0 auto";>
        {!! $products->render(); !!}
    </div>
    <a href="{{ route('products.pdf') }}" style="font-size:0.8em" class="btn btn-sm btn-primary">
            Descargar productos en PDF
        </a>
   </section>
   @else
   <span style="margin-top:4%">No tiene ningun producto creado, puede <a href="/products/add">crear un producto</a></span>
    @endif
    </main>


@endsection