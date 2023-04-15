<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Pelicula;
use Illuminate\Support\Facades\Validator;

class PeliculaController extends Controller
{
    public function index()
    {
        $pelicula = Pelicula::all();
        return Inertia::render('Pelicula/Index', ['pelicula' => $pelicula]);
    }
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function show($id)
    {
        // Código para mostrar una película específica por ID
    }

    public function create()
    {
        return Inertia::render('Pelicula/Create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nombre' => ['required'],
            'fecha_publicacion' => ['required'],
            'imagen' => ['required'],


        ])->validate();

        Pelicula::create($request->all());

        return redirect()->route('pelicula.index');
    }

    public function edit(pelicula $pelicula )
    {
        return Inertia::render('Pelicula/Edit', [
            'pelicula' => $pelicula
        ]);
    }

    public function update(Request $request, $id)
    {
        {
            Validator::make($request->all(), [
                'nombre' => ['required'],
                'fecha_publicacion' => ['required'],
                'imagen' => ['required']
            ])->validate();

            Pelicula::find($id)->update($request->all());
            return redirect()->route('pelicula.index');
    }
    }
    public function destroy($id)
    {
        Pelicula::find($id)->delete();
        return redirect()->route('pelicula.index');
    }
}
