@if(session()->has('message'))
  <div class="alert alert-danager"> {{session()->get('message')}}</div>
 @elseif(session()->has('error'))
   <div class="alert alert-danger">{{session()->get('error')}}
@endif