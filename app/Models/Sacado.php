<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sacado extends Model
{
    use HasFactory;

    public $fillable = ['descricao','status'];
}
