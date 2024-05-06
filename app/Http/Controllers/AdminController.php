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
    public function demandes(Request $request){
        $demandes =Demande::paginate(9);
        if($request->has('statut')){
            if($request->input('statut')==1 || $request->input('statut')==0){
                $demandes = Demande::where('statut',$request->input('statut'))->paginate(9);
            }
        }

        return view('admin.demandes',['demandes'=>$demandes,'domaines'=>Domaine::all()]);
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
    public function edituser($id)
    {
        $domaines= Domaine::all();
        $matieres = Matiere::all();
        $user = User::findOrFail($id);
        return view('admin.edituser', compact('user','domaines','matieres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$id,
            'telephone' => 'required|string',
            'domaine' => 'required|exists:domaines,id',
            'matieres' => 'required|array|min:1',
            'password' => 'nullable|string|min:8',
        ]);
        
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->domaine_id = $request->domaine;
        $user->matieres()->sync($request->matieres);
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        
        return redirect()->route('admin.users')->with('success', 'Utilisateur mis à jour avec succès.');

        
    }

    public function getMatieresByDomaine(Request $request)
    {
        $domaine_id = $request->input('domaine_id');

        $matieres = Matiere::where('domaine_id', $domaine_id)->get();
        return response()->json($matieres);
    }

}
