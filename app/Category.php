<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['Type'];
    protected $primaryKey = 'Id_Category';
}
