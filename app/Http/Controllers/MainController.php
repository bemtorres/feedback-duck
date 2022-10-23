<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Muro;
use App\Models\Sala;
use Illuminate\Http\Request;

class MainController extends Controller
{
  public function index() {
    $salas = Sala::where('activo',true)->get();

    return view('www.index', compact('salas'));
  }

  public function sala($url) {
    try {
      $s = Sala::where('activo',true)->where('url',$url)->with('muros')->firstOrFail();
      return view('www.sala',compact('s'));
    } catch (\Throwable $th) {
      return back()->with('danger','No existe sala');
    }
  }

  public function muro($url, $id) {
    try {
      $s = Sala::where('activo',true)->where('url',$url)->firstOrFail();
      $m = Muro::where('id_sala',$s->id)->findOrFail($id);
      return view('www.muro',compact('s','m'));
    } catch (\Throwable $th) {
      return back()->with('danger','No existe sala');
    }
  }

  public function muroStore(Request $request, $url, $id) {
    try {
      $s = Sala::where('activo',true)->where('url',$url)->firstOrFail();
      $m = Muro::where('id_sala',$s->id)->findOrFail($id);

      $f = new Feedback();
      $f->id_muro = $m->id;
      $f->nombre = $request->input('nombre');
      $f->comentario = $request->input('feedback');
      $f->save();

      return back()->with('success','Se ha enviado su feedback');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }


  public function muroShow($url, $id) {
    try {
      $s = Sala::where('activo',true)->where('url',$url)->firstOrFail();
      $m = Muro::where('id_sala',$s->id)->with('feedbacks')->findOrFail($id);
      return view('www.duck',compact('s','m'));
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }
}
