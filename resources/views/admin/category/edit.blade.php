@extends('admin/layouts/default')

@section("content")
<div>
    <div class="page-header">
        <h1>Edit category {{ $category->name }}</h1>
    </div>
    @include('admin/category/form')
</div>
@stop

