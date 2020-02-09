<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Jobs\ForgotPasswordEmailJob;
use App\User;
use App\Candidate;
use App\Product;
use App\Category;
use Auth;
use Hash;
use DB;

class ProductCategoryController extends Controller
{
    public function loginform(){
        return view('userlogin');
    }

    public function product(){
        $product = new Product;
        $products = $product->all();      
        $category = new Category;
        $categories = $category->all();
        return view('product')->with('categories',$categories)->with('products',$products);
    }

    public function addProduct(Request $request){
        $product = new Product;
        $product->insertProduct($request);        
        return redirect('product');
    }

    public function category(){
        $category = new Category;
        $categories = $category->all();        
        return view('category')->with('categories',$categories);                
    }

    public function addCategory(Request $request){

        $category = new Category;
        $category->insertCategory($request);        
        return redirect('category');                          
    }
     public function checklogin(Request $request){

        $user_data = $request->only('email','password');
        if(Auth::attempt($user_data)){    
            return redirect('/dashboard');
        }                                   
        else{
            return back()->with('error','Wrong Login Details');
        }                        
    } 

    public function successlogin(){       
      return view('dashboard');            
    }    

    public function logout(){
        Auth::logout();               
        return redirect('/userlogin');                    
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        echo $search;

        if($search != ""){
        $products = Product::where('name','like','%'.$search.'%')->get();                
        if(count($products)>0){                    
            return view('product')->withDetails($products)->withQuery($search);            
        }
        else{   
            echo "hello";
            return view('product');                                               
        }
    }
    else{
        echo "hello";
    }

    
        

        

    }
}