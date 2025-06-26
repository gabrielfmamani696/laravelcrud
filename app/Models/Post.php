<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // los campos que definimos en la migracion
    protected $fillable = ["title", "content", "status"];
    // es para definir la paginacion que se suele poner en el modelo
    public const PAGINATE = 10;

}
