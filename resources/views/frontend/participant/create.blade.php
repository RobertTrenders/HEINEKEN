@extends('frontend/layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/frontend/register.css') }}">

<section class="register">
    <div class="container">
        <h1>¡Ingresá tus datos y empezá a participar!</h1>
        <form action="{{ route('register_store') }}" method="POST" role="form" enctype="multipart/form-data" id="participant_form">
            @csrf
            <div class="form-group ">
                <select name="team" class="form-control {{ $errors->has('team') ? ' is-invalid' : '' }}" id="">
                    <option value="">Elegí tu equipo</option>
                    @if(!empty($aTeams))
                    @foreach($aTeams as $oTeam)
                    <option {{ old('team') == $oTeam->id ? 'selected' : '' }} value="{{ $oTeam->id }}">{{ $oTeam->name }}</option>
                    @endforeach
                    @endif
                </select>
                @if ($errors->has('team'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('team') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ old('name') }}" name="name" placeholder="Nombre y Apellido">
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" value="{{ old('email') }}" name="email" placeholder="Email">
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <input type="number" class="form-control {{ $errors->has('dni') ? ' is-invalid' : '' }}" id="dni" value="{{ old('dni') }}" name="dni" placeholder="DNI">
                @if ($errors->has('dni'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('dni') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <input type="number" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Telefono">
                @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <textarea name="objective" id="" cols="30" class="form-control {{ $errors->has('objective') ? ' is-invalid' : '' }}" placeholder="¿Qué harías para ganarte el viaje la final de la UEFA Champions League?" rows="10">{{ old('objective') }}</textarea>
                @if ($errors->has('objective'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('objective') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-check text-center" id="checkbox-terms">
                <input class="form-check-input {{ $errors->has('terms') ? ' is-invalid' : '' }}" type="checkbox" value="1" name="terms" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Acepto <a href="">Bases y Condiciones</a>
                </label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-submit">Registrarme</button>
            </div>
        </form>
    </div>
</section>

<div id="ajax-loader" class="ajax-loader"></div>

<script src="{{ asset('/js/onlyNumber.js') }}"></script>
<script src="{{ asset('/js/onlyText.js') }}"></script>
<script src="{{ asset('/assets/js/frontend/participant/create.js') }}"></script>

@endsection