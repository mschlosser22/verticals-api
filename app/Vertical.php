<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vertical extends Model
{
    //RELATIONSHIPS
    public function school() {
    	return $this->belongsTo('App\School');
    }

    //RELATIONSHIPS
    public function subverticals() {
    	return $this->hasMany('App\Subvertical');
    }

    protected $fillable = ['id', 'school_name', 'name'];
}
