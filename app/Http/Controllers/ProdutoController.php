<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    protected $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return response()->json($produto = $this->produto->all(), 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdutoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->produto->rules());


        $produto = $this->produto->create([
            'descricao' => $request->descricao,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'referencia' => $request->referencia,
            'minimo' => $request->minimo,
            'maximo' => $request->maximo,
            'saldo' => $request->saldo,
            'endereco' => $request->endereco,
            'valor' => $request->valor,
   
        ]);

        return $produto;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdutoRequest  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdutoRequest $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
