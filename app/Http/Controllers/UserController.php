<?php

namespace App\Http\Controllers;

use \Carbon\Carbon as Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserAvatarRequest;

use App\User as UserEloquent;

use Auth;
use View;
use File;
use Redirect;

class UserController extends Controller
{
    public function getAvatar(){
    	return View::make('user.avatar');
    }

    public function postAvatar(UserAvatarRequest $request){
    	if(!$request->hasFile('avatar')){
    		return Redirect::route('post.index');
    	}
    	$file = $request->file('avatar');
    	$destinationPath = 'uploads/avatar';
    	if(!file_exists(public_path().'/'.$destinationPath)){
    		File::makeDirectory(public_path().'/'.$destinationPath , 0755, true);
    	}
		$ext = $file -> getClientOriginalExtension();
		$fileName = (Carbon::now()->timestamp).'.'.$ext;
		$file->move(public_path().'/'.$destinationPath, $fileName);
		$user = Auth::user();
		$user -> avatar = $destinationPath.'/'.$fileName;
		$user -> save();
		return Redirect::route('post.index');
    }
}
