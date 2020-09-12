@extends('layouts.admin')
@section('title', 'Transaction')
@section('action', 'active')
@section('in', 'in')
@section('transaction', 'active')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Transaction Manager</h3>
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
                        <h3 class="panel-title">Transaction List</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Payment</th>
                                    <th scope="col">Payment info</th>
                                    <th scope="col">Ship</th>
                                    <th scope="col">Message</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $listDB)
                                <tr>
                                    <th scope="row">{{ $listDB->id }}</th>
                                    <td>{{ $listDB->user_id }}</td>
                                    <td>{{ $listDB->user_phone }}</td>
                                    <td>{{ $listDB->user_address }}</td>
                                    <td>{{ $listDB->payment }}</td>
                                    <td>{{ $listDB->payment_info }}</td>
                                    <td>{{ $listDB->ship }}</td>
                                    <td>{{ $listDB->message }}</td>
                                    <td>
                                        <a onclick="return confirm('bạn có muốn xóa không?')" href="/{{ $listDB->id }}">
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
