<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $fillable =['Nom'];
    protected $primaryKey = 'Id_Ville';
}
