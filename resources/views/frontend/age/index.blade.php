@extends('frontend/layouts.app')

@section('content')


<link rel="stylesheet" href="{{ asset('/css/frontend/age.css') }}">

<section class="overlay">
  <div>
    <h1>Contanos: <br> ¿cuándo naciste?</h1>
    <div class="inputs">
      <form action="{{ route('age_store') }}" method="POST" id="ageForm">
        @csrf
        <input type="number" min="1" max="31" name="day" onchange="checkValidDate()" placeholder="Día" id="day">
        <input type="number" max="12" min="1" name="month" onchange="checkValidDate()" placeholder="Mes" id="month">
        <input type="number" name="year" placeholder="Año" onchange="checkValidDate()" maxlength="4" id="year">
      </form>
      <a href="" onclick="checkAge()" class="btn btn-continue">Ingresar</a>
    </div>
    <div class="text-center mt-2">
      <span class="invalid-feedback" role="alert">
        <strong>Debes tener al menos 18 años para ingresar.</strong>
      </span>
    </div>
  </div>
</section>


<script src="{{ asset('/js/onlyNumber.js') }}"></script>
<script src="{{ asset('/assets/js/frontend/age/index.js') }}"></script>

@endsection