<?php

namespace App\Http\Controllers;

use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return  view('recetas.index');
    }

  
    public function create()
    {

        // DB::table('categoria_receta')->get()->pluck('nombre', 'id')->dd();
        $categorias = DB::table('categoria_receta')->get()->pluck('nombre', 'id');

        return view('recetas.create')->with('categorias', $categorias);
    }

 
    public function store(Request $request)
    {

        // Vaidamos campos del formulario
        $data = $request->validate([
            'titulo'       => 'required|min:6',
            'preparacion'  => 'required',
            'ingredientes' => 'required',
            'imagen'       => 'required|image',
            'categoria'    => 'required',
        ]);

        // Obtener ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        // Resize de la imagen
        $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $img->save();

        // Insertamos en la tabla
        DB::table('recetas')->insert([
            'titulo'       => $data['titulo'],
            'preparacion'  => $data['preparacion'],
            'ingredientes' => $data['ingredientes'],
            'imagen'       => $ruta_imagen,
            'user_id'      => Auth::user()->id,
            'categoria_id' => $data['categoria'],
        ]);


        // Redireccionar
        return redirect()->action('RecetaController@index');
    }

    public function show(Receta $receta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
