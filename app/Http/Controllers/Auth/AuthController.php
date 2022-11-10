<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;

class AuthController extends Controller
{
  public function index() {
    return view('auth.index');
  }

  public function login(Request $request){
    try {
      $u = Usuario::where('correo',$request->cname)->firstOrFail();
      $pass = hash('sha256', $request->cpass);
      if($u->password==$pass){
        Auth::guard('usuario')->loginUsingId($u->id);

        return redirect()->route('home.index');
      }else{
        return back()->with('danger','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      return back()->with('danger','Error. Intente nuevamente.');
    }
  }

  public function sign_out() {
    close_sessions();
    return redirect()->route('root');
  }

  public function registrar() {
    return view('auth.register');
  }
}
