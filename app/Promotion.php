<?php

namespace App;
use App\Hotel;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable =['DateDeb','DateFin','Remise','Id_Hotel'];
    protected $primaryKey = 'Id_Promotion';

    public function hotel (){
        return $this->belongsTo('App\Hotel','Id_Hotel');
    }
}
