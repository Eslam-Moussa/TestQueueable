@extends('frontend.layouts.layout')
@section('title')
تذكرة جديدة
@endsection
@section('content')
<div class="page-title">
        <div class="container">
            <h1><strong>تذكرة جديدة</strong></h1>
        </div>
    </div>
    <section class="clean-block clean-product shopping-pattern">
        <div class="container">
            <div class="block-content mb-5">
                <form>
                    <div class="form-group"><label>عنوان التذكرة</label><input class="form-control" type="text"></div>
                    <div class="form-group"><label>القسم</label><select class="form-control"><optgroup label="This is a group"><option value="12" selected="">This is item 1</option><option value="13">This is item 2</option><option value="14">This is item 3</option></optgroup></select></div>
                    <div
                        class="form-group"><label>نص التذكرة</label><textarea class="form-control" rows="5"></textarea></div><a class="btn btn-dark" role="button" href="my-tickets.html">أضف تذكرة</a></form>
        </div>
        </div>
    </section>
@endsection