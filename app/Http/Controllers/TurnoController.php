<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class TurnoController extends Controller
{
    public function index()
    {
        $turno = Turno::all();
        return Inertia::render('Turno/Index', ['turno' => $turno]);
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
        return Inertia::render('Turno/Create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'hora' => ['required']



        ])->validate();

        Turno::create($request->all());

        return redirect()->route('turno.index');
    }

    public function edit(Turno $turno )
    {
        return Inertia::render('Turno/Edit', [
            'turno' => $turno
        ]);
    }

    public function update(Request $request, $id)
    {
        {
            Validator::make($request->all(), [
                'hora' => ['required'],

            ])->validate();

            Turno::find($id)->update($request->all());
            return redirect()->route('turno.index');
    }
    }
    public function destroy($id)
    {
        Turno::find($id)->delete();
        return redirect()->route('turno.index');
    }
}
