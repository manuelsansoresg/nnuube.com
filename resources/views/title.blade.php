@extends('layouts.livewire-layout-title')

@section('content')
    @livewire('title-content-component', ['title_id' => $title->id])
@endsection
