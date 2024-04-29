<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = ['telephone', 'email', 'statut', 'user_id'];

    public function tuteur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}