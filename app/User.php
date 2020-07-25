<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function uploadImage($image){
        $filename=$image->getClientOriginalName();
       
        if(auth()->user()->$image){
            dd($filename);
            storage::delete('/public/images/'.auth()->user()->image);
        }
        $image->storeAs('images',$filename,'public');
        ///for particular id need to update for one column then use line 20
        ///User::find(1)->update(['image'=>$filename]);
        ///for every user in a table need an update for one cloumn the use line 22
        auth()->user()->update(['image'=>$filename]);
      
    }
   
    public function todos(){
        return $this->hasMany(Todo::class);
    }

     


}
