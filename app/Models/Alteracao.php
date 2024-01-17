<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alteracao extends Model
{
    protected $table = 'alteracoes';

    protected $fillable = ['correcao', 'data', 'status', 'aprovacao_id', 'usuario_id'];

    protected $dates = ['data'];

    public function getDataBrAttribute()
    {
        return $this->data ? $this->data->format('d/m/Y') : "-";
    }

    public function aprovacao()
    {
        return $this->belongsTo(Aprovacao::class, 'aprovacao_id', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuarios_id', 'id');
    }
}
