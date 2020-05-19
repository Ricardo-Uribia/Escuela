@extends('layouts.app')

@section('content')

<div class="loginBox">
    <img src="{{asset('/img/user.png')}}" class="user">  
        <h2>Iniciar Sesión</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email" >{{ __('E-Mail') }}</label>
                <input  type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Ingresa tu Email">
               <div class="col-md-6">
                                
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                <label for="password" >{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="••••••">
               <div class="col-md-6">
                                
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                 <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Olvidaste tu Contraseña?
                                </a>

                <input type="submit" name="" value="Acceder">
              
            </form>
</div>

<style type="text/css">
          body
{
    margin: 0;
    padding: 0;
    background: url("{{asset('/img/fondoSiii.jpg')}}");   
    background-size: cover;
    font-family: sans-serif;
}
.loginBox
{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 350px;
    height: 420px;
    padding: 80px 40px;
    box-sizing: border-box;
    background: rgba(0,0,0,.5);
}
.user
{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
    position: absolute;
    top: calc(-100px/2);
    left: calc(50% - 50px);
}
h2
{
    margin: 0;
    padding: 0 0 20px;
    color: #efed40;
    text-align: center;
}
.loginBox label
{
    margin: 0;
    padding: 0;
    font-weight: bold;
    color: #fff;
}
.loginBox input
{
    width: 100%;
    margin-bottom: 20px;
}
.loginBox input[type="email"],
.loginBox input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
::placeholder
{
    color: rgba(255,255,255,.5);
}
.loginBox input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
    background: #ff267e;
    cursor: pointer;
    border-radius: 20px;
}
.loginBox input[type="submit"]:hover
{
    background: #efed40;
    color: #262626;
}
.loginBox a
{
    color: #fff;
    font-size: 14px;
    font-weight: bold;
    text-decoration: none;
}

        </style>
@endsection
