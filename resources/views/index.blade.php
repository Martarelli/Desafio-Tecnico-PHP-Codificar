@extends('layouts/template')

@section('content')
<a href="{{ url('/create') }}" class="btn btn-primary m-3">Criar Orçamento</a>
<div class="w-100 d-flex flex-column justify-content-center">
    <div class="container">
        <form class="d-flex" action="/" method="get">
            <div class="form-group">
                <label class="mt-3" for="cliente">Cliente</label>
                <input class="w-100" type="text" name="cliente" value={{!empty($filtro) ? $filtro['cliente'] : ''}}>
            </div>
            <div class="form-group">
                <label class="mt-3" for="vendedor">Vendedor</label>
                <input class="w-100" type="text" name="vendedor" value={{!empty($filtro) ? $filtro['vendedor'] : ''}}>
            </div>
            <div class="form-group">
                <label class="mt-3" for="dataInicial">Data Inicial</label>
                <input class="w-100" type="date" name="dataInicial" value={{!empty($filtro) ? $filtro['dataInicial'] : ''}}>
            </div>
            <div class="form-group">
                <label class="mt-3" for="dataFinal">Data Final</label>
                <input class="w-100" type="date" name="dataFinal" value={{!empty($filtro) ? $filtro['dataFinal'] : ''}}>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-4">Filtrar</button>
            <a href="/" class="btn btn-secondary w-100 mt-4">Limpar Filtro</a>
        </form>

    </div>

    <table class="table table-striped table-bordered table-hover table-light m-3">
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
        @foreach ($orcamentos as $orcam)
            <tr>
                <td class="text-center" style="width: 15%;">{{$orcam->cliente}}</td>
                <td class="text-center" style="width: 15%;">{{$orcam->vendedor}}</td>
                <td class="text-center" style="width: 15%;">{{$orcam->descricao}}</td>
                <td class="text-center" style="width: 10%;">R$ {{number_format($orcam->valor, 2, ',', '.')}}</td>
                <td class="text-center" style="width: 10%;">{{$orcam->created_at}}</td>
                <td class="text-center" style="width: 10%;">{{$orcam->updated_at}}</td>
                <td class="text-center" style="width: 10%">
                    <a href="/edit/{{$orcam->id}}" class="btn btn-secondary mr-3">Editar</a>
                    <a href="/destroy/{{$orcam->id}}" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
