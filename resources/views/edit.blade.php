@extends('layouts/template')

@section('content')
{{-- Exibição do erro de validação --}}
@if($errors->any())
    <div class="alert alert-danger m-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="w-100 d-flex flex-column justify-content-center align-items-center ">
    <h1 class="mt-3">Editar Orçamento</h1>
    {{-- Form de edição dos dados do orçamento --}}
    <form class="w-50" action="/update/{{$id}}" method="post">
        @csrf
        <div class="form-group">
            <label class="mt-3" for="cliente">Cliente</label>
            <input class="w-100" type="text" name="cliente" value="{{$orcamento -> cliente}}">
        </div>
        <div class="form-group">
            <label class="mt-3" for="vendedor">Vendedor</label>
            <input class="w-100" type="text" name="vendedor" value="{{$orcamento -> vendedor}}">
        </div>
        <div class="form-group">
            <label class="mt-3" for="descricao">Descrição</label>
            <input class="w-100" type="text" name="descricao" value="{{$orcamento -> descricao}}">
        </div>
        <div class="form-group">
            <label class="mt-3" for="valor">Valor R$</label>
            <input class="w-100" type="number" step="0.1" name="valor" value="{{$orcamento -> valor}}">
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-4">Salvar Orçamento</button>
        <a href="{{ url('/') }}" class="btn btn-light w-100 mt-4">Voltar</a>
    </form>
</div>
@endsection
