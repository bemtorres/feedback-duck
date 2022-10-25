<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Services\ImportImage;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $salas = Sala::with('usuario')->get();

      return view('admin.sala.index',compact('salas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return  view('admin.sala.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        $s = new Sala();
        $s->nombre = $request->input('nombre');
        $s->url = time();
        $s->id_usuario = current_user()->id;

        if(!empty($request->file('image'))){
          $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

          $filename = time();
          $folder = 'public/photo_rooms';
          $img = ImportImage::save($request, 'image', $filename, $folder);

          if ($img != 400) {
            $s->image = $img;
          }
        }

        $s->save();
        return redirect()->route('sala.index')->with('success','Se ha creado correctamente');
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
      $s = Sala::with(['muros','muros.usuario','muros.feedbacks'])->findOrFail($id);

      return view('admin.sala.show',compact('s'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $s = Sala::findOrFail($id);

      return view('admin.sala.edit',compact('s'));
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
        $s = Sala::findOrFail($id);
        $s->nombre = $request->input('nombre');

        if(!empty($request->file('image'))){
          $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

          $filename = time();
          $folder = 'public/photo_rooms';
          $img = ImportImage::save($request, 'image', $filename, $folder);

          if ($img != 400) {
            $s->image = $img;
          }
        }

        $config = $s->config;
        $config['active'] = $request->input('active') == 1 ? true : false;
        $s->config = $config;

        $s->update();
        return redirect()->route('sala.edit',$s->id)->with('success','Se ha creado actializado');
      } catch (\Throwable $th) {
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
