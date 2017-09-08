<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $fillable = ['id','id_paper','name'];
}
