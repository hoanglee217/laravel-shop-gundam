@extends('layouts.page')
@section('title','Transaction')
@section('content')
<div class="hero inner-page" style="background-image: url('img/18453.jpg');">
    <div class="container">
        <div class="row align-items-end ">
            <div class="col-lg-5">

                <div class="intro">
                    <h2><strong>Thông tin khách hàng</strong></h2>
                    <div class="custom-breadcrumbs"><a href="{{ url('/home') }}">Home</a> <span class="mx-2">/</span>
                        <strong>Transaction</strong></div>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="panel">
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
</div>
<div class="site-section bg-light" style="padding: 20px" id="contact-section">
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Add Transaction</h3>
            </div>
            <div class="panel-body">
                <form action="add_transaction" method="post" enctype="multipart/form-data">
                    @csrf
                    Họ tên:
                    <input type="text" name="name" class="form-control" placeholder="Full Name">
                    <br>
                    Phone number:
                    <input type="text" name="phone" class="form-control" placeholder="Phone number">
                    <br>
                    Địa chỉ:
                    <input type="text" name="address" class="form-control" placeholder="Address">
                    <br>
                    Phương thức thanh toán:
                    <select class="form-control" name="payment">
                        <option value="cod">COD</option>
                        <option value="atm">Thanh toán qua thẻ ngân hàng</option>
                        <option value="momo">Thanh toán qua momo</option>
                    </select>
                    <br>
                    Thông tin thanh toán:
                    <input type="text" class="form-control" value="0" name="payment_info">
                    <br>
                    Cách thức giao hàng:
                    <select class="form-control" name="ship">
                        <option value="GHTK">Giao hàng tiết kiệm</option>
                        <option value="GHN">Giao hàng nhanh</option>
                        <option value="VIETTEL POST">Viettel post</option>
                        <option value="VNPOST">VNpost</option>
                    </select>
                    <br>
                    Ghi chú:
                    <textarea class="form-control" name="message" cols="30" rows="10"></textarea>
                    <input type="submit" class="btn btn-primary" value="Add">
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
