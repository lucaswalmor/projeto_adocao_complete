<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotos extends Model
{
    use HasFactory;
    protected $table = 'fotos';
    protected $fillable = ['pet_id', 'user_id', 'fotos'];
}
