<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Rol;
use Illuminate\Support\Facades\Session;
class Usuario extends Model
{
    //
    protected $remember_token = false;
    protected $table = 'usuario';
    protected $fillable = ['usuario', 'nombre', 'password'];
    protected $guarded = ['id'];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuario_rol');
    }

    public function setSession($roles)
    {
        /* if (count($roles) == 1) {
            Session::put(
                [
                    'rol_id' => $roles[0]['id'],
                    'rol_nombre' => $roles[0]['nombre'],
                    'usuario' => $this->usuario,
                    'usuario_id' => $this->id,
                    'nombre_usuario' => $this->nombre
                ]
            );
        } */
    }
