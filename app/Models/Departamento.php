<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departamento extends Model
{
    use HasFactory;
    protected $table = 'tb_departamento';
    protected $primaryKey = 'depa_codi';
    public $timestamps = false;
}
