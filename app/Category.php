<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function insertCategory($request){
    	$category = new Category;    	
    	$category->name = $request->input('name');    	
    	$category->description = $request->input('description');
    	echo "hello"; 	
    	$category->save();
    }

    public function product(){
    	return $this->hasMany('App\Product','category_id');
    }


}
