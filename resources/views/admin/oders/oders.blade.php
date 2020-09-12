@extends('layouts.admin')
@section('title', 'Oders')
@section('action', 'active')
@section('in', 'in')
@section('oder', 'active')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Oders Manager</h3>
            <div class="row">
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
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Oders List</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $listDB)
                                <tr>
                                    <th scope="row">{{ $listDB->id }}</th>
                                    <td>{{ $listDB->user_id }}</td>
                                    <td>{{ $Users }}</td>
                                    <td>
                                        @php
                                        $product = json_decode($listDB->product_id);
                                        @endphp
                                        @foreach ($product as $item)
                                        {{DB::table('products')->where('id', $item)->value('name')}}
                                        @endforeach
                                    </td>
                                    <td>{{ $listDB->qty }}</td>
                                    <td>{{ number_format($listDB->price) }}</td>
                                    <td>{{ $listDB->transaction_id }}</td>
                                    <td>{{ $listDB->status }}</td>
                                    <td>{{ $listDB->created_at }}</td>
                                    <td>
                                        <a href="view_oder/{{ $listDB->id }}">
                                            <i class="fa fa-eye" style="font-size: 17px; color:gray"></i></a>
                                        .<a href="edit_oder/{{ $listDB->id }}">
                                            <i class="fa fa-shopping-cart"
                                                style="font-size: 17px; color:rgb(2, 255, 2)"></i></a>
                                        .<a onclick="return confirm('bạn có muốn xóa không?')"
                                            href="delete_oder/{{ $listDB->id }}">
                                            <i class="lnr lnr-trash" style="color:red"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
