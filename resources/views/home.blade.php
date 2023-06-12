@extends('layouts.app')
@section('titre')
    Home
@endsection
@section('content')
    <div class="justify-content-center align-items-center">
        <div class="text aos-init aos-animate" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
            <h4><span class=" subheading">Bonjour {{ auth()->user()->name }}</span></h4>
            <h3 class="mt-3 alert alert-secondary">Regardez ce video ci dessous pour avoir un apercu de vos role en tant que
                {{ auth()->user()->role }} <svg style="height:30px; width:30px" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                </svg>
            </h3>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="container-fluid">
        <div>
            @if (auth()->user()->role == 'etudiant')
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" id="a4">
                            <iframe src="{{ asset('img/welcome.mp4') }}" class="d-block w-100" frameborder="0"
                                style="height:600px;width:600px"></iframe>
                        </div>
                    </div>

                </div>
            @elseif (auth()->user()->role == 'admin')
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" id="a4">
                            <iframe src="{{ asset('img/home2.mp4') }}" class="d-block w-100" frameborder="0"
                                style="height:600px;width:600px"></iframe>
                        </div>
                    </div>
                    </a>
                </div>
            @else
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" id="a4">
                            <iframe src="{{ asset('img/home1.mp4') }}" class="d-block w-100" frameborder="0"
                                style="height:600px;width:600px"></iframe>
                        </div>
                    </div>
                    </a>
                </div>
            @endif

        </div>
    </div>
@endsection
