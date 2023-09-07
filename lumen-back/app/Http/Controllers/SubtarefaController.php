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
        $request->validate([
            'titulo' => 'string',
            'descricao' => 'string',
            'data_vencimento' => 'date',
            'status' => 'in:Pendente,Completa',
        ]);

        $subtarefa = Subtarefa::findOrFail($id);
        $subtarefa->update($request->all());

        return response()->json(['message' => 'Subtarefa atualizada com sucesso'], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'descricao' => 'required|string',
            'data_vencimento' => 'required|date',
            'status' => 'required|in:Pendente,Completa',
        ]);
        Subtarefa::create($request->all());
        return response()->json(['message' => 'Subtarefa criada com sucesso'], 201);
    }
}
