<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueroDoar extends Model
{
    use HasFactory;
    protected $table = 'pet';
    protected $fillable = ['nome', 'especie', 'raca', 'porte', 'pelagem', 'user_id',
    'cor_pelo', 'sexo', 'temperamento', 'situacao', 'historia', 'idade', 'idade_tipo', 'fotos'];
}
