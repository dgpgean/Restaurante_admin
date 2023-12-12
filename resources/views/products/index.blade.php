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
                    <option selected>Categoria</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option>
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
        <table>
            <thead>
                <th>Código</th>
                <th>Nome do produto</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th>00000000</th>
                        <th>{{ $product->name }}</th>
                        <th>{{ $product->price }}</th>
                        <th>categoria de teste</th>
                        <th>editar</th>
                        <th>excluir</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $products->appends(request()->input())->links() }}
@stop
