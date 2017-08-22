<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentCat extends Model
{
    protected $table = 'parentcategory';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name'];
}
