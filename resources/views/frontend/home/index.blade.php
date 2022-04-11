@extends('frontend/layouts.app')
@section('content')


<link rel="stylesheet" href="{{ asset('/css/frontend/index.css') }}">

<section class="intro" style="background-image: url({{ asset('/img/background.png') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h4>¡Promo Heineken Champions!</h4>
                <h1>La promo que premia tu pasión por los equipos de la UEFA Champions League.</h1>
                <a href="{{ route('register') }}" class="btn btn-participate">Participar</a>
            </div>
        </div>
    </div>
</section>

<section class="participate">
    <div class="container">
        <h2>Participar es muy fácil</h2>
        <p class="text">Elegí a tu equipo favorito y participá por un viaje a la final de la UEFA Champions League e increíbles premios.</p>
    </div>
</section>

<section class="prizes">
    <div class="container">
        <h2>Mirá todo lo que podés ganar</h2>

        <div class="items">
            <div class="item"><img src="{{ asset('/img/prize1.png') }}" class="img-fluid" alt=""></div>
            <div class="item"><img src="{{ asset('/img/prize2.png') }}" class="img-fluid" alt=""></div>
            <div class="item"><img src="{{ asset('/img/prize3.png') }}" class="img-fluid" alt=""></div>
            <div class="item"><img src="{{ asset('/img/prize4.png') }}" class="img-fluid" alt=""></div>
            <div class="item"><img src="{{ asset('/img/prize5.png') }}" class="img-fluid" alt=""></div>
            <div class="item"><img src="{{ asset('/img/prize6.png') }}" class="img-fluid" alt=""></div>
        </div>
        <p class="disclaimer">Las imágenes de los premios pueden diferir del premio finalmente entregado a los ganadores del concurso y son de carácter meramente ilustrativas. Los premios podrán variar en cuanto a su color, forma, diseño y/o tamaño</p>
        <a href="{{ route('register') }}" class="btn btn-participate">Entrá acá y participá</a>
    </div>
</section>

@endsection