<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
class Sucursales extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        
    ];
    protected $appends=['mesasCount'];
    public function getMesasCountAttribute()
    {
        return $this->mesas->count();
    }
    public function mesas()
    {
        return $this->hasMany(Mesas::class,'sucursales_id');
    }
    public function domicilio(): MorphOne
    {
        return $this->morphOne(Domicilio::class, 'model')->withDefault();
    }
}
