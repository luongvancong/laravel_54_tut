@extends('admin/layouts/default')

@section('content')
<div>
    <div class="page-header">
        <h1>
            Orders
        </h1>
    </div>

    <table class="table table-hover table-striped">
        <thead>
            <th>ID</th>
            <th>Customer name</th>
            <th>Customer phone</th>
            <th>Customer email</th>
            <th>Customer address</th>
            <th>Total money</th>
            <th>Status</th>
            <th>Detail</th>
            <th>Delete</th>
        </thead>
        <tbody>

            @foreach($orders as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->customer_name }}</td>
                    <td>{{ $item->customer_phone }}</td>
                    <td>{{ $item->customer_email }}</td>
                    <td>{{ $item->customer_address }}</td>
                    <td>{{ formatCurrency($item->total_money) }}</td>
                    <td>
                        @if($item->deleted_at)
                            <span class="label label-danger">Deleted</span>
                        @else
                            <span class="label label-success">Avaiable</span>
                        @endif
                    </td>
                    <td><a href="{{ route('admin.order.detail', $item->id) }}" class="btn btn-sm btn-default">Detail</a></td>
                    <td>{!! makeDeleteButton(route('admin.order.delete', $item->id)) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-right">{!! $orders->links() !!}</div>
    <div class="clearfix"></div>
</div>

@stop