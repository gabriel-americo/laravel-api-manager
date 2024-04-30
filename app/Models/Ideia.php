<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ideia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'descricao', 'data_inicio', 'data_entrega', 'data_lancamento', 'criador', 'status'
    ];

    protected $dates = [
        'data_inicio', 'data_entrega', 'data_lancamento'
    ];

    protected $appends = [
        'data_entrega_br', 'data_lancamento_br', 'data_inicio_br'
    ];

    public function getDataEntregaBrAttribute()
    {
        return $this->data_entrega ? $this->formatDate($this->data_entrega) : "-";
    }

    public function getDataLancamentoBrAttribute()
    {
        return $this->data_lancamento ? $this->formatDate($this->data_lancamento) : "-";
    }

    public function getDataInicioBrAttribute()
    {
        return $this->data_inicio ? $this->formatDate($this->data_inicio) : "00/00/0000";
    }

    protected function formatDate($date)
    {
        if (is_string($date)) {
            $date = new \DateTime($date);
        }

        return $date->format('d/m/Y');
    }

    public function getStatusAttribute()
    {
        switch ($this->attributes['status']) {
            case 0:
                return "Iniciar";
            case 1:
                return "Em Andamento";
            default:
                return "Concluído";
        }
    }

    public function diferencaTempoFormatada()
    {
        $dataCriacao = Carbon::parse($this->created_at);
        $diff = $dataCriacao->diff(Carbon::now());

        return $diff->days > 0 ? $diff->format('%dd') : $diff->format('%hh');
    }

    public function ideiaImagem(): HasMany
    {
        return $this->hasMany(IdeiaImagem::class, 'ideia_id', 'id');
    }

    public function ideiaPergunta(): HasMany
    {
        return $this->hasMany(IdeiaPergunta::class, 'ideia_id', 'id');
    }

    public function aprovacao(): HasOne
    {
        return $this->hasOne(Aprovacao::class, 'ideia_id', 'id');
    }
}
