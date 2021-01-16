<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hotel;
class Client extends Model
{
    protected $fillable =['Civilite','Password','Nom','Prenom','Email','Mobile','Adresse','CodePostal','Ville','Id_Hotel'];
    protected $primaryKey = 'Id_Client';




}
