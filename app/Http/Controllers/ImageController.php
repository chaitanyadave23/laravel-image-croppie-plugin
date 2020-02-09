<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Candidate;

class ImageController extends Controller
{
	function uploadImage(Request $request){

        	$image = $request->image;                
                list($type, $image) = explode(';', $image);
                list(, $image) = explode(',', $image);
                $image = base64_decode($image);
                $image_name = time().'.png';
                $path = public_path('upload/'.$image_name);
                session(['img' => $image]);
                session(['imgname' => $image_name]);                        
                return $image;                                                                                
	}
}
