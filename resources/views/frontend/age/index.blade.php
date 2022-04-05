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
  </div>
</section>

<script>
  function checkValidDate() {
    let day = $('#day').val();
    let month = $('#month').val();
    let year = $('#year').val();

    try {
      if ((parseInt(day) > 0 && parseInt(day) <= 31) && (parseInt(month) > 0 && parseInt(month) < 13) && (parseInt(year) > 1940 && parseInt(day) < 2023)) {
        const date1 = new Date(`${month}/${day}/${year}`);
        var today = new Date();
        const diffTime = Math.abs(today - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24))

        if (diffDays > 6570) {
          $('.btn-continue').addClass('active')
        }
      }

    } catch (e) {

    }

  }

  function checkAge() {
    event.preventDefault();

    let day = $('#day').val();
    let month = $('#month').val();
    let year = $('#year').val();

    try {
      if ((parseInt(day) > 0 && parseInt(day) <= 31) && (parseInt(month) > 0 && parseInt(month) < 13) && (parseInt(year) > 1940 && parseInt(day) < 2023)) {
        const date1 = new Date(`${month}/${day}/${year}`);
        var today = new Date();
        const diffTime = Math.abs(today - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24))

        if (diffDays > 6570) {
          $('#ageForm').submit();
        }
      }

    } catch (e) {

    }
  }
</script>

@endsection