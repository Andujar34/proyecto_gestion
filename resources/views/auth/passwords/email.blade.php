@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
<main style="height:100%;">
        <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
            <div class="panel-heading" style="margin-bottom:2%">
                        <div class="panel-title card-header" ><h4>{{ __('Recuperar contraseña') }}</h4></div>
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ Form::open( array('route'=>['password.email'], 'method'=>'POST','files'=>true))}}
                    @csrf
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
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="font-size:0.8em">
                                    {{ __('Enviar contraseña') }}
                                </button>
                            </div>
                        </div>
                        <a href="/" class="btn btn-primary" style="float:right; font-size:0.8em">Atrás</a>
                        {{ Form::close()}}
                    </section>
        
                </main>
        @endsection
        
