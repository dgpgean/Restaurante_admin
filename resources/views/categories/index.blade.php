@vite('resources/css/categories.css')
@vite('resources/css/general.css')
@vite('resources/css/app.css')
@vite('resources/js/categories.js')

<script src="{{ asset('js/sweetalert.js') }}"></script>

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <x-alert-success />
    <h1>Categorias</h1>
    <button id="btnNew" class="text-blue-500">Adicionar categoria</button>
    <input type="hidden" id="category_new" value="{{ route('categories.new') }}">
    <input type="hidden" id="category_delete" value="{{ route('categories.delete', '') }}">
    <div class="flex items-baseline mt-3">
        <form class="flex w-full" action="{{ route('categories.index') }}" method="POST">
            @csrf
            <input type="text" name="filter" placeholder="Nome da categoria" class="w-full rounded-sm px-2"
                value="{{ request('filter') }}">
            <button type="submit" href="" class="bg-blue-500 text-white p-2 border rounded-sm">Buscar</button>
        </form>
    </div>
@stop

@section('content')
    <div id="body">
        <table>
            <thead>
                <th>Id</th>
                <th>Nome da categoria</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <th>{{ $category->name }}</th>
                        <th class="flex items-center">
                            <a href="" class="btn">Editar</a>
                            <button value="{{ $category->id }}" class="btnDelete">Excluir</button>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $categories->appends(request()->input())->links() }}
@stop


@section('js')

    <script></script>
@stop
