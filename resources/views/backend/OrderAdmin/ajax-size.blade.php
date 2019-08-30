@if(!empty($StoreSize))
@foreach($StoreSize as $size)
<tr id="product_row_{{$size->id}}">
<td>{{$size->product_name}}<input name="prodect_id_two[]" value="{{$size->id}}" type="hidden" /></td>
<td>
  {{$size->Main_bar_code}}
  <br>
  {{$size->Main_bar_code_two}}<input name="product_parcode_two[]" value="{{$size->Main_bar_code}}" type="hidden" />
</td>
<td class="store_id_{{$size->store_id}}">{{$size->store_name}}<input name="stored_id_two[]" value="{{$size->store_id}}" type="hidden" /></td>
<td class="color_id_{{$size->color_id}}">{{$size->color_name}}<input name="color_id_two[]" value="{{$size->color_id}}" type="hidden" /></td>
<td class="size_id_{{$size->size_id}}">{{$size->size_value}}<input name="size_id[]" value="{{$size->size_id}}" type="hidden" /></td>
<td class="current_value">
@if($size->current == 0)
{{$size->size_number}}
@else 
{{$size->current}}
@endif
</td>
<td class="price_three_{{$size->Sector_price}}">{{$size->Sector_price}}<input name="Sector_price_ax[]" value="{{$size->Sector_price}}" type="hidden" /></td>
<td class="price_one_{{$size->Wholesale_price}}">{{$size->Wholesale_price}}<input name="Wholesale_price_ax[]" value="{{$size->Wholesale_price}}" type="hidden" /></td>
<td class="price_four_{{$size->Wholesale_price_two}}">{{$size->Wholesale_price_two}}<input name="Wholesale_price_two_ax[]" value="{{$size->Wholesale_price_two}}" type="hidden" /></td>
<td class="price_two_{{$size->Wholesale_price_three}}">{{$size->Wholesale_price_three}}<input name="Wholesale_price_three_ax[]" value="{{$size->Wholesale_price_three}}" type="hidden" /></td>

<td><input type="text" name="single_product_count[]" class="form-control" placeholder="أضف رقم فقط.." /></td>
<td><button type="button" class="btn btn-lg btn-primary addthisproduct color">أضف</button></td>
<input name="Maximum_four[]" value="{{$size->Maximum_four}}" type="hidden" />
<input name="number_size_two[]" value="{{$size->size_number}}" type="hidden" />
</tr>
@endforeach
@endif