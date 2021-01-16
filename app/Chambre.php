<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Hotel;
class Chambre extends Model
{
    protected $fillable =['Num','NbPlace','Prix','Etat','Id_Hotel'];
    protected $primaryKey = 'Id_Chambre';

    public function hotels()
    {
        return $this->belongsTo('App\Hotel','Id_Hotel');
    }

}
