<?php

namespace App\Http\Controllers;

use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $data = $request->validate([
            'titulo' => 'required|min:6'
        ]);

        DB::table('recetas')->insert([
            'titulo' => $data['titulo']
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
