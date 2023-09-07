<?php 
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    
    class Subtarefa extends Model
    {
        protected $table = 'subtarefas';
        protected $fillable =[ 'id','titulo', 'id_tarefa','descricao','status','created_at','updated_at'];

        public function tarefa()
        {
            return $this->belongsTo(Tarefa::class, 'id_tarefa');
        }
    }
    

?>