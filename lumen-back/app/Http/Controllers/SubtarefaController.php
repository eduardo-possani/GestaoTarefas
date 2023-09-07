<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subtarefa; 

class SubtarefaController extends Controller
{
    public function busca(){
        $subtarefas = Subtarefa::all();

        if ($subtarefas->isEmpty()) {
            return response()->json(['message' => 'Nenhum resultado encontrado'], 404);
        } else {
            return response()->json($subtarefas, 200);
        }
    }

    public function apreensao($id)
    {
        $subtarefa = Subtarefa::findOrFail($id);
        $subtarefa->delete();
        return response()->json(['message' => 'Subtarefa excluída com sucesso'], 200);
    }

    public function update(Request $request, $id)
    {
        $tarefa = Subtarefa::findOrFail($id);
        $tarefa->update($request->all());
    
        return response()->json(['message' => 'Subtarefa atualizada com sucesso'], 200);
    }
    
    
    public function create(Request $request)
    {
        $data = $request->only(['titulo', 'descricao', 'data_vencimento', 'status']);
        $novaTarefa = Subtarefa::create($data);
        return response()->json(['message' => 'Registro criado com sucesso', 'data' => $novaTarefa], 201);
    }

}
