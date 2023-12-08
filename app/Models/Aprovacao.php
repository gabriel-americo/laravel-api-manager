<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aprovacao extends Model
{
    protected $table='aprovacao';

    protected $fillable = ['descricao', 'status', 'ideias_id'];
    
    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 1 ? "Sim" : "Não";
    }

    public function ideias()
    {
        return $this->belongsTo(Ideias::class, 'ideias_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ImagemAprovacao::class, 'aprovacao_id', 'id');
    }
}
