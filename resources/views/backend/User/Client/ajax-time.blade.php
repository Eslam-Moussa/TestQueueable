
@if(!empty($TypeTime))
@foreach($TypeTime as $get)
<option value="{{$get->id}}">{{$get->clienttyp_close_order}}</option>
@endforeach
@endif