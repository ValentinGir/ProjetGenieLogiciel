<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function matieres(){
        return $this->hasMany(Matiere::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
