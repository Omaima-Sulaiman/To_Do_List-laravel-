<?php

namespace App\Modle;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function user(){
        return $this->hasOne('App\User');
//        to determin the reletion ship between task and user (one to many)
    }
    protected $fillable=['task','user_id'];
}
