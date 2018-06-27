@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
   <main style="height:80%">
    <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
        <div class="panel-heading">
            <div class="panel-title card-header"><h4>Editar Proveedor</h4></div>
        </div>
        {{ Form::open( array('route'=>['providers.update',$provider->id], 'method'=>'POST','files'=>true))}}
    <table class="table">
        <tbody>
            <tr {{ $errors->has('name') ? 'class=has-error' : '' }}>
                <td style="width:25%;font-size:0.8em">Nombre</td>
                <td>
                    <?php $curValue = old('name') ? old('name') : (!empty($provider->name)?$provider->name:'') ?>
                    {{ Form::text('name', $curValue, ['class' => 'form-control ' . ($errors->has('name') ? 'has-error' : ''),"style=font-size:0.8em"]) }}
                    @if ($errors->has('name'))
                    <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('address') ? 'class=has-error' : '' }}>
                <td style="width:25%;font-size:0.8em">Dirección</th>
                <td>
                    <?php $curValue = old('address') ? old('address') : (!empty($provider->address)?$provider->address:'') ?>
                    {{ Form::text('address', $curValue, ['class' => 'form-control ' . ($errors->has('address') ? 'has-error' : ''),"style=font-size:0.8em"]) }}
                    @if ($errors->has('address'))
                    <p class="help-block text-danger">{{ $errors->first('address') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('CIF') ? 'class=has-error' : '' }}>
                <td style="width:25%;font-size:0.8em">DNI/CIF</td>
                <td>
                    <?php $curValue = old('CIF') ? old('CIF') : (!empty($provider->CIF)?$provider->CIF:'') ?>
                    {{ Form::text('CIF', $curValue, ['class' => 'form-control ' . ($errors->has('CIF') ? 'has-error' : ''),"style=font-size:0.8em"]) }}
                    @if ($errors->has('CIF'))
                    <p class="help-block text-danger">{{ $errors->first('CIF') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('phone') ? 'class=has-error' : '' }}>
                <td style="width:25%;font-size:0.8em">Teléfono</td>
                <td>
                    <?php $curValue = old('phone') ? old('phone') : (!empty($provider->phone)?$provider->phone:'') ?>
                    {{ Form::text('phone', $curValue, ['class' => 'form-control ' . ($errors->has('phone') ? 'has-error' : ''),"style=font-size:0.8em"]) }}
                    @if ($errors->has('phone'))
                    <p class="help-block text-danger">{{ $errors->first('phone') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('cc') ? 'class=has-error' : '' }}>
                <td style="width:25%;font-size:0.8em">Cuenta Corriente</td>
                <td>
                    <?php $curValue = old('cc') ? old('cc') : (!empty($provider->cc)?$provider->cc:'') ?>
                    {{ Form::text('cc', $curValue, ['class' => 'form-control ' . ($errors->has('cc') ? 'has-error' : ''),"style=font-size:0.8em"]) }}
                    @if ($errors->has('cc'))
                    <p class="help-block text-danger">{{ $errors->first('cc') }}</p>
                    @endif
                </td>
            </tr>
        </tbody>

    </table>
    <div>
        {{ Form::submit('Actualizar Proveedor',['class'=>'btn btn-primary',"style=font-size:0.8em"]) }}
        <a href="/providers" class="btn btn-primary" style="float:right;font-size:0.8em">Atrás</a>
    </div>
    {{ Form::close()}}
   </section>
    
    </main>


@endsection