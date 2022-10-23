<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
  use HasFactory;

  protected $table = 'sala';

  public function muros(){
    return $this->hasMany(Muro::class,'id_sala');
  }

  public function usuario(){
    return $this->belongsTo(Usuario::class,'id_usuario');
  }
}
