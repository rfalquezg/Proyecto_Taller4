<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    // Mostrar todas las solicitudes
    public function index()
    {
        $solicitudes = Solicitud::all();
        return view('solicitudes.index', compact('solicitudes'));
    }

    // Mostrar formulario para crear una nueva solicitud
    public function create()
    {
        return view('solicitudes.create');
    }

    // Guardar una nueva solicitud
    public function store(Request $request)
    {
        $request->validate([
            'tema' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'area' => 'required|string|max:255',
            'fecha_registro' => 'required|date',
            'fecha_cierre' => 'nullable|date',
            'estado' => 'required|in:Solicitud,Aprobado,Rechazado',
            'observacion' => 'nullable|string',
            'usuarioExt' => 'nullable|integer',
        ]);

        Solicitud::create($request->all());

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud creada exitosamente.');
    }

    // Mostrar una solicitud específica
    public function show($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        return view('solicitudes.show', compact('solicitud'));
    }

    // Mostrar el formulario para editar una solicitud existente
    public function edit($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        return view('solicitudes.edit', compact('solicitud'));
    }

    // Actualizar la solicitud
    public function update(Request $request, $id)
    {
        $request->validate([
            'tema' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'area' => 'required|string|max:255',
            'fecha_registro' => 'required|date',
            'fecha_cierre' => 'nullable|date',
            'estado' => 'required|in:Solicitud,Aprobado,Rechazado',
            'observacion' => 'nullable|string',
            'usuarioExt' => 'nullable|integer',
        ]);

        $solicitud = Solicitud::findOrFail($id);
        $solicitud->update($request->all());

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada correctamente.');
    }

    // Eliminar una solicitud
    public function destroy($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->delete();

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada.');
    }
}
