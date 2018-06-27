@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
<main style="height:100%;">
        <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
            <div class="panel-heading" style="margin-bottom:2%">
                <div class="panel-title card-header"><h4>Login</h4></div>
            </div>
            {{ Form::open( array('route'=>['login'], 'method'=>'POST','files'=>true))}}
            @csrf

            <div class="form-group row" style="font-size:0.8em">
                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                <div class="col-md-6">
                    <input style="font-size:0.8em" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" style="font-size:0.8em">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
            <div class="form-group row" style="font-size:0.8em;margin-top:1.5%">
                <div class="col-md-6 offset-md-4">
                    <a href='/register'>No tengo cuenta</a>
                </div>
                <a href="/" class="btn btn-primary" style="float:right; font-size:0.8em">Atrás</a>
            </div>
        {{ Form::close()}}
       </section>
        
        </main>
@endsection
