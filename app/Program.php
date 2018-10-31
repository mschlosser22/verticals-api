<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //RELATIONSHIPS
    public function subvertical() {
    	return $this->belongsTo('App\SubVertical');
    }

    protected $fillable = ['id', 'school_name', 'code', 'name', 'vertical_name', 'subvertical_name', 'special_program_type'];
}
