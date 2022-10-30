<?php
namespace App\Services;

class UserInfo{
  public static function get_data() {
    try {
      $geo = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
      $data = $geo->toArray();

      unset($data['currency']);
      unset($data['default']);
      unset($data['cached']);

      $data['info_ip'] = UserSystem::get_ip() ?? null;
      $data['info_os'] = UserSystem::get_os() ?? null;
      $data['info_browser'] = UserSystem::get_browsers() ?? null;
      $data['info_device'] = UserSystem::get_device() ?? null;
      return $data;
    } catch (\Throwable $th) {
      return $th;
      return [
        'result' => 'not found'
      ];
    }
  }
}
