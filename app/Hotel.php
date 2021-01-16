<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ville;
use App\Chambre;
use App\Promotion;
use App\Category;
class Hotel extends Model
{
    protected $fillable =['Nom','Id_Ville','Id_Category'];
    protected $primaryKey = 'Id_Hotel';

    public function villes (){
        return $this->belongsTo('App\Ville','Id_Ville');
    }


    public function categorys (){
        return $this->belongsTo('App\Category','Id_Category');
    }
}
