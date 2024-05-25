<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
 
class Tutorat extends Model
{
    use HasFactory;
 
   protected $fillable = ['nom', 'prenom', 'domaine', 'image'];
 
    public function tutorats(){
        return $this->belongsToMany('App\Models\Tutorat');
    }
}
 