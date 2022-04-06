@extends('frontend/layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/frontend/thanks.css') }}">

<section style="background-image: url( {{ asset('/img/background2.png') }} );" class="thanks">
    <div class="container">
        <div class="box">
            <h1>Listo. <br> ¡Ya estás participando por premios increíbles, y el viaje a la Final de la UEFA Champions
                League!</h1>
        </div>
    </div>
</section>

@include('frontend/layouts.footer')
@endsection