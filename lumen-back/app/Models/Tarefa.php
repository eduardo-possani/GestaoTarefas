<?php 
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    
    class Tarefa extends Model
    {
        protected $table = 'tarefas';
        protected $fillable =[ 'id','titulo','descricao','descricao','status','created_at','updated_at'];
        
    }
    

?>