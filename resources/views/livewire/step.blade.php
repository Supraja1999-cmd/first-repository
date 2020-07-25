<div style="text-align: center">
<h2 class="text-2xl">Add steps 
 <span wire:click="increment" class="fas fa-plus px-2 cursor-pointer text-gray-800"/></h2>

 @foreach($steps as $step)
 <div class="flex justify-center py-2" wire:key="{{$step}}">
  <input type="text" name="step[]" class="px-2 py-3 border rounded" placeholder="{{'describe step'.($step+1)}}"/>
 <span class="fas fa-times text-red-500 px-1 py-3 cursor-pointer" wire:click="remove({{$step}})"/>
 </div>
@endforeach
</div>