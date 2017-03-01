@extends('admin/layouts/default')

@section('content')
<div>
    <div class="page-header">
        <h1>
            Products
            <a class="btn btn-sm btn-primary pull-right" href="{{ route('admin.product.create') }}">Thêm mới</a>
        </h1>
    </div>

    <table class="table table-stripped table-hover">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Hot</th>
            <th>Active</th>
            <th width="30">Edit</th>
            <th width="30">Del</th>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>
                        <img src="/uploads/{{ $product['image'] }}" height="50" onerror="this.src='/assets/img/grey.gif'">
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="{{ route('admin.product.hot', $product->id) }}" class="btn btn-xs {{ $product['hot'] == 1 ? 'btn-primary' : 'btn-default' }}">{{ $product['hot'] == 1 ? 'Hot' : 'Normal' }}</a>
                    </td>
                    <th>
                        <a href="{{ route('admin.product.active', $product->id) }}" class="btn btn-xs {{ $product['active'] == 1 ? 'btn-primary' : 'btn-default' }}">{{ $product['active'] == 1 ? 'Active' : 'Deactive' }}</a>
                    </th>
                    <td>
                        {!! makeEditButton(route('admin.product.edit', $product->id)) !!}
                    </td>
                    <td>
                        {!! makeDeleteButton(route('admin.product.delete', $product->id)) !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right">
        {!! $products->links() !!}
    </div>
</div>
@stop