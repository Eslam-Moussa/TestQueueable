@if(!empty($StoreStyle))
    @foreach($StoreStyle as $style)
        <tr id="product_{{$style->pro_id}}">
            <td></td>
            <td class="product_{{$style->pro_id}}">{{$style->product_name}}<input name="prodect_id_two[]" value="{{$style->pro_id}}" type="hidden" /></td>
            <td class="color_{{$style->color_id}}">{{$style->color_name}}<input name="color_id_two[]" value="{{$style->color_id}}" type="hidden" /></td>
            <td class="size_{{$style->size_id}}">{{$style->size_value}}<input name="size_id[]" value="{{$style->size_id}}" type="hidden" /></td>
            <td>{{$style->number_size}}</td>
            <td class="count_{{$style->pro_count}}">{{$style->pro_count}}<input name="pro_count[]" value="{{$style->pro_count}}" type="hidden" /></td>

            <td>{{$style->pro_price}}<input name="pro_price[]" value="{{$style->pro_price}}" type="hidden" /></td>
            <td>{{$style->pro_price_total}}<input name="pro_price_total[]" value="{{$style->pro_price_total}}" type="hidden" /></td>
 
            <!-- <td><button type="button" class="btn btn-danger btn-sm deletedthisproduct">X</button></td> -->
            <td class="text-nowrap">
            @if($editicon == 1)
            <a data-id="{{$style->details_id}}" data-pro_count="{{$style->pro_count}}"
                                            data-target="#exampleModal" data-toggle="modal" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil text-inverse"></i></a>
            @endif                                

            <a href="{{url('/admin/DeleteOrderDetails/'.$style->id)}}"
                                            onclick="return confirm('هل تريد الحذف ! ')" class="btn btn-outline-danger btn-sm">
                                            <i class="fa fa-trash-o"></i></a>
                                            </td>
            <td><input name="product_parcode_two[]" value="{{$style->Main_bar_code}}" type="hidden" /></td>
            <td><input name="number_size_two[]" value="{{$style->size_number}}" type="hidden" /></td>
            <td class="store_{{$style->stored_id}}"><input name="stored_id_two[]" value="{{$style->stored_id}}" type="hidden" /></td>
        </tr>
    @endforeach  
@endif 
 