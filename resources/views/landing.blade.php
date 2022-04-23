@extends('layouts.livewire-layout')
@section('title', 'nnuube')
@section('content')
    <div class="container" >
        <div class="row mt-4 justify-content-center" id="rnd-title" style="display: none">
            <div class="col-6">
                <div class="text-center">
                    <a class="lnk-random text-align-center" href="">
                        <img class="rounded-circle img-fluid thumb-random" id="img-rand">
                    </a>
                </div>
                <p class="text-center text-truncate">
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
                Tarjetas Virtuales Indexadas
            </p>
            
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
