@extends('layouts.page')
@section('title', 'Shop ')
@section('nav_shop','active')
@section('content')
<div class="hero inner-page" style="background-position-y: -52px;background-image: url('img/daily-choice-VvgZ7ZfV-wA-unsplash.jpg');">

    <div class="container">
        <div class="row align-items-end ">
            <div class="col-lg-5">

                <div class="intro">
                    <h1><strong>Sản Phẩm</strong></h1>
                    <div class="custom-breadcrumbs"><a href="home">Home</a> <span class="mx-2">/</span>
                        <strong>shop</strong></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="section-heading"><strong>Danh sách sản phẩm:</strong></h2>
                <p class="mb-5">Tất cả sản phẩm.</p>
            </div>
        </div>


        <div class="row">
            @foreach ( $data as $view)
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
                            <p>
                                @if ($view->qty == 0)
                                <button class="btn btn-primary btn-sm" disabled="disabled">Buy Now</button>
                                <a href="view_product/{{ $view->id }}" class="btn btn-primary btn-sm">View Product</a>
                                @else
                                <a href="quick_purchase/{{ $view->id }}" class="btn btn-primary btn-sm">Buy Now</a>
                                <a href="view_product/{{ $view->id }}" class="btn btn-primary btn-sm">View Product</a>
                                @endif

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
