<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function city(){

    	 return $this->hasMany('App\City','state_id'); 	 
    }
    public function getAll(){
    	$states = State::all();
    	return $states;
    }
    public function stateName($value){
    	$state = State::where('name',$value)->get();
    	return $state;
    }
}
