@extends('todos.layout')
@section('content')
<div class="flex justify-center border-b ">
<h1 class="text-2xl">All your Todos</h1>
<a href="/todos/create" class="py-2 px-2 bg-blue-300 rounded curser-pointer mx-5">Create new</a>
</div>
   <x-alert/>
   @if($todos->count()>0)
   <ul class="my-6">
        @foreach($todos as $todo)
    <li class="flex justify-between  py-1">
    <div>
    @include('todos.complete')
    </div>
        @if($todo->completed)
         <p class="line-through">{{$todo->title}}</p>
         @else
       
     <a href="{{route('todo.show',$todo->id)}}" class="curser-pointer">  {{$todo->title}}</a>
         @endif
         <div>
         <a href="{{'/todos/'.$todo->id.'/edit'}}" class=" text-orange-400 curser-pointer text-white">
         <span class="fas fa-edit px-2"/>
         </a>

         <span onclick="event.preventDefault();if(confirm('Are you want to delete this task')){document.getElementById('form-delete-{{$todo->id}}').submit()}"  class="fas fa-trash text-red-500 px-2 curser-pointer"/>
         <form style="display:none" id="{{'form-delete-'.$todo->id}}" method="post" action="{{route('todo.delete',$todo->id)}}">
        @csrf
        @method('delete')
        </form>
        
         </div>
   </li>
        @endforeach
    </ul>
    @else
    <p>No task available</p>
    @endif
@endsection