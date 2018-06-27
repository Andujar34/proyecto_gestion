@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
<main style="height:100%;">
        <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
                <div class="panel-heading">
                        <div class="panel-title card-header">Formulario de Contacto</div>
                    </div>
                    {{ Form::open( array('route'=>['welcome'], 'method'=>'POST','files'=>true))}}
                    <table class="table">
                            <tbody>
                                <tr {{ $errors->has('name') ? 'class=has-error' : '' }}>
                                    <td style="width:25%;font-size:0.8em;">Nombre</td>
                                    <td>
                                        <?php $curValue = old('firstname') ? old('firstname') : '' ?>
                                        {{ Form::text('firstname', $curValue, ['class' => 'form-control ' . ($errors->has('firstname') ? 'has-error' : ''),'style=font-size:0.8em']) }}
                                        @if ($errors->has('firstname'))
                                        <p class="help-block text-danger">{{ $errors->first('firstname') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr {{ $errors->has('lastname') ? 'class=has-error' : '' }}>
                                    <td style="width:25%;font-size:0.8em;">Apellidos</td>
                                    <td>
                                        <?php $curValue = old('lastname') ? old('lastname') : '' ?>
                                        {{ Form::text('lastname', $curValue, ['class' => 'form-control ' . ($errors->has('lastname') ? 'has-error' : ''),'style=font-size:0.8em']) }}
                                        @if ($errors->has('lastname'))
                                        <p class="help-block text-danger">{{ $errors->first('lastname') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr {{ $errors->has('email') ? 'class=has-error' : '' }}>
                                    <td style="width:25%;font-size:0.8em;">Email</td>
                                    <td>
                                        <?php $curValue = old('email') ? old('email') : '' ?>
                                        {{ Form::text('email', $curValue, ['class' => 'form-control ' . ($errors->has('email') ? 'has-error' : ''),'style=font-size:0.8em']) }}
                                        @if ($errors->has('email'))
                                        <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr {{ $errors->has('Subject') ? 'class=has-error' : '' }}>
                                    <td  style="width:25%;font-size:0.8em;">Asunto</td>
                                    <td>
                                        <?php $curValue = old('Subject') ? old('Subject') : '' ?>
                                        {{ Form::text('Subject', $curValue, ['class' => 'form-control ' . ($errors->has('Subject') ? 'has-error' : ''),'style=font-size:0.8em']) }}
                                        @if ($errors->has('Subject'))
                                        <p class="help-block text-danger">{{ $errors->first('Subject') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr {{ $errors->has('Descripcion') ? 'class=has-error' : '' }}>
                                    <td style="width:25%;font-size:0.8em;">Mensaje</td>
                                    <td>
                                        <?php $curValue = old('Descripcion') ? old('Descripcion') : '' ?>
                                        {{ Form::textarea('Descripcion', $curValue, ['class' => 'form-control ' . ($errors->has('Descripcion') ? 'has-error' : ''),'style=font-size:0.8em']) }}
                                        @if ($errors->has('Descripcion'))
                                        <p class="help-block text-danger">{{ $errors->first('Descripcion') }}</p>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                    
                        </table>
                    <div>
                            {{ Form::submit('Enviar',['class'=>'btn btn-primary',"style=font-size:0.8em"]) }}
                            <a href="/" class="btn btn-primary" style="float:right; font-size:0.8em">Atrás</a>
                        </div>
                        {{ Form::close()}}
    </section>
    </main>
@endsection