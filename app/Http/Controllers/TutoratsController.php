<?php

namespace App\Http\Controllers;

use App\Mail\ReponseDemande;
use App\Models\Matiere;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Tuteur;
use App\Models\Disponibilite;
use App\Models\Demande;
use Illuminate\Http\RedirectResponse;
use Redirect;
use Illuminate\Support\Facades\Auth;

class TutoratsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Supposons que vous récupérez les matières de votre modèle ici
        $matieres = Matiere::all();

        // Passer les matières à la vue
        return view('tutorats.index', ['matieres' => $matieres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeDemande(Request $request, $matiere_id, $tuteur_id)
    {
        $request->validate([
            'telephone' => ['required', 'unique:demandes,telephone'],
            'email' => ['required', 'email', 'unique:demandes,email'],
            'nom' => ['required']
        ]);


        $demande = new Demande([
            'telephone' => $request->telephone,
            'email' => $request->email,
            'nom' => $request->nom,
            'user_id' => $tuteur_id,
            'matiere_id' => $matiere_id
        ]);

        $demande->save();
        return Redirect::route('tutorat.index')->with('success', 'Votre demande a été enregistrée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getMatieres(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(Matiere::where('domaine_id', $request->input('domaine_id'))->get());
        }
    }


    public function getTuteurs(Request $request, $matiere_id)
    {
        $matiere = Matiere::find($matiere_id);

        if (!$matiere) {
            return response()->json(['error' => 'Matière non trouvée'], 404);
        }

        $tuteurs = $matiere->users->map(function ($tuteur) {
            $disponibilites = Disponibilite::where('user_id', $tuteur->id)->get();
            return [
                'id' => $tuteur->id,
                'name' => $tuteur->name,
                'disponibilites' => $disponibilites,
                'tuteurDomaine' => User::where('id', $tuteur->id)->get()->first()->domaine->libelle
            ];
        });

        return response()->json($tuteurs);
    }

    public function showContactForm(Request $request, $matiere_id, $tuteur_id)
    {
        $matiere = Matiere::find($matiere_id);
        $tuteur = User::find($tuteur_id);
        return view('tutorats.contact', compact('matiere', 'tuteur'));
    }

    public function demandes()
    {
        $demandes = Demande::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')->orderBy('statut', 'asc')
            ->get();
        return view('tutorats.demandes', ['demandes' => $demandes]);
    }

    public function accepterDemande(Demande $demande)
    {
        $demande->statut = 1;
        $demande->save();

        Mail::to($demande->email)->send(new ReponseDemande($demande));

        return redirect()->back()->with('success', 'La demande a été acceptée avec succès.');
    }

    public function matieres()
    {
        $user = Auth::user();
        $mesMatieres = collect();
        $autresMatieres = collect();

        if ($user) {
            $mesMatieres = $user->matieres()->get();
            $autresMatieres = Matiere::whereNotIn('id', $mesMatieres->pluck('id'))->get();
        }

        return view('tutorats.mesmatieres', compact('mesMatieres', 'autresMatieres'));
    }


    public function supprimerMatiere($userMatiereId)
    {
        $user = auth()->user();
        $user->matieres()->detach($userMatiereId);

        return redirect()->back()->with('success', 'La matière a été supprimée avec succès.');
    }

    public function lierMatiere(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'matiere_id' => 'required|exists:matieres,id',
        ]);

        $matiereId = $request->input('matiere_id');

        if ($user->matieres()->where('matieres.id', $matiereId)->exists()) {
            return redirect()->back()->with('error', 'Vous êtes déjà associé à cette matière.');
        }

        $user->matieres()->attach($matiereId);

        return redirect()->back()->with('success', 'La matière a été liée avec succès.');
    }
}
