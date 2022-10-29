<?php

namespace App\Models;

use App\Services\Imagen;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muro extends Model
{
  use HasFactory;

  protected $table = 'muro';

  private $imgDefault = '/img/patomirando.jpg';
  private $folderDefault = 'photo_wall';

  protected function config(): Attribute
  {
    return Attribute::make(
        get: fn ($value) => json_decode($value, true),
        set: fn ($value) => json_encode($value),
    );
  }

  public function feedbacks(){
    return $this->hasMany(Feedback::class,'id_muro');
  }

  public function usuario(){
    return $this->belongsTo(Usuario::class,'id_usuario');
  }

  public function sala(){
    return $this->belongsTo(Sala::class,'id_sala');
  }

  public function getImage(){
    return (new Imagen($this->image, $this->folderDefault, $this->imgDefault))->call();
  }

  public function getConfigActive() {
    return $this->config['active'] ?? false;
  }

  public function getConfigActiveComentario() {
    return $this->config['comentario'] ?? false;
  }

  public function getConfigPassword() {
    return $this->config['password'] ?? '';
  }

  public function getConfigIsPassword() {
    return $this->config['is_password'] ?? false;
  }
}
