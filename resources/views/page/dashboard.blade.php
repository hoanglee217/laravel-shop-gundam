@extends('layouts.page')
@section('title', 'Shop ')
@section('nav_shop','active')
@section('content')
<div class="hero inner-page"
    style="background-position-y: -52px;background-image: url('img/daily-choice-VvgZ7ZfV-wA-unsplash.jpg');">

    <div class="container">
        <div class="row align-items-end ">
            <div class="col-lg-5">

                <div class="intro">
                    <h1><strong>Đơn Hàng</strong></h1>
                    <div class="custom-breadcrumbs"><a href="home">Home</a> <span class="mx-2">/</span>
                        <strong>oders</strong></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="section-heading"><strong>Danh sách đơn hàng:</strong></h2>
                <p class="mb-5">.</p>
            </div>
        </div>

        <table class="table" style="width: 1098px !important;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">mã đơn hàng</th>
                                <th scope="col">giá tiền</th>
                                <th scope="col">Phương thức thanh toán</th>
                                <th scope="col">cách thức giao</th>
                                <th scope="col">trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($content1 as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->price }}</td>
                                <td>{{ DB::table('transaction')->where('id',$item->transaction_id )->value('payment')}}</td>
                                <td>{{ DB::table('transaction')->where('id',$item->transaction_id )->value('ship')  }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        <!-- <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#content1">Chờ xác nhận</a></li>
                <li><a data-toggle="tab" href="#content2">Chờ lấy hàng</a></li>
                <li><a data-toggle="tab" href="#content3">Đang giao</a></li>
                <li><a data-toggle="tab" href="#content4">Đã giao</a></li>
                <li><a data-toggle="tab" href="#content5">Đã hủy</a></li>
                <li><a data-toggle="tab" href="#content6">Trả Hàng</a></li>
            </ul>
            <div class="tab-content">
                <div id="comment1"  class="tab-pane fade in active show">
                    <table class="table" style="width: 1098px !important;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">mã đơn hàng</th>
                                <th scope="col">giá tiền</th>
                                <th scope="col">Phương thức thanh toán</th>
                                <th scope="col">cách thức giao</th>
                                <th scope="col">trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($content1 as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->price }}</td>
                                <td>{{ DB::table('transaction')->where('id',$item->transaction_id )->value('payment')}}</td>
                                <td>{{ DB::table('transaction')->where('id',$item->transaction_id )->value('ship')  }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="content2" class="tab-pane fade">
                    <table class="table" style="width: 1098px !important;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">mã đơn hàng</th>
                                <th scope="col">giá tiền</th>
                                <th scope="col">Phương thức thanh toán</th>
                                <th scope="col">cách thức giao</th>
                                <th scope="col">trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($content2 as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->price }}</td>
                                <td>{{ DB::table('transaction')->where('id',$item->transaction_id )->value('payment')}}</td>
                                <td>{{ DB::table('transaction')->where('id',$item->transaction_id )->value('ship')  }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="comment3" class="tab-pane fade">
                    <table class="table" style="width: 1098px !important;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">mã đơn hàng</th>
                                <th scope="col">giá tiền</th>
                                <th scope="col">Phương thức thanh toán</th>
                                <th scope="col">cách thức giao</th>
                                <th scope="col">trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($content3 as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->price }}</td>
                                <td>{{ DB::table('transaction')->where('id',$item->transaction_id )->value('payment')}}</td>
                                <td>{{ DB::table('transaction')->where('id',$item->transaction_id )->value('ship')  }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="content4" class="tab-pane fade">
                    <table class="table" style="width: 1098px !important;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">mã đơn hàng</th>
                                <th scope="col">giá tiền</th>
                                <th scope="col">Phương thức thanh toán</th>
                                <th scope="col">cách thức giao</th>
                                <th scope="col">trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($content4 as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->price }}</td>
                                <td>{{ DB::table('transaction')->where('id',$item->transaction_id )->value('payment')}}</td>
                                <td>{{ DB::table('transaction')->where('id',$item->transaction_id )->value('ship')  }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="comment5" class="tab-pane fade">
                    <table class="table" style="width: 1098px !important;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">mã đơn hàng</th>
                                <th scope="col">giá tiền</th>
                                <th scope="col">Phương thức thanh toán</th>
                                <th scope="col">cách thức giao</th>
                                <th scope="col">trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($content5 as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->price }}</td>
                                <td>{{ DB::table('transaction')->where('id',$item->transaction_id )->value('payment')}}</td>
                                <td>{{ DB::table('transaction')->where('id',$item->transaction_id )->value('ship')  }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="content6" class="tab-pane fade">
                    <table class="table" style="width: 1098px !important;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">mã đơn hàng</th>
                                <th scope="col">giá tiền</th>
                                <th scope="col">Phương thức thanh toán</th>
                                <th scope="col">cách thức giao</th>
                                <th scope="col">trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($content6 as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->price }}</td>
                                <td>{{ DB::table('transaction')->where('id',$item->transaction_id )->value('payment')}}</td>
                                <td>{{ DB::table('transaction')->where('id',$item->transaction_id )->value('ship')  }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> -->
    </div>
</div>
</div>
</div>
@endsection
