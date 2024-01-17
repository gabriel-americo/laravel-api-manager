<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ideia extends Model
{
    protected $table='ideias';

    protected $fillable = [
        'nome', 'descricao', 'data_inicio', 'data_entrega', 'data_lancamento', 'criador', 'status'
    ];

    protected $dates = [
        'data_inicio', 'data_entrega', 'data_lancamento'
    ];

    protected $appends = [
        'data_entrega_br', 'data_lancamento_br', 'data_inicio_br', 'status_label'
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

    public function image()
    {
        return $this->hasMany(ImagemIdeia::class, 'ideia_id', 'id');
    }

    public function pergunta()
    {
        return $this->hasMany(PerguntaIdeia::class, 'ideia_id', 'id');
    }

    public function aprovacao()
    {
        return $this->hasOne(Aprovacao::class, 'ideia_id', 'id');
    }
}
