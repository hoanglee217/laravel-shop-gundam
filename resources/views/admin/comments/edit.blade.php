{{-- @extends('layouts.admin')
@section('title', 'Users')
@section('action', 'active')
@section('in', 'in')
@section('user', 'active')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Comments Manager</h3>
            <div class="row">
                <div class="panel">
                    <div class="panel-body">
                        <button style="border:none; background: white">
                            <a href="../new_comment">
                                <i style="color: lime;font-size: 24px;" class="fa fa-plus"></i>
                                <span style="position: relative;top: -4px;">Add New</span>
                            </a>
                        </button>
                        <button style="border:none; background: white">
                            <a href="../comment_Admin">
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
                        <h3 class="panel-title">Update Comments Information</h3>
                    </div>
                    <div class="panel-body">
                        <form action="../update_oder" method="post">
                            @csrf
                            @foreach ($data as $comment)
                            <input type="hidden" name="id" value="{{ $id }}">
                            Name:
                            <input type="text" name="name" class="form-control" value="" placeholder="Full Name">
                            <br>
                            Email
                            <input type="text" name="email" class="form-control" placeholder="Email">
                            <br>
                            Name:
                            <input type="text" name="name" class="form-control" value="" placeholder="Full Name">
                            <br>
                            Email
                            <input type="text" name="email" class="form-control" placeholder="Email">
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
@endsection --}}
