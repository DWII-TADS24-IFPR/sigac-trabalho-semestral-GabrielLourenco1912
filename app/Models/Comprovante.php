<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comprovante extends Model
{
    use SoftDeletes;

    protected $table = 'comprovantes';

    protected $fillable = [
        'hash',
        'horas',
        'atividade',
        'categoria_id',
        'aluno_id',
        'user_id',
        'documento_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }

}
