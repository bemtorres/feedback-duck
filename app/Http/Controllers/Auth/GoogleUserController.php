<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Auth;
use Exception;
use Laravel\Socialite\Facades\Socialite;

class GoogleUserController extends Controller
{
    /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function redirectToGoogle()
  {
    // $sistema = ModelsSistema::first();
    // if ($sistema->googleEnabled()) {
      return Socialite::driver('google')->redirect();
    // }

    return redirect('/');
  }

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function handleGoogleCallback()
  {
    try {
      // close_sessions();
      $user = Socialite::driver('google')->user();

      // TOKEN
      $token = $user->getId();
      // FOTO
      $foto = $user->getAvatar();
      $nick = $user->getNickname();
      $name = $user->getName();
      // EMAIL
      $email = $user->getEmail();
      $provider = explode("@",$email)[1];

      // return $user->getRaw();

      // // only allow people with @company.com to login
      if($provider == 'duocuc.cl' || $provider == 'profesor.duoc.cl' ){
        $u = Usuario::findByEmail($email)->first();

        if (empty($u)) {
          $u = new Usuario();
          $u->nombre = $name;
          $u->apellido = "";
          $u->correo = $email;
          $u->password = hash('sha256', 'feebacks2000');
          $u->cargo = "INGRESO GMAIL";
          $u->admin = false;
          $u->save();
        }
        close_sessions();

        Auth::guard('usuario')->loginUsingId($u->id);

        return redirect()->route('home.index');
      }else {
        return redirect()->to('/login')->with('danger','No son cuentas de Duocuack');
      }
    } catch (\Throwable $e) {

      return $e;
      return redirect('/login')->with('danger','Gmail no responde, comuniquese que atención a clientes.');
    }
  }
}
