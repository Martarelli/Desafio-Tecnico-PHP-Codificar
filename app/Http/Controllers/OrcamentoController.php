<?php

namespace App\Http\Controllers;

use App\Models\Orcamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class OrcamentoController extends Controller
{
    public function index(Request $request)
    {
        //Captura dos campos do filtro
        $filtro = array(
            'cliente' => isset($_GET['cliente']) ? $_GET['cliente'] : '' ,
            'vendedor' => isset($_GET['vendedor']) ? $_GET['vendedor'] : '' ,
            'dataInicial' => isset($_GET['dataInicial']) ? $_GET['dataInicial'] : '' ,
            'dataFinal' => isset($_GET['dataFinal']) ? $_GET['dataFinal'] : '' ,
        );

        //Inclusão dos filtros na Query
        $registros = Orcamento::query();

        if ($filtro['cliente']){
            $registros->where('cliente','like', '%'. $filtro['cliente'] .'%');
        }

        if($filtro['vendedor'] !== ''){
            $registros->where('vendedor','like', '%'. $filtro['vendedor'] .'%');
        }

        if($filtro['dataInicial'] !== '') {
            $registros->whereDate('created_at', '>=', $filtro['dataInicial']);
        }

        if($filtro['dataFinal'] !== '') {
            $registros->whereDate('created_at', '<=', $filtro['dataFinal']);
        }

        //Execução da consulta no BD
        $orcamentos = $registros->orderBy('created_at', 'desc')->get();

        return view('index', compact('orcamentos', 'filtro'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        //Validação dos campos do form
        $rules = [
            'cliente' => 'required|max:255',
            'vendedor' => 'required|max:255',
            'descricao' => 'required|max:255',
            'valor' => 'required|numeric|min:1',
        ];

        $messages = [
            'cliente.required' => 'O campo cliente é obrigatório.',
            'vendedor.required' => 'O campo vendedor é obrigatório.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'valor.required' => 'O campo valor é obrigatório.',
            'valor.min' => 'O valor deve ser maior que 1.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        //Verificação se foi validado ou não
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //Cria o registro no BD
        Orcamento::create([
            'cliente' => $request->cliente,
            'vendedor' => $request->vendedor,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
        ]);

        return redirect('/');
    }

    public function edit($id)
    {
        //Procura o registro no BD pelo ID
        $orcamento = Orcamento::find($id);

        return view('edit', compact('orcamento','id'));
    }

    public function update(Request $request, $id)
    {
        //Validação dos campos do form
        $rules = [
            'cliente' => 'required|max:255',
            'vendedor' => 'required|max:255',
            'descricao' => 'required|max:255',
            'valor' => 'required|numeric|min:1',
        ];

        $messages = [
            'cliente.required' => 'O campo cliente é obrigatório.',
            'vendedor.required' => 'O campo vendedor é obrigatório.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'valor.required' => 'O campo valor é obrigatório.',
            'valor.min' => 'O valor deve ser maior que 1.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        //Verificação se foi validado ou não
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //Procura o registro no BD pelo ID
        $orcamento = Orcamento::find($id);

        //Atualização do registro no BD
        $orcamento -> update([
            'cliente' => $request -> cliente,
            'vendedor' => $request -> vendedor,
            'descricao' => $request -> descricao,
            'valor' => $request -> valor,
            'updated_at' => now()->timezone('-03:00'),
         ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        //Exclui o registro no BD pelo ID
        Orcamento::destroy($id);

        return redirect('/');
    }
}
