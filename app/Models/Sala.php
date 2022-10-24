<?php

namespace App\Models;

use App\Services\Imagen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
  use HasFactory;

  protected $table = 'sala';

  private $imgDefault = "/img/patomirando.jpg";

  public function muros(){
    return $this->hasMany(Muro::class,'id_sala');
  }

  public function usuario(){
    return $this->belongsTo(Usuario::class,'id_usuario');
  }

  public function getImage(){
    return (new Imagen($this->image, 'file/img/sala', $this->imgDefault, false))->call();
  }
}
