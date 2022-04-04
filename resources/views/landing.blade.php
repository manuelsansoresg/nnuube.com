@extends('layouts.livewire-layout')
@section('title', 'nnuube')
@section('content')
    <div class="container" >
        <div class="row mt-4 justify-content-center" id="rnd-title" style="display: none">
            <div class="col-1">
                <a class="lnk-random" href="">
                    <img class="rounded-circle img-fluid thumb-random" id="img-rand">
                </a>
                <p class="text-center">
                    <a class="lnk-random" href="">
                        <span id="user-random" class="badge bg-info"></span>
                    </a>
                </p>
                <p class="h6 text-muted text-center"> + vistos </p>
            </div>

        </div>
        {{-- leyenda --}}
        <div class="col-12 text-center mt-2 pb-5 ">
            <p class="h4 mt-n3 landing__title">
                Regala amor
            </p>
            <p>
                <i class="fas fa-heart heart-small text-danger"></i>
            </p>
            <p class="mt-n3 h4 landing__subtitle">tus corazones se renuevan cada primero de mes</p>
            <div class="row">
                <div class="col-10 offset-1">

                </div>
            </div>
        </div>

        {{-- leyenda --}}
        {{-- busqueda --}}
        <div class="col-12 pb-5 mt-3">
            
            <div class="row mt-5 justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="row justify-content-center">
                       @livewire('search-title-component')
                       
                    </div>
                </div>
            </div>
        {{-- /busqueda --}}
        </div>

@endsection
