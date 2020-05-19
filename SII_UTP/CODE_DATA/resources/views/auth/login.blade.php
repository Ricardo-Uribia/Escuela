@extends('layouts.app')

@section('estilos')
<style>
    body
{
    margin: 0;
    padding: 0;
    background: url("{{asset('/CODE_DATA/public/img/internal_statics/fondoSiii.jpg')}}");   
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
@section('contenido')
<div class="loginBox">
    <img class="user" src="{{asset('/CODE_DATA/public/img/internal_statics/user.png')}}">
        <h2>
            Iniciar Sesión
        </h2>
        <form action="{{route('doLogin')}}" method="POST">
            @csrf
            <label for="email">
                {{ __('E-Mail') }}
            </label>
            <input autofocus="" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Ingresa tu Email" required="" type="email" value="{{ old('email') }}">
                <div class="col-md-6">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>
                            {{ $errors->first('email') }}
                        </strong>
                    </span>
                    @endif
                </div>
                <label for="password">
                    {{ __('Password') }}
                </label>
                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="••••••" required="" type="password">
                    <div class="col-md-6">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>
                                {{ $errors->first('password') }}
                            </strong>
                        </span>
                        @endif
                    </div>
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Olvidaste tu Contraseña?
                    </a>
                    <input name="" type="submit" value="Acceder">
                    </input>
                </input>
            </input>
        </form>
    </img>
</div>
@endsection
