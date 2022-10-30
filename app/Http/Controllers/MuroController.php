<?php

namespace App\Http\Controllers;

use App\Models\Muro;
use App\Models\Sala;
use App\Services\ImportImage;
use Illuminate\Http\Request;

class MuroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $s = Sala::findOrFail($id);

      return view('admin.muro.create', compact('s'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      try {
        $m = new Muro();
        $m->titulo = $request->input('titulo');
        $m->descripcion = $request->input('descripcion');
        $m->password = $request->input('password');
        $m->id_sala = $request->input('sala_id');
        $m->id_usuario = current_user()->id;

        if(!empty($request->file('image'))){
          $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

          $filename = time();
          $folder = 'public/photo_wall';
          $img = ImportImage::save($request, 'image', $filename, $folder);

          if ($img != 400) {
            $m->image = $img;
          }
        }

        $m->save();
        return redirect()->route('sala.show',$m->id_sala)->with('success','Se ha creado correctamente');
      } catch (\Throwable $th) {
        return back()->with('danger','Error intente nuevamente');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $m = Muro::with('feedbacks')->findOrFail($id);

      return view('admin.muro.show',compact('m'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $m = Muro::findOrFail($id);

      return view('admin.muro.edit',compact('m'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      try {
        $m = Muro::findOrFail($id);
        $m->titulo = $request->input('titulo');
        $m->descripcion = $request->input('descripcion');
        $m->password = $request->input('password');
        $m->id_usuario = current_user()->id;

        if(!empty($request->file('image'))){
          $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

          $filename = time();
          $folder = 'public/photo_wall';
          $img = ImportImage::save($request, 'image', $filename, $folder);

          if ($img != 400) {
            $m->image = $img;
          }
        }

        $config = $m->config;
        $config['active'] = $request->input('active') == 1 ? true : false;
        $config['comentario'] = $request->input('active_comentario') == 1 ? true : false;

        $config['password'] = $request->input('pass');
        $config['is_password'] = $request->input('active_pass') == 1 ? true : false;

        $m->config = $config;

        $m->save();
        return redirect()->route('muro.edit',$m->id)->with('success','Se ha creado correctamente');
      } catch (\Throwable $th) {

        return $th;
        return back()->with('danger','Error intente nuevamente');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
