<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subtarefa;
use App\Models\Tarefa; 

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
    
    
    public function create(Request $request, $id)
    {
    $novaSubtarefa = new Subtarefa([
        'titulo' => $request->input('titulo'),
        'descricao' => $request->input('descricao'),
        'data_vencimento' => $request->input('data_vencimento'),
        'status' => $request->input('status'),
    ]);  
    $tarefaPai = Tarefa::findOrFail($id);

    $tarefaPai->subtarefas()->save($novaSubtarefa);

    return response()->json(['message' => 'Subtarefa criada com sucesso', 'data' => $novaSubtarefa], 201);
}



}
