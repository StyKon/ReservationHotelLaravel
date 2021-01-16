<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    protected $fillable =['Nom','Prenom','Login','Password'];
    protected $primaryKey = 'Id_Administrateur';
}
