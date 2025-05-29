<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comuna extends Model
{
    use HasFactory;
    protected $table = 'tb_comuna';
    protected $primaryKey = 'comu_codi';
    public $timestamps = false;
}
