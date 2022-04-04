@extends('layouts.livewire-layout')
@section('title', 'nnuube')
@section('content')
    <div class="col-12 pb-5 mt-3">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-8">
                <div class="row justify-content-center">
                    @livewire('search-title-component', ['my_titles' => true])
                </div>
            </div>
        </div>
    {{-- /busqueda --}}
    </div>
    
@endsection