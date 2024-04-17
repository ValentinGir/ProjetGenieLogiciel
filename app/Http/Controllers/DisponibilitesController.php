<?php

namespace App\Http\Controllers;

use App\Models\Disponibilite;
use Illuminate\Http\Request;

class DisponibilitesController extends Controller
{
    public function index()
    {
        $disponibilites = auth()->user()->disponibilites()
                              ->orderBy('jour_semaine')
                              ->orderBy('heure_debut')
                              ->get();
        
        return view('disponibilites.edit', ['disponibilites' => $disponibilites]);
    }

    public function edit()
    {
        $user = auth()->user();
        $disponibilites = $user->disponibilites()
                               ->orderBy('jour_semaine')
                               ->orderBy('heure_debut')
                               ->get();
    
        return view('disponibilites.edit', ['disponibilites' => $disponibilites]);
    }
    

    public function destroy(Disponibilite $disponibilite)
    {
        $disponibilite->delete();

        return redirect()->route('disponibilites.edit')->with('success', 'Disponibilité supprimée avec succès.');
    }
    public function create()
    {
        return view('disponibilites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jour_semaine' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
        ]);
    
        auth()->user()->disponibilites()->create([
            'jour_semaine' => $request->jour_semaine,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
        ]);
    
        return redirect()->route('disponibilites.edit')->with('success', 'Disponibilité ajoutée avec succès.');
    }
}
