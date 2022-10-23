<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muro extends Model
{
  use HasFactory;

  protected $table = 'muro';

  public function feedbacks(){
    return $this->hasMany(Feedback::class,'id_muro');
  }
}
