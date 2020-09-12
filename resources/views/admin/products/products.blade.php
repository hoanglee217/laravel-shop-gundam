@extends('layouts.admin')
@section('title', 'Products')
@section('action', 'active')
@section('in', 'in')
@section('product', 'active')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Products Manager</h3>
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
                    <div class="panel-body">
                        <button style="border:none; background: white">
                            <a href="new_product">
                                <i style="color: lime;font-size: 24px;" class="fa fa-plus"></i>
                                <span style="position: relative;top: -4px;">Add New</span>
                            </a>
                        </button>
                        <button style="border:none; background: white">
                            <a href="product_Admin">
                                <i style="color: red;font-size: 24px;" class="fa fa-list"></i>
                                <span style="position: relative;top: -4px;">View List</span>
                            </a>
                        </button>
                        <button style="border:none; background: white">
                            <a onclick="return confirm('bạn có muốn xóa hết không?')" href="del_all_product">
                                <i style="color: black;font-size: 24px;" class="fa fa-trash"></i>
                                <span style="position: relative;top: -4px;">Delete All</span>
                            </a>
                        </button>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Products List</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Catalog id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Thumbnail</th>
                                    <th scope="col">Images</th>
                                    <th scope="col">Views</th>
                                    <th scope="col">Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $listDB)
                                <tr>
                                    <th scope="row">{{ $listDB->id }}</th>
                                    <td>{{ $listDB->catalog_id }}</td>
                                    <td>{{ $listDB->name }}</td>
                                    <td>{{ $listDB->qty }}</td>
                                    <td>{{ $listDB->status }}</td>
                                    <td>{{ number_format($listDB->price) }} VND</td>
                                    <td>{{ number_format($listDB->discount) }} VND</td>
                                    <td><img src="{{ asset('img/thumbnail/'.$listDB->thumbnail) }}" height="50px" width="50px"></td>
                                    <td>
                                        @php
                                        $image = json_decode($listDB->images);
                                        @endphp
                                        @foreach ( $image as $key )
                                        <img src="{{ asset('img/products/'.$key) }}" height="50px" width="50px">
                                        @endforeach
                                    </td>
                                    <td>{{ $listDB->views}}</td>
                                    <td>{{ $listDB->created_at}}</td>
                                    <td>
                                        <a href="edit_product/{{ $listDB->id }}">
                                            <i class="fa fa-shopping-cart"
                                                style="font-size: 17px; color:rgb(2, 255, 2)"></i></a>
                                        .<a onclick="return confirm('bạn có muốn xóa không?')"
                                            href="delete_product/{{ $listDB->id }}">
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
