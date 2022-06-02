<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'extraccion_minera';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable =
    [
        'sede_id',
        'fecha',
        'total',	
    ];

    public function negocio(){
        return $this->belongsTo(Categoria::class, 'sede_id', 'id');
    }

    public function subcategoria(){
        return $this->belongsTo(Subcategoria::class, 'mineral_id', 'id');
    }

    public function pmineria_detalle(){
        return $this->hasMany(PDMineria::class, 'detalle_sede_id', 'id');
    }
}