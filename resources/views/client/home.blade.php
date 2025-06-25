@extends('client.layouts.app')

@section('client.content')
    @include('client.components.alert')
    @include('client.components.carousel')
    @include('client.components.categorias')
    @include('client.components.promociones')
    @include('client.components.masvendido')
@endsection
