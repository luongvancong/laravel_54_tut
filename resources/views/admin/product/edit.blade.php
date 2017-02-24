@extends('admin/layouts/default')

@section('content')
<div class="page-header">
    <h1>
        {{ $product->name }}
        <a class="btn btn-sm btn-primary pull-right" href="{{ route('admin.product.index') }}">Back</a>
    </h1>
</div>

@include('admin/product/form')

@stop

