<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Naves extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_swapi',
        'nombre',
        'modelo',
        'fabricante',
        'unidades'
    ];
}
