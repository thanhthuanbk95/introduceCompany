<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table = 'papers';
    protected $primaryKey = 'id';
    protected $fillable = ['id','id_cat','seen'];
}
