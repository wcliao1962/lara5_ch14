<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostTypeRequest;

use App\Post as PostEloquent;
use App\PostType as PostTypeEloquent;

use View;
use Redirect;

class PostTypeController extends Controller
{

    public function __construct(){
        $this->middleware(['auth','admin'], ['except' => [
                'show'
            ]
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('posttype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PostTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostTypeRequest $request)
    {
        PostTypeEloquent::create($request->only('name'));
        return Redirect::route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type_id)
    {
        $type = PostTypeEloquent::findOrFail($type_id);
        $posts = PostEloquent::where('type',$type_id)->orderBy('created_at','DESC')->paginate(5);
        $post_types = PostTypeEloquent::orderBy('name','ASC')->get();
        return View::make('post.index',['posts'=>$posts,'post_types'=>$post_types,'type'=>$type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post_type = PostTypeEloquent::findOrFail($id);
        return View::make('posttype.edit',['post_type'=>$post_type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PostTypeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostTypeRequest $request, $id)
    {
        $post_type = PostTypeEloquent::findOrFail($id);
        $post_type->fill($request->only('name'));
        $post_type->save();
        return Redirect::route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_type = PostTypeEloquent::findOrFail($id);
        $post_type -> posts() -> delete();
        $post_type -> delete();
        return Redirect::route('post.index');
    }
}
