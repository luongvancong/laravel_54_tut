@extends('admin/layouts/default')

@section('content')
<div>
    <div class="page-header">
        <h1>
            Chi tiết đơn hàng, <small>{{ $order->id }}</small>
        </h1>
    </div>

    <table class="table table-hover table-striped">
        <thead>
            <th>ID</th>
            <th>Sản phẩm</th>
            <th>SL</th>
            <th>Đơn giá</th>
            <th>Tiền</th>
        </thead>
        <tbody>

            @foreach($order->details()->with('products')->get() as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->products->first()->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ formatCurrency($item->money) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop