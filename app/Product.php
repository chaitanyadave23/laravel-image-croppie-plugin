<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Category;
class Product extends Model
{
    public function insertProduct($request){
    	$product = new Product;	
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category');
        $product->save();
    }
}