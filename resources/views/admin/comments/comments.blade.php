@extends('layouts.admin')
@section('title', 'Comments')
@section('action', 'active')
@section('in', 'in')
@section('comment', 'active')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Comments Manager</h3>
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
                        <h3 class="panel-title">Comments List</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col">Created</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $listDB)
                                <tr>
                                    <th scope="row">{{ $listDB->id }}</th>
                                    <td>{{ $listDB->user_id}}</td>
                                    <td>{{ $listDB->product_id }}</td>
                                    <td>
                                        <div style="width: 200px;
                                        overflow: hidden;
                                        text-overflow: ellipsis;">{{ $listDB->content }}
                                        </div>
                                    </td>
                                    <td>{{ $listDB->rating }}</td>
                                    <td>{{ $listDB->created_at }}</td>
                                    <td>
                                        <a href="view_comment/{{ $listDB->id }}">
                                            <i class="fa fa-eye" style="font-size: 17px; color:rgb(2, 255, 2)"></i></a>.
                                        <a onclick="return confirm('bạn có muốn xóa không?')"
                                            href="delete_comment/{{ $listDB->id }}">
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
