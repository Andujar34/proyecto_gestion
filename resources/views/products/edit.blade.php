@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
   <main style="height:80%;">
       <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
        <div class="panel-heading">
            <div class="panel-title card-header"><h4>Editar  Producto</h4></div>
        </div>
        {{ Form::open( array('route'=>['products.update',$product->id], 'method'=>'POST','files'=>true))}}
    <table class="table">
        <tbody>
            <tr {{ $errors->has('name') ? 'class=has-error' : '' }}>
                <td  style="width:25%;font-size:0.8em">Nombre</td>
                <td>
                    <?php $curValue = old('name') ? old('name') : (!empty($product->name)?$product->name:'') ?>
                    {{ Form::text('name', $curValue, ['class' => 'form-control ' . ($errors->has('name') ? 'has-error' : ''),"style=font-size:0.8em"]) }}
                    @if ($errors->has('name'))
                    <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('price') ? 'class=has-error' : '' }}>
                <td style="width:25%;font-size:0.8em">Precio</td>
                <td>
                    <?php $curValue = old('price') ? old('price') : (!empty($product->price)?$product->price:'') ?>
                    {{ Form::text('price', $curValue, ['class' => 'form-control ' . ($errors->has('price') ? 'has-error' : ''),"style=font-size:0.8em"]) }}
                    @if ($errors->has('price'))
                    <p class="help-block text-danger">{{ $errors->first('price') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('description') ? 'class=has-error' : '' }}>
                    <td style="width:25%;font-size:0.8em">Descripción</th>
                    <td>
                        <?php $curValue = old('description') ? old('description') : (!empty($product->description)?$product->description:'') ?>
                        {{ Form::text('description', $curValue, ['class' => 'form-control ' . ($errors->has('description') ? 'has-error' : ''),"style=font-size:0.8em"]) }}
                        @if ($errors->has('description'))
                        <p class="help-block text-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </td>
            </tr>
            <tr {{ $errors->has('provider') ? 'class=has-error' : '' }}>
                    <td style="width:25%;font-size:0.8em">Proveedor</th>
                    <td>
                        <?php $curValue = old('provider') ? old('provider') : (!empty($product->provider_id)?$product->provider_id:'') ?>
                            {!! Form::select('provider', $providers, $curValue, ['class' => 'form-control ' . ($errors->has('provider') ? 'has-error' : ''),'id' => 'provider_id',"style=font-size:0.8em"]) !!}
                            @if ($errors->has('provider'))
                            <p class="help-block text-danger">{{ $errors->first('provider') }}</p>
                            @endif
                        </td>
            </tr>   
        </tbody>

    </table>
    <div>
        {{ Form::submit('Actualizar Producto',['class'=>'btn btn-primary',"style=font-size:0.8em"]) }}
        <a href="/products" class="btn btn-primary" style="float:right;font-size:0.8em">Atrás</a>
    </div>
    {{ Form::close()}}
   </section>
    
    </main>


@endsection