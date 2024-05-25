<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'users_matieres');
    }

    public function demandes(){
        return $this->hasMany(Demande::class);
    }
}

