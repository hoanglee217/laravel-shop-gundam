@extends('layouts.page')
@section('title', 'Payment')
@section('content')
<div class="hero inner-page" style="background-image: url('img/18453.jpg');">
    <div class="container">
        <div class="row align-items-end ">
            <div class="col-lg-5">

                <div class="intro">
                    <h1><strong>Thanh toán</strong></h1>
                    <div class="custom-breadcrumbs"><a href="{{ url('/home') }}">Home</a> <span class="mx-2">/</span>
                        <strong>Payment</strong></div>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="site-section bg-light" style="padding: 20px" id="contact-section">
    <form action="add_oder" method="POST" style="background: white; border-radius: 14px;padding: 20px;">
        @csrf
        <div class="row">
            @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible" style="text-align: center">
                {{ Session::get('message') }}
            </div>
            @endif
            @if (Session::has('messages'))
            <div class="alert alert-danger alert-dismissible" style="text-align: center">
                {{ Session::get('messages') }}
            </div>
            @endif
            <div class="col-md-8">
                <h2>Danh sách sản phẩm</h2>
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:45%">Tên sản phẩm</th>
                            <th style="width:10%">Giá</th>
                            <th style="width:10%">Số lượng</th>
                            <th style="width:20%" class="text-center">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count =0;
                        @endphp
                        @foreach ($carts as $item)
                        <tr>
                            <input type="hidden" name="cart_id[]" value="{{ $item->product_id }}">
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img
                                            src="{{ asset('img/thumbnail/'.DB::table('products')->where('id', $item->product_id)->value('thumbnail')) }}"
                                            alt="" class="img-responsive" width="100">
                                    </div>
                                    <div class="col-sm-9">
                                        <h5 class="nomargin">
                                            {{  DB::table('products')->where('id', $item->product_id)->value('name')  }}
                                        </h5>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">{{ number_format($item->cart_price)}} đ</td>
                            <td data-th="Quantity">{{ $item->cart_qty }}</td>
                            <input type="hidden" name="cart_qty[]" value="{{ $item->cart_qty }}">
                            <td data-th="Subtotal" class="text-center">
                                @php
                                $count = $count + ($item->cart_price*$item->cart_qty)
                                @endphp
                                {{ number_format($item->cart_price*$item->cart_qty)}} đ
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><a href="{{ url('/cart') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                                    Quay về giỏ hàng</a>
                            </td>
                            <td colspan="2" class="hidden-xs"> </td>
                            <td class="hidden-xs text-center"><strong>Tổng tiền
                                    {{ number_format($count) }}đ</strong>
                            </td>
                            <input type="hidden" name="total_price" value="<?php echo $count ?>">
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-md-4 blog-sidebar">
                <h2>Thông tin khách hàng</h2>
                <table id="slidebar" class="table table-hover table-condensed">
                    @foreach ($transaction as $item)
                    <tr>
                        <td>
                            <input type="radio" name="transaction_id" required value="{{ $item->id }}">
                        </td>
                        <td>
                            <div><b>Tên:</b> {{ DB::table('users')->where('id', $item->user_id)->value('name') }}
                            </div>
                            <div><b>Số điện thoại:</b> {{ $item->user_phone }}</div>
                            <div><b>Địa chỉ:</b> {{ $item->user_address }}</div>
                            <div><b>Phương thức thanh toán:</b> {{ $item->payment }}</div>
                            <div><b>Cách thức Vận chuyển:</b> {{ $item->ship }}</div>
                        </td>
                        <td>
                            <button class="btn btn-success">
                                <a style="color: white" href="edit_transaction/{{ $item->id }}">Sửa</a>
                            </button>
                            <br>
                            <button class="btn btn-danger">
                                <a style="color: white" href="delete_transaction/{{ $item->id }}">xóa</a>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">
                            <a class="btn btn-danger" style="color: white;width:100%" href="new_transaction">Thêm</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <button style="width:100%" type="submit" class="btn btn-primary">
                    Xác nhận thanh toán
                </button>
            </div>
        </div>
    </form>
</div>

<hr>
@endsection
