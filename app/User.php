<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use URL;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function social(){
        return $this->hasOne(SocialUser::class,'user_id','id');
    }

    public function isAdmin(){
        return ($this->type == 1);
    }

    public function getAvatarUrl(){
        if(empty($this->avatar)){
            return URL::asset('img/avatar/default.png');
        }else{
            if(!preg_match("/^[a-zA-z]+:\/\//", $this->avatar)){
                return URL::asset($this->avatar);
            }else{
                return $this->avatar;
            }
        }
    }
}
