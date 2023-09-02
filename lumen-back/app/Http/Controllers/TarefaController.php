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
    $request->validate([
        'titulo' => 'string',
        'descricao' => 'string',
        'data_vencimento' => 'date',
        'status' => 'in:Pendente,Completa',
    ]);

    $tarefa = Tarefa::findOrFail($id);
    $tarefa->update($request->all());

    return response()->json(['message' => 'Tarefa atualizada com sucesso'], 200);
}

public function create(Request $request)
{
    $request->validate([
        'titulo' => 'required|string',
        'descricao' => 'required|string',
        'data_vencimento' => 'required|date',
        'status' => 'required|in:Pendente,Completa',
    ]);
    Tarefa::create($request->all());
    return response()->json(['message' => 'Tarefa criada com sucesso'], 201);
}


}
