<?php

namespace App\Http\Controllers;

use App\Models\Produto;
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
        
       /// return response()->json($produto = $this->produto->paginate(2), 200);

        $produtos = $this->produto->paginate(1);
        return response()->json($produtos, 200);

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

            'descricao' => strtoupper($request->descricao),
            'marca' => strtoupper($request->marca),
            'modelo' => strtoupper($request->modelo),
            'referencia' => strtoupper($request->referencia),
            'minimo' => $request->minimo,
            'maximo' => $request->maximo,
            'saldo' => $request->saldo,
            'endereco' => strtoupper($request->endereco),
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
    public function show($id)
    {
        $produto = $this->produto->find($id);

        if ($produto === null) {
            return response()->json(['erro' => 'O produto pesquisado não existe'], 404);
        }
        return $produto;
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


    public function update(Request $request, $id)
    {
       // dd($request);
        $produto = $this->produto->find($id);

        if ($produto === null) {

            return response()->json(['erro' => 'O registro não pode ser atualizado'], 404);
        }

             $request->validate($this->produto->rules());

          $produto->fill($request->all());

          
            $produto->update([
                'descricao' => strtoupper($request->descricao),
                'marca' => strtoupper($request->marca),
                'modelo' => strtoupper($request->modelo),
                'referencia' => strtoupper($request->referencia),
                'minimo' => $request->minimo,
                'maximo' => $request->maximo,
                'saldo' => $request->saldo,
                'endereco' => strtoupper($request->endereco),
                'valor' => $request->valor,
            ]);
        
        return $produto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto =  $this->produto->find($id);
        if ($produto === null) {

            return response()->json(['erro' => 'O registro não pode ser excluido'], 404);
        }

        $produto->delete();

        return ['msg' => 'Removido com sucesso'];
    }
}
