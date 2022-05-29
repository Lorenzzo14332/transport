<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'items';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable =
    [
        'sub_categoria_id',
        'nombre',
        'descripcion',
        'orden',
    ];

    public function sub_categorias()
    {
        return $this->belongsTo(Subcategoria::class, 'sub_categoria_id', 'id');
    }

    public function negocio()
    {
        return $this->hasMany(Negocio::class, 'sede_id', 'id');
    }
}
