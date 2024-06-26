<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Domaine;
use App\Models\Matiere;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $domaines= Domaine::all();
        $matieres = Matiere::all();
        return view('auth.register',compact('domaines','matieres'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'telephone' =>['required','string','min:10','max:10'],
            'matieres'=>['required'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

         $user = new User();
         $user->name= $request->nom;
        $user->surname= $request->prenom;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);
         $user->domaine_id = $request->domaine;
        $user->telephone = $request->telephone;
        $user->role_id = 1;
         $user->save();

        for($i=0;$i<count($request->matieres);$i++){
            DB::table('users_matieres')->insert([
                'user_id'=>$user->id,
                'matiere_id'=>$request->matieres[$i]
            ]);
        }
         //event(new Registered($user));

        if(Auth::user()){
            return redirect()->route('admin.users')->with('register','compte créé');
        }else{
            Auth::login($user);
            return redirect()->route('tutorat.index')->with('register','compte créé');
        }
    }
}
