<?php

namespace App\Http\Controllers;

use App\Post as PostEloquent;
use App\PostType as PostTypeEloquent;

use Request;
use Redirect;
use View;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Redirect::action('PostController@index');
    }


    public function search(){
        if(!Request::has('keyword')){
            return Redirect::back();
        }
    	$keyword = Request::get('keyword');
        $posts = PostEloquent::where('title','LIKE',"%$keyword%")->orderBy('created_at','DESC')->paginate(5);
        $post_types = PostTypeEloquent::orderBy('name','ASC')->get();
        return View::make('post.index',['posts'=>$posts,'post_types'=>$post_types,'keyword'=>$keyword]);
    }
}
