<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CommentaireTuteur;
use App\Models\Demande;
use App\Models\Domaine;
use App\Models\Matiere;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function adduser(){
        $domaines= Domaine::all();
        $matieres = Matiere::all();
        return view('admin.adduser',compact('domaines','matieres'));
    }
    public function demandes(){
        $demandes =Demande::paginate(9);
        return view('admin.demandes',['demandes'=>$demandes]);
    }

    public function domaines()
    {
        $domaines = Domaine::all();
        return view('admin.domaine', ['domaines' => $domaines]);
    }

    public function storeDomaine(Request $request)
    {
        $request->validate([
            'domaine' => ['required']
        ]);

        $domaine = new Domaine();
        $domaine->libelle = $request->domaine;
        $domaine->save();

        return redirect()->back()->with(['storeDomaineSucces' => 'domaine ajouté !!!']);
    }


    public function destroyDomaine(Request $request)
    {
        if ($request->ajax()) {
            $matiere = Matiere::where('domaine_id', $request->input('id'))->get()->count();
            if ($matiere > 0)
                return response()->json($matiere);
            else {
                Domaine::where('id', $request->input('id'))->delete();
                return 0;
            }
        }
    }

    public function storeMatiere(Request $request)
    {
        $request->validate([
            'matiere' => ['required']
        ]);

        $matiere = new Matiere();
        $matiere->libelle = $request->input('matiere');
        $matiere->domaine_id = $request->input('id_domaine');
        $matiere->save();
        return redirect()->back()->with(['storeMatiereSucces'=>'matiere ajoutée!!!!!']);
    }

    public function getMatieresDomaine(Request $request)
    {
        if ($request->ajax()) {
            $matieres = response()->json(Matiere::where('domaine_id', $request->input('id'))->get());
            return response()->json($matieres);
        }
    }

    public function destroyMatiere(string $id)
    {
        Matiere::where('id',$id)->delete();
        return redirect()->back()->with(['deleteMatiereSucces'=>'matiere supprimé!!!']);
    }



    public function etudiants()
    {
        $etudiants = Demande::paginate(9);
        return view('admin.etudiants', ['etudiants' => $etudiants]);
    }

    /**
     * Display the specified resource.
     */
    public function showEtudiant(string $id)
    {
        $demandes = Demande::where('id',$id)->get();
        $commentaires = CommentaireTuteur::where('demande_id',$id)->get();
        $nom = "dddd";
        return view('admin.zoomEtudiant',['demandes'=>$demandes,'nom'=>$nom,'commentaires'=>$commentaires]);
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

}
