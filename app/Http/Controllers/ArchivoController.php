<?php

namespace App\Http\Controllers;

use App\Models\archivo;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    public function index($id)
    {

        $archivos = Archivo::where('id', $id->get());
        return view('estudiante.index', compact('archivos', 'id'));
    }

    public function store(Request $request, $id)
    {

        $request->validate([
            'archivo' => 'required|mimes:jpg,jpeg,png,pdf,docx|max:10240', // Limitar los tipos y el tamaño
        ]);


        $archivoPath = $request->file('archivo')->store('archivos'); // Puedes elegir otra carpeta en 'storage'


        Archivo::create([
            'nombre' => $request->file('archivo')->getClientOriginalName(),
            'ruta' => $archivoPath,
            'proyecto_id' => $id,
        ]);

        return back()->with('success', 'Archivo cargado exitosamente');
    }

    public function download($id)
    {
        $archivo = Archivo::findOrFail($id);

        // Descarga el archivo desde el almacenamiento
        return Storage::download($archivo->ruta, $archivo->nombre);
    }

}
