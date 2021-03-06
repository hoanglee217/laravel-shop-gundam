@extends('layouts.admin')
@section('title', 'Users')
@section('action', 'active')
@section('in', 'in')
@section('category', 'active')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Categories Manager</h3>
            <div class="row">
                <div class="panel">
                    <div class="panel-body">
                        <button style="border:none; background: white">
                            <a href="../new_category">
                                <i style="color: lime;font-size: 24px;" class="fa fa-plus"></i>
                                <span style="position: relative;top: -4px;">Add New</span>
                            </a>
                        </button>
                        <button style="border:none; background: white">
                            <a href="../catagory_Admin">
                                <i style="color: red;font-size: 24px;" class="fa fa-list"></i>
                                <span style="position: relative;top: -4px;">View List</span>
                            </a>
                        </button>
                        <button style="border:none; background: white">
                            <a href="../del_all_category">
                                <i style="color: black;font-size: 24px;" class="fa fa-trash"></i>
                                <span style="position: relative;top: -4px;">Delete All</span>
                            </a>
                        </button>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Update Categories Information</h3>
                    </div>
                    <div class="panel-body">
                        <form action="../update_category" method="post">
                            @csrf
                            @foreach ( $data as $catalog)
                            <input type="hidden" name="id" value="{{ $id }}">
                            Name:
                            <input type="text" name="name" class="form-control" value="{{ $catalog->name }}"
                                placeholder="Full Name">
                            <br>
                            @endforeach
                            <input type="submit" class="form-control btn btn-primary" value="update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
