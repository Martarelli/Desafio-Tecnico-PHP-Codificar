@extends('layouts/template')

@section('content')
<a href="{{ url('/create') }}" class="btn btn-primary m-3">Criar Orçamento</a>
<div class="w-100 d-flex justify-content-center">

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
