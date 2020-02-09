<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function inc_count($id){

    	//$data = Post::find($id);
        $data = Post::where('pageid',$id)->get();
        foreach ($data as $user) {
        	$user->view_count +=1;    
        	$user->save();
        }
    }

    public function recieve_ip($id){

    	//$data = Post::find($id);
        $data = Post::where('pageid',$id)->get();
        foreach ($data as $user) {
         $content = $user->content;
        }       
    	return $content;
    }
                   
    public function change_ip($id,$arr){            
    	//$data = Post::find($id);
        $data = Post::where('pageid',$id)->get();

        foreach ($data as $user) {
        	$user->content = $arr;
        	$user->save();

        }
    }

}
