@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
   <main style="height:80%;">
    <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
        <div class="panel-heading">
            <div class="panel-title card-header"><h4>Editar Cliente</h4></div>
        </div>
        {{ Form::open( array('route'=>['customers.update',$customer->id], 'method'=>'POST','files'=>true))}}
    <table class="table">
        <tbody>
            <tr {{ $errors->has('name') ? 'class=has-error' : '' }}>
                <td style="width:25%;font-size:0.8em">Nombre</td>
                <td>
                    <?php $curValue = old('name') ? old('name') : (!empty($customer->name)?$customer->name:'') ?>
                    {{ Form::text('name', $curValue, ['class' => 'form-control ' . ($errors->has('name') ? 'has-error' : ''),"style=font-size:0.8em"]) }}
                    @if ($errors->has('name'))
                    <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('surname') ? 'class=has-error' : '' }}>
                <td style="width:25%;font-size:0.8em">Apellidos</td>
                <td>
                    <?php $curValue = old('surname') ? old('surname') : (!empty($customer->surname)?$customer->surname:'') ?>
                    {{ Form::text('surname', $curValue, ['class' => 'form-control ' . ($errors->has('surname') ? 'has-error' : ''),"style=font-size:0.8em"]) }}
                    @if ($errors->has('surname'))
                    <p class="help-block text-danger">{{ $errors->first('surname') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('address') ? 'class=has-error' : '' }}>
                <td style="width:25%;font-size:0.8em">Dirección</td>
                <td>
                    <?php $curValue = old('address') ? old('address') : (!empty($customer->address)?$customer->address:'') ?>
                    {{ Form::text('address', $curValue, ['class' => 'form-control ' . ($errors->has('address') ? 'has-error' : ''),"style=font-size:0.8em"]) }}
                    @if ($errors->has('address'))
                    <p class="help-block text-danger">{{ $errors->first('address') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('CIF') ? 'class=has-error' : '' }}>
                <td style="width:25%;font-size:0.8em">DNI/CIF</td>
                <td>
                    <?php $curValue = old('CIF') ? old('CIF') : (!empty($customer->CIF)?$customer->CIF:'') ?>
                    {{ Form::text('CIF', $curValue, ['class' => 'form-control ' . ($errors->has('CIF') ? 'has-error' : ''),"style=font-size:0.8em"]) }}
                    @if ($errors->has('CIF'))
                    <p class="help-block text-danger">{{ $errors->first('CIF') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('phone') ? 'class=has-error' : '' }}>
                <td style="width:25%;font-size:0.8em">Teléfono</td>
                <td>
                    <?php $curValue = old('phone') ? old('phone') : (!empty($customer->phone)?$customer->phone:'') ?>
                    {{ Form::text('phone', $curValue, ['class' => 'form-control ' . ($errors->has('phone') ? 'has-error' : ''),"style=font-size:0.8em"]) }}
                    @if ($errors->has('phone'))
                    <p class="help-block text-danger">{{ $errors->first('phone') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('cc') ? 'class=has-error' : '' }}>
                <td style="width:25%;font-size:0.8em">Cuenta Corriente</td>
                <td>
                    <?php $curValue = old('cc') ? old('cc') : (!empty($customer->cc)?$customer->cc:'') ?>
                    {{ Form::text('cc', $curValue, ['class' => 'form-control ' . ($errors->has('cc') ? 'has-error' : ''),"style=font-size:0.8em"]) }}
                    @if ($errors->has('cc'))
                    <p class="help-block text-danger">{{ $errors->first('cc') }}</p>
                    @endif
                </td>
            </tr>
        </tbody>

    </table>
    <div>
        {{ Form::submit('Actualizar Cliente',['class'=>'btn btn-primary',"style=font-size:0.8em"]) }}
        <a href="/customers" class="btn btn-primary" style="float:right;font-size:0.8em">Atrás</a>
    </div>
    {{ Form::close()}}
   </section>
    
    </main>

@endsection