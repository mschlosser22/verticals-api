<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //RELATIONSHIPS
    public function verticals() {
    	return $this->hasMany('App\Vertical');
    }

    protected $fillable = ['id', 'name'];

}
