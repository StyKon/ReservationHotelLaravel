<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hotel;
class Image extends Model
{
    protected $fillable =['Nom','Path','Id_Hotel'];
    protected $primaryKey = 'Id_Image';

    public function hotels (){
        return $this->belongsTo('App\Hotel','Id_Hotel');
    }
}
