@extends('layouts.admin')
@section('title', 'Users')
@section('action', 'active')
@section('in', 'in')
@section('comment', 'active')
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
            <h3 class="page-title">Comments Manager</h3>
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">View Comments Information</h3>
                    </div>
                    <div class="panel-body">
                        @foreach ($data as $comment)
                        <table border="1">
                            <tr style="width: 100%;">
                                <td>User Name: {{ $comment->user_id }}</td>
                                <td>Product Id: {{ $comment->product_id }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">Content:</td>
                            </tr>
                            <tr>
                                <td class="content" colspan="2">{{ $comment->content }}</td>
                            </tr>
                            <tr>
                                <td>
                                    Rating:
                                    <?php
                                    $star = $comment->rating;
                                    for ($i=0; $i < $star; $i++) {
                                        echo ('<i class="fa fa-star" aria-hidden="true"></i>');
                                    }
                                    ?>
                                </td>
                                <td>Date: {{ $comment->created_at }}</td>
                            </tr>
                        </table>
                        @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
