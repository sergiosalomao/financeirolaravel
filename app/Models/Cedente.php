<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cedente extends Model
{
    use HasFactory;

    public $fillable = ['descricao','status'];
}
