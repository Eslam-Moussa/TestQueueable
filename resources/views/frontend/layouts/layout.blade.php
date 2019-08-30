@include('frontend.inc.header')
@section('title')
الرئيسية
@endsection

@if(Session::has('success'))


<script>
    swal("تنبية!", "{{Session::get('success')}}!", "success");
</script>

@elseif(Session::has('error'))


<script>
    swal("تنبية!", "{{Session::get('error')}}!", "error");Attention
</script>


@endif

@yield('content')

@include('frontend.inc.footer')
