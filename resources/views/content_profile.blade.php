@extends('layouts.livewire-layout')
@section('title', $titulo)
@section('content')
    @livewire('profile-component', ['type' => $type])
@endsection