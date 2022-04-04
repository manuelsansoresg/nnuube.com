@extends('layouts.livewire-layout')
@section('title', $titulo)
@section('content')
    @livewire('title-component', ['title_id' => $title_id])
@endsection