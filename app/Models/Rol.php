<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "rol";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
      
    public function roles()
    {   /* return $this->belongsToMany(User::class, 'users'); */
        return $this->belongsToMany(User::class);
    }
}
