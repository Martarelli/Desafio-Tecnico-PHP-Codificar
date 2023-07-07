<?php

namespace App\Http\Controllers;

use App\Models\Orcamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class OrcamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filtro = array(
            'cliente' => isset($_GET['cliente']) ? $_GET['cliente'] : '' ,
            'vendedor' => isset($_GET['vendedor']) ? $_GET['vendedor'] : '' ,
            'dataInicial' => isset($_GET['dataInicial']) ? $_GET['dataInicial'] : '' ,
            'dataFinal' => isset($_GET['dataFinal']) ? $_GET['dataFinal'] : '' ,
        );

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

        $orcamentos = $registros->orderBy('created_at', 'desc')->get();

        return view('index', compact('orcamentos', 'filtro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Orcamento::create([
            'cliente' => $request->cliente,
            'vendedor' => $request->vendedor,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orcamento $orcamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orcamento $orcamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orcamento $orcamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orcamento $orcamento)
    {
        //
    }
}
