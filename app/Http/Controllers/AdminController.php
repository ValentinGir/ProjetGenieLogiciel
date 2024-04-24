<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        //
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

}
