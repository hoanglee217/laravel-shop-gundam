@extends('layouts.admin')
@section('title', 'Users')
@section('action', 'active')
@section('in', 'in')
@section('product', 'active')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Products Manager</h3>
            <div class="row">
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
                        <h3 class="panel-title">Add Products</h3>
                    </div>
                    <div class="panel-body">
                        <form action="add_product" method="post" enctype="multipart/form-data">
                            @csrf
                            Name:
                            <input type="text" name="name" class="form-control" required placeholder="Product Name">
                            <br>
                            Amout:
                            <input type="text" name="amout" class="form-control" required placeholder="Amout">
                            <br>
                            Status:
                            <select class="form-control" name="status">
                                <option value="new">new</option>
                                <option value="sale">sale</option>
                                <option value="sold">sold</option>
                            </select>
                            <br>
                            Price:
                            <input type="text" name="price" class="form-control" required placeholder="Price">
                            <br>
                            Discount:
                            <input type="text" name="discount" class="form-control" placeholder="Discount">
                            <br>
                            Thumbnail:
                            <input type="file" name="thumbnail" class="form-control" required placeholder="Thumbnail">
                            <br>
                            Images:
                            <input type="file" name="images[]" multiple="multiple" class="form-control"
                                placeholder="Images">
                            <br>
                            Catagory:
                            <select class="form-control" name="category">
                                @foreach ($data as $catalog )
                                <option value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                                @endforeach
                            </select>
                            <br>
                            Content:
                            <textarea class="form-control" id="content" name="content"></textarea>
                            <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace( 'content' );
                            </script>
                            <input type="submit" class="form-control btn btn-primary" value="Add">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
