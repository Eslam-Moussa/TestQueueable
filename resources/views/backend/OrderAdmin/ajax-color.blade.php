
@if(!empty($StoreColor))
@foreach($StoreColor as $color)
<tr id="product_row_{{$color->id}}">
<td class="product_name">{{$color->product_name}}<input name="prodect_id_two[]" value="{{$color->id}}" type="hidden" /></td>
<td>
  {{$color->Main_bar_code}}
  <br>
  {{$color->Main_bar_code_two}} <input name="product_parcode_two[]" value="{{$color->Main_bar_code}}" type="hidden" />
</td>
<td class="store_id_{{$color->store_id}}">{{$color->store_name}}<input name="stored_id_two[]" value="{{$color->store_id}}" type="hidden" /></td>
<td class="color_id_{{$color->color_id}}">{{$color->color_name}}<input name="color_id_two[]" value="{{$color->color_id}}" type="hidden" /></td>
<td class="size_id_{{$color->size_id}}">{{$color->size_value}}<input name="size_id[]" value="{{$color->size_id}}" type="hidden" /></td>
<td class="current_value">
@if($color->current == 0)
{{$color->size_number}}
@else
{{$color->current}}
@endif
</td>
<td class="price_three_{{$color->Sector_price}}">{{$color->Sector_price}}<input name="Sector_price_ax[]" value="{{$color->Sector_price}}" type="hidden" /></td>
<td class="price_one_{{$color->Wholesale_price}}">{{$color->Wholesale_price}}<input name="Wholesale_price_ax[]" value="{{$color->Wholesale_price}}" type="hidden" /></td>
<td class="price_four_{{$color->Wholesale_price_two}}">{{$color->Wholesale_price_two}}<input name="Wholesale_price_two_ax[]" value="{{$color->Wholesale_price_two}}" type="hidden" /></td>
<td class="price_two_{{$color->Wholesale_price_three}}">{{$color->Wholesale_price_three}}<input name="Wholesale_price_three_ax[]" value="{{$color->Wholesale_price_three}}" type="hidden" /></td>

<td><input type="text" name="single_product_count[]" class="form-control" placeholder="أضف رقم فقط.." /></td>
<td><button type="button" class="btn btn-lg btn-primary addthisproduct product">أضف</button></td>
<input name="Maximum_four[]" value="{{$color->Maximum_four}}" type="hidden" />
<input name="number_size_two[]" value="{{$color->size_number}}" type="hidden" />
</tr>
@endforeach
@endif
 