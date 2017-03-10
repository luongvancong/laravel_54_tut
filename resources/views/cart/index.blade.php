@extends('layouts/default')

@section('content')

<div id="cart-listing">
    @if($cartItems->count())
        <table class="table table-hover table-stripped">
            <thead>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <form method="POST" action="{{ route('cart.update') }}">

                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>
                                <input type="text" name="quantity" value="{{ $item->qty }}" class="form-control" style="border: 1px solid #ccc; padding: 7px;">
                            </td>
                            <td>{{ formatCurrency($item->price) }}</td>
                            <td>{{ formatCurrency($item->price * $item->qty) }}</td>
                            <td>
                                <a href="{{ route('cart.remove', $item->rowId) }}" class="btn btn-sm btn-danger">Xóa</a>
                                <input type="hidden" name="return_url" value="{{ $_SERVER['REQUEST_URI'] }}">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                                <input type="hidden" name="product_name" value="{{ $item->name }}">
                                <input type="hidden" name="price" value="{{ $item->price }}">
                                {!! csrf_field() !!}
                                <button class="btn btn-sm btn-info">Cập nhật</button>
                            </td>
                        </tr>
                    </form>
                @endforeach
                <tr>
                    <td colspan="2"></td>
                    <td>Tổng tiền:</td>
                    <td><span style="font-weight: bold; color: red; font-size: 16px;">{{ Cart::subtotal() }}</span></td>
                    <td><a href="{{ route('order') }}" class="btn btn-sm btn-primary">Gửi đơn hàng</a></td>
                </tr>
            </tbody>
        </table>
    @else
        <a href="/" class="pull-left btn btn-sm btn-default" style="margin: 20px; padding: 10px;">Quay lại trang chủ</a>
        <div class="clearfix"></div>
    @endif


</div>

@stop