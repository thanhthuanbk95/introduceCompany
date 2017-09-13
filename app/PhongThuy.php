<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhongThuy extends Model
{
    protected $table = 'phongthuy';
    protected $primaryKey = 'id';
    protected $fillable = ['id','title', 'preview_text', 'detail_text','feature_image'];
}
