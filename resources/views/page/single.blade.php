@extends('layouts.page')
@section('title', 'Shop')
@section('nav_shop','active')
@section('content')
@foreach ($products as $item)
<style>
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

    /*reset css*/
    div,
    label {
        margin: 0;
        padding: 0;
    }


    h1 {
        font-size: 1.5em;
        margin: 10px;
    }

    /****** Style Star Rating Widget *****/
    #rating {
        border: none;
        position: relative;
    }

    #rating>input {
        display: none;
    }

    /*ẩn input radio - vì chúng ta đã có label là GUI*/
    #rating>label:before {
        margin: 5px;
        font-size: 20px;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    /*1 ngôi sao*/
    #rating>.half:before {
        content: "\f089";
        /* position: absolute; */
    }

    /*0.5 ngôi sao*/
    #rating>label {
        color: #ddd;
        float: right;
    }

    /*float:right để lật ngược các ngôi sao lại đúng theo thứ tự trong thực tế*/
    /*thêm màu cho sao đã chọn và các ngôi sao phía trước*/
    #rating>input:checked~label,
    #rating:not(:checked)>label:hover,
    #rating:not(:checked)>label:hover~label {
        color: #FFD700;
    }

    /* Hover vào các sao phía trước ngôi sao đã chọn*/
    #rating>input:checked+label:hover,
    #rating>input:checked~label:hover,
    #rating>label:hover~input:checked~label,
    #rating>input:checked~label:hover~label {
        color: #FFED85;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<div class="hero" style="background-image: url('{{asset(img/bruce-tang-nKO_1QyFh9o-unsplash.jpg)  }}');">
    <div class="container">
        <div class="row align-items-end ">
            <div class="col-lg-12">
                <div class="intro">
                    <h1><strong>{{ $item->name }}</strong></h1>
                    <div class="pb-4"><strong class="text-black">Posted on {{ $item->created_at }} &bullet; By
                            Admin</strong></div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-9 blog-content">
                <section class="product-page">
                    <form action="../add_to_cart" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                        {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id}}"> --}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-img">
                                    <figure>
                                        <div id="myCarousel" class="carousel" data-ride="carousel" data-interval="5000">
                                            <div class=" row w-100 " role="listbox">
                                                <div class="carousel-item active ">
                                                    <div class="panel panel-default">
                                                        <div class="panel-thumbnail">
                                                            <img class="img-fluid d-block"
                                                                src="{{asset('img/thumbnail/'.$item->thumbnail)  }}"
                                                                width="400px" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                $image = json_decode($item->images)
                                                @endphp
                                                @foreach ($image as $img)
                                                <div class="carousel-item">
                                                    <div class="panel panel-default">
                                                        <div class="panel-thumbnail">
                                                            <img class="img-fluid d-block"
                                                                src="{{asset('img/products/'.$img)  }}" width="400px"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#myCarousel" role="button"
                                                data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next text-faded" href="#myCarousel" role="button"
                                                data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-content">
                                    <div class="pc-meta">
                                        @if ( $item->discount == 0 )
                                        <div class="rent-price">
                                            <h2><strong>{{ number_format($item->price) }}VNĐ</strong></h2>
                                        </div>
                                        @else
                                        <div class="rent-price">
                                            <h3><strong>{{ number_format($item->discount) }}VNĐ</strong><span
                                                    class="mx-1">/
                                                    <del>{{ number_format($item->price) }}VNĐ</del></span></h3>
                                        </div>
                                        @endif
                                        {{-- <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div> --}}
                                    </div>
                                    <section id="demo">
                                        <article> Nội dung cần xem đặt tại đây</article>
                                    </section>
                                    <p></p>
                                    <ul class="tags">
                                        <li>Danh mục:
                                            {{ DB::table('categories')->where('id',$item->catalog_id)->value('name') }}
                                        </li>
                                        {{-- <li><span>Tags :</span> man, shirt, dotted, elegant, cool</li> --}}
                                        <li>Trạng thái: {{ $item->status }}</li>
                                        <li>số lượng:
                                            @if ($item->qty == 0)
                                            <span style="color: red">Hết hàng</span>
                                            @else
                                            <span style="color: rgb(16, 155, 4)">còn hàng</span>
                                            @endif
                                        </li>
                                    </ul>
                                    <div class="product-quantity">

                                        <div class="pro-qty">
                                            <input type="number" style="width: 200px;" class="form-control"
                                                min="0" max="{{ $item->qty }}" name="qty" value="1">
                                        </div>
                                    </div>
                                    <br>
                                    @if ($item->qty == 0)
                                    <button class="btn btn-primary" disabled="disabled">Add to cart</button>
                                    <button disabled class="btn btn-primary">Buy Now</a>
                                    </button>
                                    @else
                                    <input class="btn btn-primary" type="submit" value="Add to cart">
                                    <button class="btn btn-primary">
                                        <a style="color: white" href="quick_purchase/{{ $item->id }}">Buy Now</a>
                                    </button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </section>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#comment">Bình luận</a></li>
                    <li><a data-toggle="tab" href="#content">Mô tả</a></li>
                </ul>
                <div class="tab-content">
                    <div id="comment" class="tab-pane fade in active show">
                        <div class="comment-list">
                            @php
                            $comment = DB::table('comments')->where('product_id',$item->id)->get();
                            @endphp
                            @foreach ($comment as $cmt)
                            <div class="mb-4 py-1">
                                <div class="testimonial-2 ">
                                    <div class="d-flex v-card align-items-center mb-2">
                                        <img src="{{ asset('img/users/'. DB::table('users')->where('id',$cmt->user_id)->value('image').'') }}"
                                            alt="Image" height="50px" class="img-fluid mr-3">
                                        <div class="author-name">
                                            <span
                                                class="d-block">{{ DB::table('users')->where('id',$cmt->user_id)->value('name') }}
                                            </span>
                                            <span>
                                                Mã SP: {{ $cmt->product_id }} -
                                                @for ($i = 0; $i <= $cmt->rating; $i++)
                                                    <i class="fa fa-star"></i>
                                                    @endfor
                                            </span>
                                        </div>
                                    </div>
                                    <blockquote class="mb-2 ">
                                        <p>"{{ $cmt->content }}"</p>
                                    </blockquote>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">

                            <h1 id='comment' class="mb-5">Nhấn vào đây để lại bình luận của bạn: </h1>
                            <form style="display: none" action="../add_comment" method="POST" class="form-comment">
                                @csrf
                                <div id="rating" class="form-group">
                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    <input type="radio" id="star5" name="rating" value="5" />
                                    <label class="full" for="star5" title="Awesome - 5 stars"></label>

                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label class="full" for="star4" title="Pretty good - 4 stars"></label>

                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label class="full" for="star3" title="Meh - 3 stars"></label>

                                    <input type="radio" id="star2" name="rating" value="2" />
                                    <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                    <script>
                                        function calcRate(r) {
                                            const f = ~~r,//Tương tự Math.floor(r)
                                            id = 'star' + f + (r % f ? 'half' : '')
                                            id && (document.getElementById(id).checked = !0)
                                           }
                                    </script>
                                </div>
                                <div class="form-group">
                                    <h3>Message</h3>
                                    <textarea name="content" id="message" cols="30" rows="10"
                                        class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary btn-md text-white">
                                </div>
                            </form>
                            <script>
                                $('#comment').click(function(){
                                    $('.form-comment').show("slow");
                                });
                            </script>
                        </div>
                    </div>
                    <div id="content" class="tab-pane fade">

                        <div class="product_content">
                            @php
                            $content = $item->content;
                            echo $content;
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 sidebar">
                <form action="#" class="search-form">
                    <div class="form-group">
                        <span class="icon fa fa-search"></span>
                        <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                    </div>
                </form>
                <div class="sidebar-box">
                    <div class="categories">
                        <h3>Categories</h3>
                        @foreach ($catrgory as $item)
                        <li><a href="">{{ $item->name }}<span></span></a></li>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h1>Sản phẩm liên quan:</h1>
            </div>
        </div>

    </div>
</div>
@endsection
