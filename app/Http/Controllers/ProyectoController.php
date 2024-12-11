<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    // Muestra la lista de proyectos
    public function index()
    {
        $proyectos = proyecto::orderby('created_at', 'desc')->get();
        $proyectos = Proyecto::all();
        return view('profesor.index')->with('proyectos', $proyectos);
    }

    // Muestra el formulario para crear un proyecto
    public function create()
    {
        return view('profesor.create');
    }

    // Guarda un nuevo proyecto en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estudiante_id' => 'required|integer',
            'profesor_id' => 'required|integer',
            'estado' => 'required|string',
        ]);


        $proyecto = Proyecto::create([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'estado' => $validated['estado'],
            'estudiante_id' => $validated['estudiante_id'],
            'profesor_id' => $validated['profesor_id'],
        ]);

        return redirect()->route('profesor.index')->with('success', 'Proyecto creado con éxito.');
    }

    // Muestra los detalles de un proyecto
    public function show($id)
    {

        $proyecto = Proyecto::with('comentarios')->findOrFail($id);
        return view('profesor.show', compact('proyecto'));
    }

    // Muestra el formulario para editar un proyecto
    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('profesor.edit', compact('proyecto'));
    }

    // Actualiza un proyecto existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estudiante_id' => 'required|integer',
            'profesor_id' => 'required|integer',
            'estado' => 'required|string|max:50',
        ]);

        $proyecto = Proyecto::findOrFail($id);
        $proyecto->update($request->all());

        return redirect()->route('profesor.index')->with('success', 'Proyecto actualizado con éxito.');
    }

    // Elimina un proyecto
    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('profesor.index')->with('success', 'Proyecto eliminado con éxito.');
    }
}
