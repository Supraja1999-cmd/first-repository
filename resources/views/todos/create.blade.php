@extends('todos.layout')
@section('content')
<div class="flex justify-between border b">
<h1 class="text-2xl">What next you want to do</h1>
<a href="{{route('todo.index')}}" class=" py-2 text-gray-400 curser-pointer text-white">
         <span class="fas fa-arrow-circle-left px-2"/>
         </a>
</div>
   <x-alert/>
   <form action="/todos/create" method="post" class="py-5">
    @csrf
    <div class="py-1">
    <input type="text" name="title" class="px-2 py-3 border rounded" placeholder="title"/>
    </div>
    <div class="py-1">
    <textarea name="description" class="px-2 py-3 rounded border" placeholder="description"></textarea>
    </div>
    <div class="py-1">
    
    @livewire('step')
    
    </div>
    <div class="py-2">
    <input type="submit" value="create" class="p-2 border rounded"/>
    </div>
    </form>
@endsection