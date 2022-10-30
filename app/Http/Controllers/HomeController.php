<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index() {
    return view('home.index');
  }

  public function perfil() {
    $u = current_user();

    return view('admin.profile',compact('u'));
  }

  public function perfilUpdate(Request $request) {
    $u = Usuario::find(current_user()->id);
    $u->nombre = $request->input('nombre');
    $u->apellido = $request->input('apellido');
    // $u->correo = $request->input('correo');
    $u->cargo = $request->input('cargo');
    // $u->admin = $request->input('admin') == 1 ? true : false;
    $u->admin = true;
    $u->update();

    return back()->with('success','Actualizado');
  }

  public function perfilUpdatePassword(Request $request) {
    $u = Usuario::find(current_user()->id);
    $u->password = hash('sha256', $request->input('pass'));
    $u->update();

    return back()->with('success','Actualizado');
  }
}
