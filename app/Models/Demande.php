<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
<<<<<<< HEAD
    public function user(){
        return $this->belongsTo(User::class);
    }
}
=======

    protected $fillable = ['telephone', 'email', 'statut', 'user_id'];

    public function tuteur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
>>>>>>> 7d41cf973112384ab901e1bf8a8f2908d7cf6e25
