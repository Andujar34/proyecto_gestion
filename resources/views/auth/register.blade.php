@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
<main style="height:100%;">
        <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
            <div class="panel-heading" style="margin-bottom:2%;margin-top:0%">
                <div class="panel-title card-header"><h4 style="font-size:1em">Registro</h4></div>
            </div>
            {{ Form::open( array('route'=>['register'], 'method'=>'POST','files'=>true))}}
            @csrf

                        <div class="form-group row" style="font-size:0.8em">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input style="font-size:0.8em" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="font-size:0.8em">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="font-size:0.8em">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>
    
                                <div class="col-md-6">
                                    <input style="font-size:0.8em" id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus>
    
                                    @if ($errors->has('surname'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group row" style="font-size:0.8em">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input style="font-size:0.8em" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="font-size:0.8em">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input style="font-size:0.8em" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="font-size:0.8em">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirma Password') }}</label>

                            <div class="col-md-6">
                                <input style="font-size:0.8em" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row" style="font-size:0.8em">
                                <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI/CIF') }}</label>
    
                                <div class="col-md-6">
                                    <input style="font-size:0.8em" id="dni" type="text" class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni" value="{{ old('dni') }}" required autofocus>
    
                                    @if ($errors->has('dni'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('dni') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row" style="font-size:0.8em">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>
    
                                <div class="col-md-6">
                                    <input style="font-size:0.8em" id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>
    
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row" style="font-size:0.8em">
                                <label for="cc" class="col-md-4 col-form-label text-md-right">{{ __('Cuenta Corriente') }}</label>
    
                                <div class="col-md-6">
                                    <input style="font-size:0.8em" id="cc" type="text" class="form-control{{ $errors->has('cc') ? ' is-invalid' : '' }}" name="cc" value="{{ old('cc') }}" required autofocus>
    
                                    @if ($errors->has('cc'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('cc') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row" style="font-size:0.8em">
                                <div class="col-md-6 offset-md-4">
                                    <a href='/legal'>Condiciones legales</a>
                                </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="font-size:0.8em">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group row" style="font-size:0.75em;margin-top:1.5%">
                            <div class="col-md-6 offset-md-4">
                                <a href='/login'>Ya tengo cuenta</a>
                            </div>
                            <a href="/" class="btn btn-primary" style="float:right; font-size:0.8em">Atrás</a>
                        </div>
                        {{ Form::close()}}
                    </section>
                     
                     </main>
             @endsection