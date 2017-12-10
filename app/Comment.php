<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

	protected $fillable = [
		'content'
	];

	public $timestamps = true;

	public function author(){
		return $this->belongsTo(User::class,'user_id','id');
	}

	public function post(){
		return $this->belongsTo(Post::class,'id','post_id');
	}

}
