<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;

class Imagen
{
  private $photo;
  private $folder;
  private $img_default;

  function __construct($photo, $folder, $img_default = null) {
    $this->photo = $photo;
    $this->folder = $folder;
    $this->img_default = $img_default;
  }

  public function call(){
    return $this->build();
  }

  // PRIVATE

  private function build(){
    try {
      if(empty($this->photo)){
        return $this->img_default;
      } elseif (filter_var($this->photo, FILTER_VALIDATE_URL)) {
        return $this->photo;
      }else{
        $img = $this->photo;

        if (!empty($this->folder)) {
          $img = $this->folder.'/'.$this->photo;
        }

        if ($img == $this->img_default) {
          return $this->img_default;
        }
        return $this->getStorage($img);
      }
    } catch (\Throwable $th) {
      return $this->img_default;
    }
  }

  private function getStorage($img) {
    return \Storage::url($img);
  }
}
