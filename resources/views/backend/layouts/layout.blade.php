@include('backend.inc.header')
@include('backend.inc.sidbar')
@if(Session::has('success'))
<script>
    swal("تنبية!", "{{Session::get('success')}}!", "success");
</script>
@elseif(Session::has('error'))
<script>
    swal("تنبية!", "{{Session::get('error')}}!", "error");
</script>
@endif
<!--@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif-->

@yield('content')


@include('backend.inc.footer')