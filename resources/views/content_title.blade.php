@extends('layouts.livewire-layout')
@section('title', $title->titulo)
@section('content')
    @livewire('title-component', ['title_id' => $title->id])
@endsection