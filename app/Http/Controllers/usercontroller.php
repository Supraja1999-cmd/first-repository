<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class usercontroller extends Controller
{
  /*public function uploadImage(Request $request)

{
  if($request->hasFile('image')){
   $filename=$request->image->getClientOriginalName();
   $this->deleteOldImage();
   $request->image->storeAs('images',$filename,'public');
   auth()->user()->update(['image'=>$filename]);
  }
//return redirect()->back();
}
protected function deleteOldImage(){
  if(auth()->user()->image){
    storage::delete('/public/images/'.auth()->user()->image);
  }
}*/
public function uploadImage(Request $request){
  if($request->hasFile('image')){
    User::uploadImage($request->image);
  //  session()->put('message','Image uploaded');
  //$request->session()->flash('message','image uploaded');
return redirect()->back()->with('message','Image uploaded');  
}
  //$request->session()->flash('error','image not uploaded');
  return redirect()->back()->with('error','Image not uploaded');
}




    public function index(){
           
      //Inserting a row in table using eloquent object

      

       // DB::insert('insert into users(name,email,password) values(?,?,?)',['supraja','lakshmisuprajapinni09@gmail.com','password']);
      //  return 'I am in user controller';
    //  DB::update('update users set name=? where id=1',['Lakshmi']);
    //DB::delete('delete from users where id=1');
      //$users=DB::select('select *from users');
      //return $users;

   //   $user=new User();
     // dd($user);
    }
    public function index2(){
        DB::insert('insert into failed_jobs(connection,queue,payload,exception) values(?,?,?,?)',['supraja','lakshmi','longtext','exception']);

    }
}
