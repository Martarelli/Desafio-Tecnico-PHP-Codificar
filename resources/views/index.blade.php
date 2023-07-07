@extends('layouts/template')

@section('content')
<div class="w-100 d-flex flex-column justify-content-center p-5">
    <h1 class="text-center">Listagem dos Orçamentos</h1>
    {{-- Botão para criação de novo orçamento --}}
    <a href="{{ url('/create') }}" class="btn btn-primary w-25 mb-5">Adicionar Orçamento</a>
    {{-- Form para inclusão de filtro de pesquisa --}}
    <form class="d-flex justify-content-around align-items-center w-75" action="/" method="get">
        <div class="form-group">
            <label class="" for="cliente">Cliente</label>
            <input class="p-2" type="text" name="cliente" value={{!empty($filtro) ? $filtro['cliente'] : ''}}>
        </div>
        <div class="form-group">
            <label class="" for="vendedor">Vendedor</label>
            <input class="p-2" type="text" name="vendedor" value={{!empty($filtro) ? $filtro['vendedor'] : ''}}>
        </div>
        <div class="form-group">
            <label class="pl-3" for="dataInicial">Data Inicial</label>
            <input class="p-2" type="date" name="dataInicial" value={{!empty($filtro) ? $filtro['dataInicial'] : ''}}>
        </div>
        <div class="form-group">
            <label class="pl-3" for="dataFinal">Data Final</label>
            <input class="p-2" type="date" name="dataFinal" value={{!empty($filtro) ? $filtro['dataFinal'] : ''}}>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary px-3">Filtrar</button>
            <a href="/" class="btn btn-secondary">Limpar</a>
        </div>
    </form>
    {{-- Table para exibição dos dados de orçamentos cadastrados --}}
    <table class="table table-striped table-bordered table-hover table-light my-3">
        <thead>
            <tr>
                <th class="text-center" scope="col">Cliente</th>
                <th class="text-center" scope="col">Vendedor</th>
                <th class="text-center" scope="col">Descrição</th>
                <th class="text-center" scope="col">Valor</th>
                <th class="text-center" scope="col">Criação</th>
                <th class="text-center" scope="col">Ultima Modificação</th>
                <th class="text-center" scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
        {{-- Exibição das linhas de registros encontrados --}}
        @foreach ($orcamentos as $orcam)
            <tr>
                <td class="text-center" style="width: 15%;">{{$orcam->cliente}}</td>
                <td class="text-center" style="width: 15%;">{{$orcam->vendedor}}</td>
                <td class="text-center">{{$orcam->descricao}}</td>
                <td class="text-center" style="width: 10%;">R$ {{number_format($orcam->valor, 2, ',', '.')}}</td>
                <td class="text-center" style="width: 10%;">{{$orcam->created_at->format('d/m/Y H:i:s') }}</td>
                <td class="text-center" style="width: 10%;">{{$orcam->updated_at->format('d/m/Y H:i:s')}}</td>
                <td class="text-center" style="width: 10%;">
                    <div class="d-flex w-100 justify-content-around">
                        <a href="/edit/{{$orcam->id}}" class="btn btn-secondary w-50 mx-1">Editar</a>
                        {{-- Form para inclusão do metodo delete --}}
                        <form class="w-50 mx-1" action="/destroy/{{$orcam->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100 " type="submit">Excluir</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
