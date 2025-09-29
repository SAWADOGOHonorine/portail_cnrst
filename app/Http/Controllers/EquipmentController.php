<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment; // si tu as un modèle Equipment

class EquipmentController extends Controller
{
    // Afficher la liste
    public function index()
    {
        $equipments = Equipment::all();
        return view('equipment', compact('equipments'));
    }

    // Afficher un formulaire de création
    public function create()
    {
        return view('equipment.create');
    }

    // Enregistrer un nouvel équipement
    public function store(Request $request)
    {
        Equipment::create($request->all());
        return redirect()->route('equipment')->with('success', 'Équipement ajouté avec succès');
    }
}

