<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
  use HasFactory;

  protected $table = 'feedback';

  // protected $casts = [
  //   'config' => Json::class,
  // ];

  protected function config(): Attribute
  {
    return Attribute::make(
        get: fn ($value) => json_decode($value, true),
        set: fn ($value) => json_encode($value),
    );
  }

  public function muro(){
    return $this->belongsTo(Muro::class,'id_muro');
  }
}
