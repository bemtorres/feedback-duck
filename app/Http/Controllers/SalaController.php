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
        $s->url = $s->nombre;
        $s->id_usuario = current_user()->id;

        if(!empty($request->file('image'))){
          $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

          $filename = 'room-' . time();
          $folder = 'sala';
          $s->image = ImportImage::save($request, 'image', $filename, $folder);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
