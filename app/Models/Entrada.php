<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $fillable = ['id', 'codigo_entrada', 'codigo_salida','id_area','remitente','id_documento','asunto','adjunto','requiere_respuesta','es_respuesta','observaciones','fecha_entrada','fecha_limite'];
}
