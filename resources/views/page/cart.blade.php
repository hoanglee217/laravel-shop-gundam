@extends('layouts.page')
@section('title', 'Cart')
@section('content')
<div class="hero inner-page" style="background-image: url('img/18453.jpg');">
    <div class="container">
        <div class="row align-items-end ">
            <div class="col-lg-5">

                <div class="intro">
                    <h1><strong>Giỏ Hàng</strong></h1>
                    <div class="custom-breadcrumbs"><a href="{{ url('/home') }}">Home</a> <span class="mx-2">/</span>
                        <strong>Cart</strong></div>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="site-section bg-light" id="contact-section">
    <div style="padding-left: 50px;padding-right: 50px">
        <div class="row" style="background: white; border-radius: 14px;padding: 20px;">
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
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:45%">Tên sản phẩm</th>
                        <th style="width:10%">Giá</th>
                        <th style="width:8%">Số lượng</th>
                        <th style="width:22%" class="text-center">Thành tiền</th>
                        <th style="width:20%"> </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count =0;
                    @endphp
                    @foreach ($carts as $item)
                    <tr>
                        <form action="update_cart">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img
                                            src="{{ asset('img/thumbnail/'.DB::table('products')->where('id', $item->product_id)->value('thumbnail')) }}"
                                            alt="" class="img-responsive" width="130">
                                    </div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">
                                            {{  DB::table('products')->where('id', $item->product_id)->value('name')  }}
                                        </h4>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">{{ number_format($item->cart_price)}} đ</td>
                            <td data-th="Quantity"><input class="form-control text-center" min="0"
                                    value="{{ $item->cart_qty }}" name="qty" type="number">
                            </td>
                            <td data-th="Subtotal" class="text-center">
                                @php
                                $count = $count + ($item->cart_price*$item->cart_qty)
                                @endphp
                                {{ number_format($item->cart_price*$item->cart_qty)}} đ</td>
                            <td>
                                <input class="btn btn-info btn-sm" type="submit" value="Update">
                                <button class="btn btn-danger btn-sm"><a style="color: white"
                                        href="delete_cart/{{ $item->id }}">Delete</a>
                                </button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td><a href="{{ url('/shop') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp
                                tục mua hàng</a>
                        </td>
                        <td colspan="2" class="hidden-xs"> </td>
                        <td class="hidden-xs text-center"><strong>Tổng tiền
                                {{ number_format($count) }}đ</strong>
                        </td>
                        <td><a href="{{ url('/payment') }}" class="btn btn-success btn-block">Thanh toán
                                <i class="fa fa-angle-right"></i></a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @endsection
