<?php

namespace App\Models;

use App\Services\Imagen;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
  use HasFactory;

  protected $table = 'sala';


  protected function config(): Attribute
  {
    return Attribute::make(
        get: fn ($value) => json_decode($value, true),
        set: fn ($value) => json_encode($value),
    );
  }


  private $imgDefault = '/img/patomirando.jpg';
  private $folderDefault = 'photo_rooms';

  public function muros(){
    return $this->hasMany(Muro::class,'id_sala');
  }

  public function usuario(){
    return $this->belongsTo(Usuario::class,'id_usuario');
  }

  public function getImage(){
    return (new Imagen($this->image, $this->folderDefault, $this->imgDefault))->call();
  }

  public function getConfigActive() {
    return $this->config['active'] ?? false;
  }
}
