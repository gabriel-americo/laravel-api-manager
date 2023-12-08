<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerguntasIdeias extends Model
{
    protected $table='perguntas_ideias';

    protected $fillable = ['perguntas', 'respostas', 'ideias_id', 'usuarios_id'];

    public function ideias()
    {
        return $this->belongsTo(Ideias::class, 'ideias_id', 'id');
    }
}
