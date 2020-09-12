@extends('layouts.admin')
@section('title', 'Users')
@section('action', 'active')
@section('in', 'in')
@section('oder', 'active')
@section('content')
<style>
    td {
        padding: 10px;
    }

    table {
        width: 100%;
    }

    .content {
        height: 200px;
    }
</style>
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Oders Manager</h3>
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">View Oders Information</h3>
                    </div>
                    <div class="panel-body">
                        @foreach ($data as $oder)
                        <table border="1">
                            <tr style="width: 50%;">
                                <td>{{ $Users }}</td>
                                <td>{{ $oder->transaction_id }}</td>
                            </tr>
                            <tr>
                                <td>{{ $oder->product_id }}</td>
                                <td>{{ $oder->qty }}</td>
                            </tr>
                            <tr>
                                {{-- <td>{{  number_format($price*$oder->qty) }} VNĐ</td> --}}
                                <td>{{ $oder->status }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">{{ $oder->created_at }}</td>
                            </tr>
                        </table>
                        @endforeach
                        </form>
                        <a href="../oder_Admin">back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
