@extends('admin/layouts/default')

@section('content')
<div class="page-header">
    <h1>
        Products
        <a class="btn btn-sm btn-primary pull-right" href="{{ route('admin.product.create') }}">Thêm mới</a>
    </h1>
</div>

@include('admin/product/form')

@stop

