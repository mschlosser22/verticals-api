<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subvertical extends Model
{
    //RELATIONSHIPS
    public function vertical() {
    	return $this->belongsTo('App\Vertical');
    }

    //RELATIONSHIPS
    public function programs() {
    	return $this->hasMany('App\Program');
    }

    protected $fillable = ['id', 'school_name', 'name', 'vertical_name'];
}
