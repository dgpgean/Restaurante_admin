@vite('resources/css/products.css')
@vite('resources/css/general.css')
@vite('resources/css/app.css')
<script src="{{ asset('js/sweetalert.js') }}"></script>

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <x-alert-success />
    <h1>Produtos</h1>
    <a href="{{ route('products.new') }}">Adicionar produto</a>
    <div class="flex items-baseline gap-[20px] mt-3">
        <form class="flex w-full gap-8" action="{{ route('products.index') }}" method="POST">
            <div>
                <select
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="0">Categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @csrf
            <input type="text" name="filter" placeholder="Nome do produto" class="w-full rounded-sm px-2"
                value="{{ request('filter') }}">
            <button type="submit" href="" class="bg-blue-500 text-white p-2 border rounded-sm">Buscar</button>
        </form>
    </div>
@stop

@section('content')
    <div id="body">
        <div class="cards flex gap-3 p-2">
            @foreach ($products as $product)
                <div class="card gap-2 flex flex-column justify-center items-center p-2">
                    <span class="font-bold">{{ $product->name }}</span>
                    <img id="preview_image" src="{{ url("$product->image") }}" width="225" height="225" alt="">
                    <span>{{ $product->price }}</span>
                    <div class="flex w-full gap-1 justify-around">
                        @include('partials.button_edit', ['classes' => 'm-0'])
                        @include('partials.button_delete')

                    </div>

                </div>
            @endforeach
        </div class="cards">
    </div>
    {{ $products->appends(request()->input())->links() }}
@stop
