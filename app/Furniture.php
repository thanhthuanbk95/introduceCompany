<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    protected $table = 'papers';
    protected $primaryKey = 'id';
    protected $fillable = ['id','id_cat', 'id_user','title'];
}
