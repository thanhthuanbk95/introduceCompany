<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndexImage extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['id','name'];
}
