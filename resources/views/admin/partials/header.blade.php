<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>Dashboard Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" type="text/css" href="/assets/css/bs3/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome/css/font-awesome.min.css">
        <style type="text/css">
            .sidebar {
                background: #fff;
                border-right: 1px solid #ccc;
                height: 100vh;
            }
        </style>
    </head>
    <body>

        <div class="container-fluid">
            <div class="pull-right">
                <div>Hi {{ Auth::user()->name }}</div>
                <a href="{{ route('logout') }}" class="text-right">Logout</a>
            </div>
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="/admin"><i class="fa fa-cogs"></i> Dashboard</a></li>
                        <li><a href="{{ route('admin.setting.index') }}">Setting</a></li>
                        <li><a href="{{ route('admin.category.index') }}">Category</a></li>
                        <li><a href="{{ route('admin.product.index') }}"><i class="fa fa-cubes"></i> Products</a></li>
                        <li><a href="{{ route('admin.order.index') }}"><i class="fa fa-database"></i> Orders</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-md-10">
                    {{-- Notification --}}
                    @include('admin/partials/notification')
