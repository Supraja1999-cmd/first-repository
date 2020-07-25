@extends('todos.layout')
@section('content')
<div class="flex justify-between border b">
<h1 class="text-2xl">Update your Todo list</h1>
<a href="{{route('todo.index')}}" class=" py-2 text-gray-400 cursor-pointer text-white">
         <span class="fas fa-arrow-circle-left px-2"/>
         </a>
</div>
   <x-alert/>
   <form action="{{route('todo.update',$todo->id)}}" method="post" class="py-5">
    @csrf
    @method('patch')
    <div class="py-1">
    <input type="text" name="title" value="{{$todo->title}}" class="px-2 py-3 border rounded" placeholder="title"/>
    </div>
    <div class="py-1">
    <textarea name="description" class="px-2 py-3 rounded border" value="{{$todo->description}}"
              placeholder="description">{{$todo->description}}</textarea>
    </div>
    <div class="py-1">
    
    @livewire('editstep',['steps'=>$todo->steps])
    
    </div>
    <div class="py-2">
    <input type="submit" value="update" class="p-2 border rounded cursor-pointer"/>
    </div>
    </form>
    
@endsection