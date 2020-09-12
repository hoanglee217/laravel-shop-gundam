@extends('layouts.admin')
@section('title', 'Users')
@section('action', 'active')
@section('in', 'in')
@section('user', 'active')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Users Manager</h3>
            <div class="row">
                <div class="panel">
                    <div class="panel-body">
                        <button style="border:none; background: white">
                            <a href="../new_user">
                                <i style="color: lime;font-size: 24px;" class="fa fa-plus"></i>
                                <span style="position: relative;top: -4px;">Add New</span>
                            </a>
                        </button>
                        <button style="border:none; background: white">
                            <a href="../user_Admin">
                                <i style="color: red;font-size: 24px;" class="fa fa-list"></i>
                                <span style="position: relative;top: -4px;">View List</span>
                            </a>
                        </button>
                        <button style="border:none; background: white">
                            <a href="../del_all_user">
                                <i style="color: black;font-size: 24px;" class="fa fa-trash"></i>
                                <span style="position: relative;top: -4px;">Delete All</span>
                            </a>
                        </button>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Update Users Information</h3>
                    </div>
                    <div class="panel-body">
                        <form action="../update_user" method="post" enctype="multipart/form-data">
                            @csrf
                            @foreach ($data as $listDB)
                            <input type="hidden" name="id" value="{{ $id }}">
                            Name:
                            <input type="text" name="name" class="form-control" placeholder="Full Name"
                                value="{{ $listDB->name }}">
                            <br>
                            Email
                            <input type="text" name="email" class="form-control" placeholder="Email"
                                value="{{ $listDB->email }}">
                            <br>
                            Password
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                value="{{ $listDB->password }}">
                            <br>
                            Image<br>
                            <input type="hidden" name="old_image" value="{{ $listDB->image  }}">
                            <img style="padding: 5px" src="{{asset('img/users/'.$listDB->image) }}" height="150px"
                                width="150px">
                            <input id="image" type="file" class="form-control" name="image">
                            <br>
                            Role
                            <select class="form-control" name="role">
                                <option value="guest">Guest</option>
                                <option value="admin">Admin</option>
                            </select>
                            <br>
                            <input type="submit" class="form-control btn btn-primary" value="update">
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
