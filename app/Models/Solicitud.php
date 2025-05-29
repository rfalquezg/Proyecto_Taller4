<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';
    protected $fillable=["id","tema","descripcion","area","fecha_registro","fecha_cierre","estado","observacion","usuarioExt"];
    use HasFactory;
}
