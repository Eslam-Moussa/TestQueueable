<option value="">اختر</option>
@if(!empty($City))
@foreach($City as $get)
<option value="{{$get->id}}">{{$get->city_name}}</option>
@endforeach
@endif
