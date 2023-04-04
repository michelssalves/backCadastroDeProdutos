<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'marca', 'modelo', 'referencia', 'minimo', 'maximo', 'saldo', 'endereco', 'valor'];

    public function rules(){

        return [
            'descricao' => 'required|min:3',
            'marca' => 'required|min:3',
            'modelo' => 'required|min:3',
            'referencia' => 'required|min:3',
            'minimo' => 'required',
            'maximo' => 'required',
            'saldo' => 'required',
            'endereco' => 'required',
            'valor' => 'required',
        ];

    }
   /* public function feedback(){

        return[
            'required' => 'O campo :attribute é obrigatório',
            'nome.unique' => 'O nome da marca já existe',
            'nome.min' => 'O nome deve ter no minimo de 3 caracteres',
            'imagem.mimes' => 'O arquivo precisa ser em formato PNG'
        ];
    }*/
}
