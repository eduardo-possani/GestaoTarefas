<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa; 

class TarefaController extends Controller
{
    public function busca(){
        $tarefas = Tarefa::all();

        if ($tarefas->isEmpty()) {
            return response()->json(['message' => 'Nenhum resultado encontrado'], 404);
        } else {
            return response()->json($tarefas, 200);
        }
    }

    public function apreensao($id)
    {
       
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();
        return response()->json(['message' => 'Tarefa excluída com sucesso'], 200);
    }
    

public function update(Request $request, $id)
{
    $tarefa = Tarefa::findOrFail($id);
    $tarefa->update($request->all());

    return response()->json(['message' => 'Tarefa atualizada com sucesso'], 200);
}


public function create(Request $request)
{
    $data = $request->only(['titulo', 'descricao', 'data_vencimento', 'status']);
    $novaTarefa = Tarefa::create($data);
    return response()->json(['message' => 'Registro criado com sucesso', 'data' => $novaTarefa], 201);
}


}
