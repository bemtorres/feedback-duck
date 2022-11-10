<?php

namespace App\Models;

use App\Services\Imagen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Usuario extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $table = 'usuario';

  protected $guard = 'usuario';

  protected function integrations(): Attribute
  {
    return Attribute::make(
        get: fn ($value) => json_decode($value, true),
        set: fn ($value) => json_encode($value),
    );
  }


  private $imgDefault = '/img/patomirando.jpg';
  private $folderDefault = 'photo_rooms';

  public function getImage(){
    return (new Imagen($this->image, $this->folderDefault, $this->imgDefault))->call();
  }

  public function scopeFindByEmail($query, $email) {
    return $query->where('correo', $email);
  }
}
