<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = 
    [ 
        'nombre', 
        'descripcion',
        'orden',
    ];
    
    public function sub_categorias(){
        return $this->hasMany(Subcategoria::class, 'categoria_id', 'id');
    }
}

