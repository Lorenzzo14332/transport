<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DIngreso extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'detalle_extraccion_minera';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable =
    [
        'detalle_sede_id',
        'mineral_id',
        'unidad_medida_id',
        'cantidad',
    ];
    public function pmineria()
    {
        return $this->belongsTo(Categoria::class, 'detalle_sede_id', 'id');
    }
}