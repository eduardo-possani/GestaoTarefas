<?php 
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    
    class Tarefa extends Model
    {
        protected $table = 'tarefas';
        protected $fillable =[ 'id','titulo','descricao','data_vencimento','status','created_at','updated_at'];
        
        public function subtarefas()
        {
            return $this->hasMany(Subtarefa::class, 'id_tarefa');
        }
    }
    

?>