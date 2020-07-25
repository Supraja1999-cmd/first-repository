<?php

namespace App\Http\Controllers;
use App\Todo;
use App\Step;
use resources;
use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use Illuminate\Support\Facades\Validator;
class TodoController extends Controller
{
    public function index(){
        $todos=auth()->user()->todos()->orderBy('completed')->get();
      // return $todos;
        return view('todos.index',compact('todos'));
    }
    public function create(){
        return view('todos.create');
    }


    public function store(TodoCreateRequest $request){
     // $userId=auth()->id();
     // $request['user_id']=$userId;
        //Todo::create($request->all());
      $todo=auth()->user()->todos()->create($request->all());
      if($request->step){
      foreach($request->step as $step){
          $todo->steps()->create(['name'=>$step]);
      }
    }
       return redirect(route('todo.index'))->with('message','Todo list created successfully');
    }


    public function edit(Todo $todo){
       
        return view('todos.edit',compact('todo'));
    }
    public function update(TodoCreateRequest $request,Todo $todo){
     $todo->update(['title'=>$request->title]);
     $todo->update(['description'=>$request->description]);
     if($request->stepName){
        foreach($request->stepName as $key=>$value){
            $id=$request->stepId[$key];
            if(!$id){
                $todo->steps()->create(['name'=>$value]);
            }
            else{
                $step=Step::find($id);
                $step->update(['name'=>$value]);
            }
            
        }
      }
     return redirect(route('todo.index'))->with('message',"updated!");
    }
    public function complete(Todo $todo){
       $todo->update(['completed'=>true]);
        return redirect()->back()->with('message','Task marked successfully');
    }
    public function incomplete(Todo $todo){
        $todo->update(['completed'=>false]);
         return redirect()->back()->with('message','Task unmarked successfully');
     }
     public function delete(Todo $todo){
        $todo->steps->each->delete();
        $todo->delete();
         return redirect()->back()->with('message','Task deleted');
 
     }
     public function show(Todo $todo){
        return view('todos.show',compact('todo'));
    }   
}
