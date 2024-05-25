<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TutoratsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return View('tutorats.index');
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
        #return View('films.zoomFilm', compact('film'));
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
               
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getMatieres(Request $request){
        if ($request->ajax()){
            return response()->json(Matiere::where('domaine_id',$request->input('domaine_id'))->get());
        }
    }



}
