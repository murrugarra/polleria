@extends('client.layouts.app')

@section('content')
    @include('client.components.alert')

    @if ($seccion === 'todos')
        @include('client.components.menu.categorias')
        @include('client.components.menu.previews.previewCategorias')
    @else
        @include('client.components.menu.contenidoCategoria')
    @endif
@endsection
