@extends('layouts.page')
@section('title', 'Home ')
@section('nav_home','active')
@section('content')
<div class="hero" style="background-image: url('img/18453.jpg');">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-10">
                <div class="row mb-5">
                    <div class="col-lg-7 intro">
                        <h1><strong>Bandai Namco</strong> <br> người tạo ra những giấc mơ.</h1>
                    </div>
                </div>

                <form action="getSearch" method="POST">
                    @csrf
                    <div class="trip-form">
                        <div class="row align-items-center">
                            <div class="mb-3 mb-md-0 col-md-3">
                                <select name="catalog" id="" class="custom-select form-control">
                                    @foreach ($catrgory as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-6 mb-md-0 col-md-6">
                                <div class="form-control-wrap">
                                    <input type="text" id="search" name="search" placeholder="Searching"
                                        class="form-control">
                                    <span class="icon icon-search"></span>

                                </div>
                            </div>
                            <div class="mb-3 mb-md-0 col-md-3">
                                <input type="submit" value="Tìm Kiếm" class="btn btn-primary btn-block py-3">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <h2 class="section-heading"><strong>Mua Như Thế Nào?</strong></h2>
        <p class="mb-5">Các bước dễ dàng để bạn bắt đầu</p>

        <div class="row mb-5">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="step">
                    <span>1</span>
                    <div class="step-inner">
                        <span class="number text-primary">01.</span>
                        <h3>Chọn Sản Phẩm</h3>
                        <p>Shop cung cấp rất nhiều mặt hàng để bạn lựa chọn!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="step">
                    <span>2</span>
                    <div class="step-inner">
                        <span class="number text-primary">02.</span>
                        <h3>Điền Thông Tin</h3>
                        <p>Điền đầy đủ tất cả các thông tin mà shop yêu cầu để thực hiện thanh toán!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="step">
                    <span>3</span>
                    <div class="step-inner">
                        <span class="number text-primary">03.</span>
                        <h3>Thanh Toán</h3>
                        <p>Ở đây bạn có thể lựa chọn được các phương thức thanh toán phù hợp với bạn!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 text-center order-lg-2">
                <div class="img-wrap-1 mb-5">
                    <img src="img/mkf5n5t4w1651.png" alt="Image" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-4 ml-auto order-lg-1">
                <h3 class="mb-4 section-heading"><strong>"Gandamu no Puramoderu"</strong>
                </h3>
                <p class="mb-5">Đây là đồ chơi mô hình lập thể bằng nhựa có đề tài là các loại Robot được gọi là Mobile
                    Suit và
                    Mobile Armour và các loại chiến hạm xuất hiện trong series Anime Gundam mà đại biểu là tác phẩm
                    "Kidō Senshi Gandamu" (chiến sĩ cơ động Gundam). </p>

                <p><a href="https://vi.wikipedia.org/wiki/Gunpla" class="btn btn-primary">Tìm Hiểu Thêm</a></p>
            </div>
        </div>
    </div>
</div>



<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="section-heading"><strong>Danh sách sản phẩm:</strong></h2>
                <p class="mb-5">Những sản phẩm tiêu biểu của shop.</p>
            </div>
        </div>


        <div class="row">
            @foreach ( $products as $view)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="listing d-block  align-items-stretch">
                    <div class="listing-img h-100 mr-4">
                        <img src="img/thumbnail/{{ $view->thumbnail }}" alt="Image" width="100%" height="300px">
                    </div>
                    <div class="listing-contents h-100">
                        <h3>{{ $view->name }}</h3>
                        @if ( $view->discount == 0 )
                        <div class="rent-price">
                            <strong>{{ number_format($view->price) }}VNĐ</strong>
                        </div>
                        @else
                        <div class="rent-price">
                            <strong>{{ number_format($view->discount) }}VNĐ</strong><span class="mx-1">/
                                <del>{{ number_format($view->price) }}VNĐ</del></span>
                        </div>
                        @endif

                        <div class="d-block d-md-flex">
                            <div class="listing-feature pr-4">
                                <span class="caption">Loại hàng:</span>
                                <span class="number">
                                    {{ DB::table('categories')->where('id',$view->catalog_id)->value('name') }}
                                </span>
                            </div>
                        </div>
                        <div class="d-block d-md-flex border-bottom pb-3">
                            <div class="listing-feature pr-4">
                                <span class="caption">Trạng thái:</span>
                                <span class="number">{{ $view->status }}</span>
                            </div>
                            <div class="listing-feature pr-4">
                                <span class="caption">Còn lại:</span>
                                <span class="number">{{ number_format($view->qty) }}</span>
                            </div>
                        </div>
                        <div>
                            <p></p>
                            <p><a href="quick_purchase/{{ $view->id }}" class="btn btn-primary btn-sm">Buy Now</a> <a
                                    href="view_product/{{ $view->id }}" class="btn btn-primary btn-sm">View Product</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <h5><a href="{{ url('shop') }}">Xem thêm >> </a></h5>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="section-heading"><strong>Phản Hồi</strong></h2>
                    <p class="mb-5">Phản hồi của khách hàng.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($comments as $item)
                <div class="col-lg-4 mb-4 mb-lg-0 py-5">
                    <a href="{{ url('view_product/'.$item->product_id) }}">
                        <div class="testimonial-2">
                            <blockquote class="mb-4">
                                <p>"{{ $item->content }}"</p>
                            </blockquote>
                            <div class="d-flex v-card align-items-center">
                                <img src="img/users/{{ DB::table('users')->where('id',$item->user_id)->value('image') }}"
                                    alt="Image" height="50px" class="img-fluid mr-3">
                                <div class="author-name">
                                    <span
                                        class="d-block">{{ DB::table('users')->where('id',$item->user_id)->value('name') }}
                                    </span>
                                    <span>
                                        Mã SP: {{ $item->product_id }} -
                                        @for ($i = 0; $i <= $item->rating; $i++)
                                            <i class="fa fa-star"></i>
                                            @endfor
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <style>
                    .page-link {
                        width: 90px !important;
                        border-radius: 0% !important;
                    }
                </style>
                <div class="col-12 d-flex justify-content-end">
                    {{ $comments->links()}}
                </div>

            </div>
        </div>
    </div>

    <div class="site-section bg-primary py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-md-0">
                    <h2 class="mb-0 text-white">Bạn đang chờ đợi điều gì vậy?</h2>
                    <p class="mb-0 opa-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati,
                        laboriosam.</p>
                </div>
                <div class="col-lg-5 text-md-right">
                    <a href="shop" class="btn btn-primary btn-white">Xem Shop</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
