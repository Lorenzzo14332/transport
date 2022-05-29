<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'sub_categorias';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    protected $fillable = 
    [
        'categoria_id', 
        'nombre',
        'descripcion',
        'orden',
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

    public function items(){
        return $this->hasMany(Item::class, 'sub_categoria_id', 'id');
    }

    public function negocio(){
        return $this->hasMany(Negocio::class, 'planta_id', 'tipo_extraccion_id', 'clas_min_id', 'id');
    }

}
