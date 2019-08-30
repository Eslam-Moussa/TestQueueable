<option value="">اختر</option>
@if(!empty($Area))
@foreach($Area as $get)
<option value="{{$get->id}}">{{$get->area_name}}</option>
@endforeach
@endif