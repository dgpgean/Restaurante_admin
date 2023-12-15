@vite(['resources/css/products.css', 'resources/css/app.css', 'resources/css/general.css', 'resources/js/products.js'])
<script src="{{ asset('js/sweetalert.js') }}"></script>

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cadastro de Produtos</h1>
@stop

@section('content')
    <div id="body" class="create">
        <x-alert />
        <form action="{{ route('products.store') }}" class="flex jc ac" method="POST" enctype="multipart/form-data">
            @method('POST')
            @include('partials.products.form')
        </form>
    </div>
@stop


@section('js')
    <script>
        product_image = document.getElementById('product_image');
        preview_image = document.getElementById('preview_image');

        product_image.onchange = evt => {
            const [file] = product_image.files
            if (file) {
                preview_image.src = URL.createObjectURL(file)
            }
        }
    </script>
@stop
