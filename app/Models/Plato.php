<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $fillable = ['nombre', 'precio', 'imagen'];
    use HasFactory;
}
