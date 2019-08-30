@extends('frontend.layouts.layout')
@section('title')
تسجيل الدخول
@endsection
@section('content')
<div class="page-title">
        <div class="container">
            <h1><strong>تسجيل الدخول</strong></h1>
        </div>
    </div>
    <section class="shopping-pattern">
        <div class="container">
            <div class="row d-xl-flex justify-content-xl-center">
                <div class="col-md-6">
                    <form action="{{url('/Site-login')}}" method="post" enctype="multipart/form-data" class="contact-form">
                    {{ csrf_field() }}
                        <div class="form-group"><label>البريد الإلكتروني</label><input class="form-control" name="email" value="{{ old('email') }}" type="text"></div>
                        <div class="form-group"><label>كلمة المرور</label><input class="form-control" name="password"  type="password"></div>
                        <div class="form-group"><button class="btn btn-outline-secondary btn-block" type="submit">دخول</button></div>
                        <p><a href="forget-password.html"><strong>نسيت كلمة المرور؟</strong></a></p><button class="btn btn-primary btn-block mb-5 btn-facebook" type="submit">
                        <i class="fa fa-facebook-official"></i>الدخول بواسطة فيسبوك</button></form>
                </div>
            </div>
        </div>
    </section>
@endsection 