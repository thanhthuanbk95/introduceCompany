<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'information';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'address', 'email', 'phone', 'facebook', 'twitter', 'google', 'pinterest'];
    public $timestamps = true;
}
