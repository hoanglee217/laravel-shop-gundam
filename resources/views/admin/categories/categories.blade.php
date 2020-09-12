@extends('layouts.admin')
@section('title', 'Catagories')
@section('action', 'active')
@section('in', 'in')
@section('category', 'active')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Catagories Manager</h3>
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
                            <a href="new_category">
                                <i style="color: lime;font-size: 24px;" class="fa fa-plus"></i>
                                <span style="position: relative;top: -4px;">Add New</span>
                            </a>
                        </button>
                        <button style="border:none; background: white">
                            <a href="catagory_Admin">
                                <i style="color: red;font-size: 24px;" class="fa fa-list"></i>
                                <span style="position: relative;top: -4px;">View List</span>
                            </a>
                        </button>
                        <button style="border:none; background: white">
                            <a onclick="return confirm('bạn có muốn xóa hết không?')" href="">
                                <i style="color: black;font-size: 24px;" class="fa fa-trash"></i>
                                <span style="position: relative;top: -4px;">Delete All</span>
                            </a>
                        </button>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Catagories List</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $listDB)
                                <tr>
                                    <th scope="row">{{ $listDB->id }}</th>
                                    <td>{{ $listDB->name }}</td>
                                    <td>{{ $listDB->created_at }}</td>

                                    <td>
                                        <a href="edit_category/{{ $listDB->id }}">
                                            <i class="fa fa-shopping-cart"
                                                style="font-size: 17px; color:rgb(2, 255, 2)"></i></a>
                                        .<a onclick="return confirm('bạn có muốn xóa không?')"
                                            href="delete_category/{{ $listDB->id }}">
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
