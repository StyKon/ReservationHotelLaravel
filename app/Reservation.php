<?php

namespace App;
use App\Hotel;
use App\Chambre;
use App\Client;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable =['DateDebut','DateFin','Id_Client','Id_Hotel','Id_Chambre'];
    protected $primaryKey = 'Id_Reservation';
    public function client (){
        return $this->belongsTo('App\Client','Id_Client');
    }


    public function hotel (){
        return $this->belongsTo('App\Hotel','Id_Hotel');
    }
    public function chambre (){
        return $this->belongsTo('App\Chambre','Id_Chambre');
    }


}
