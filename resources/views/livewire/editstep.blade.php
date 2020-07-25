<div style="text-align: center">
<h2 class="text-2xl">Add steps 
 <span wire:click="increment" class="fas fa-plus px-2 cursor-pointer text-gray-800"/></h2>

 @foreach($steps as $step)
 <div class="flex justify-center py-2" wire:key="{{$loop->index}}">
 @if(isset($step['name']))
 
  <input type="text" name="stepName[]" class="px-2 py-3 border rounded" placeholder="{{'describe step'.($loop->index+1)}}" 
  value="{{$step['name']}}"/>
  
  <input type="hidden" name="stepId[]"  value="{{$step['id']}}"/>
  @endif
 <span class="fas fa-times text-red-500 px-1 py-3 cursor-pointer" wire:click="remove({{$loop->index}})"/>
 </div>
@endforeach
</div>