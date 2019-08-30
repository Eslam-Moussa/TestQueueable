@if(!empty($StorePro))
@foreach($StorePro as $Pro)
<tr id="product_row_{{$Pro->id}}">
<td>{{$Pro->product_name}}<input name="prodect_id_two[]" value="{{$Pro->id}}" type="hidden" /></td>
<td>
  {{$Pro->Main_bar_code}}
  <br>
  {{$Pro->Main_bar_code_two}} <input name="product_parcode_two[]" value="{{$Pro->Main_bar_code}}" type="hidden" />
</td>
<td class="store_id_{{$Pro->store_id}}">{{$Pro->store_name}}<input name="stored_id_two[]" value="{{$Pro->store_id}}" type="hidden" /></td>
<td class="color_id_{{$Pro->color_id}}">{{$Pro->color_name}}<input name="color_id_two[]" value="{{$Pro->color_id}}" type="hidden" /></td>
<td class="size_id_{{$Pro->size_id}}">{{$Pro->size_value}}<input name="size_id[]" value="{{$Pro->size_id}}" type="hidden" /></td>
<td class="current_value">
@if($Pro->current == 0)
{{$Pro->size_number}}
@else 
{{$Pro->current}} 
@endif
</td>
<td class="price_three_{{$Pro->Sector_price}}">{{$Pro->Sector_price}}<input name="Sector_price_ax[]" value="{{$Pro->Sector_price}}" type="hidden" /></td>
<td class="price_one_{{$Pro->Wholesale_price}}">{{$Pro->Wholesale_price}}<input name="Wholesale_price_ax[]" value="{{$Pro->Wholesale_price}}" type="hidden" /></td>
<td class="price_four_{{$Pro->Wholesale_price_two}}">{{$Pro->Wholesale_price_two}}<input name="Wholesale_price_two_ax[]" value="{{$Pro->Wholesale_price_two}}" type="hidden" /></td>
<td class="price_two_{{$Pro->Wholesale_price_three}}">{{$Pro->Wholesale_price_three}}<input name="Wholesale_price_three_ax[]" value="{{$Pro->Wholesale_price_three}}" type="hidden" /></td>
<td><input type="text" name="single_product_count[]" class="form-control" placeholder="أضف رقم فقط.." /></td>
<td><button type="button" class="btn btn-lg btn-primary addthisproduct store">أضف</button></td>
<input name="Maximum_four[]" value="{{$Pro->Maximum_four}}" type="hidden" />
<input name="number_size_two[]" value="{{$Pro->size_number}}" type="hidden" />
<td class="checked_id_{{$Storechecked->current}}"><input name="checked_id[]" value="{{$Storechecked->current}}" type="hidden" /></td>
</tr>
@endforeach
@endif 