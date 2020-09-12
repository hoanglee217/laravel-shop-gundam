@extends('layouts.page')
@section('title', 'Blog ')
@section('nav_Contact','active')
@section('content')
<div class="hero inner-page" style="background-image: url('images/hero_1_a.jpg');">

    <div class="container">
        <div class="row align-items-end ">
            <div class="col-lg-5">

                <div class="intro">
                    <h1><strong>Liên hệ</strong></h1>
                    <div class="custom-breadcrumbs"><a href="{{ url('home') }}">Home</a> <span class="mx-2">/</span>
                        <strong>Contact</strong></div>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="site-section bg-light" id="contact-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-7 text-center mb-5">
                <h2>Liên hệ với chúng tôi hoặc sử dụng form dưới đây để gửi thông tin</h2>
                <p>Bạn cần trợ giúp? Hãy liên hệ với chúng tôi:</p>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-8 mb-5">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::has('message'))
                <div class="panel">
                    <div style="padding-top: 21px;
                    padding-bottom: 0px;" class="panel-body">
                        <div class="alert alert-success alert-dismissible">
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
                @endif
                <form action="contact_form" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <input type="text" name="first_name" class="form-control" placeholder="First name">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="last_name" class="form-control" placeholder="Last name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="email" class="form-control" placeholder="Email address">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea name="message" id="" class="form-control" placeholder="Write your message."
                                cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 mr-auto">
                            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5"
                                value="Send Message">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 ml-auto">
                <div class="bg-white p-3 p-md-5">
                    <h3 class="text-black mb-4">Thông tin liên hệ</h3>
                    <ul class="list-unstyled footer-link">
                        <li class="d-block mb-3">
                            <span class="d-block text-black">Địa chỉ:</span>
                            <span>129/76 Phạm Như Xương, Liên Chiểu, Đà Nẵng</span></li>
                        <li class="d-block mb-3"><span class="d-block text-black">Điện thoại:</span>
                            <span>+84 090 196 8477</span></li>
                        <li class="d-block mb-3"><span
                                class="d-block text-black">Email:</span><span>hoanglpd02647@fpt.edu.vn</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.037865541038!2d108.14824901422386!3d16.063524743859055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142192ecd228feb%3A0x6e12da88736b66d8!2zMTI5IFBo4bqhbSBOaMawIFjGsMahbmcsIEhvw6AgS2jDoW5oIE5hbSwgTGnDqm4gQ2hp4buDdSwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1593479006619!5m2!1svi!2s"
                width="100%" height="650" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </div>
    </div>
</div>
@endsection
