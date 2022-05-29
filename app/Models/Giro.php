<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giro extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'sedes_giros';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable =
    [
        'planta_id',
        'sede_id',
        'tipo_extaccion_id',
        'clas_min_id',
        'orden',
        'fecha',
    ];

    public function sub_categorias(){
        return $this->belongsTo(Subcategoria::class, 'planta_id', 'tipo_extaccion_id', 'clas_min_id', 'id');
    }

    public function mitem(){
        return $this->belongsTo(Item::class, 'sede_id', 'id');
    }
}