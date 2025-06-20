<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Declaracao extends Model
{
    use SoftDeletes;

    protected $table = 'declaracaos';
    protected $fillable =
        [
            'data',
            'aluno_id',
            'comprovante_id'
        ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
    public function comprovante()
    {
        return $this->belongsTo(Comprovante::class);
    }
}
