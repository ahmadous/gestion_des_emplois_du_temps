@extends('layouts.app')

@section('titre')

@section('content')
    <div class="top-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md col-xl-5 d-flex align-items-center">
                    <a class="navbar-brand align-items-center" href="#">
                    GESTION-EDT
                    <span>Pous une bonne Gestion de vos Emplois du temps</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="justify-content-center align-items-center">
        <div class="text mt-5 pt-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
            <h4><span class=" subheading">Bienvenue dans Gestion-EDT</span></h4>
            <h3 class=" mb-4">Une plateforme qui permet de gerer les emplois du temps d'un etablissement universitaire</h3>
            <h4 class=" mb-4">Simple a utilise il suffit juste de vous inscrire pour benieficier de plus de fonctionalite</h4>
            <p><a href="{{ route('register') }}" class="btn btn-primary p-4 py-3">Commencer maintenant! <span class="ion-ios-arrow-round-forward"></span></a> <a href="#a4" class="btn btn-white p-4 py-3">Regarder comment fonctionne notre application <span class="ion-ios-arrow-round-forward"></span></a></p>
        </div>
     </div>
    <section class="row no-gutters slider-text justify-content-center ">
    </section>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" id="a4">
            <iframe src="{{asset("img/welcome.mp4")}}" class="d-block w-100" frameborder="0" style="height:600px;width:600px"></iframe>
          </div>
        </div>
    </div>
@endsection
