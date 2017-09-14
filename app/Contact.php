<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $fillable = ['id','fullname','email','phone','content','created_at','updated_at','reply',
                            'id_user','reply_time'];
}
