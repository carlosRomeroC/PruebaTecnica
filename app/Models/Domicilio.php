<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domicilio extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'calle',
        'numero',
        'colonia',
        'cp',
        'estado',
        'pais'
    ];
    protected function model(){
        return $this->morphTo();
    }
}
