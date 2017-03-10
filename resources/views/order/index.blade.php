@extends('layouts/default')

@section('content')
<div class="order container">
    <div class="row">
        <div class="col-sm-3">
            <h3>Thông tin khách hàng</h3>
            <form method="POST" action="" class="form">
                <div class="form-group">
                    <label class="control-label"><b class="text-danger">*</b> Họ và tên</label>
                    <input type="text" name="customer_name" value="{{ old('customer_name') }}" required class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label"><b class="text-danger">*</b> Số điện thoại</label>
                    <input type="text" name="customer_phone" value="{{ old('customer_phone') }}" required class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="text" name="customer_email" required class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label"><b class="text-danger">*</b> Địa chỉ</label>
                    <input type="text" name="customer_address" value="{{ old('customer_address') }}" required class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Ghi chú</label>
                    <textarea class="form-control" name="customer_note"></textarea>
                </div>
                <div class="form-group">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-sm btn-primary">Gửi đơn hàng</button>
                </div>
            </form>
        </div>
        <div class="col-sm-9">
            <h3>Thông tin giỏ hàng</h3>
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
                                    <input type="hidden" name="return_url" value="{{ Request::fullUrl() }}">
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
        </div>
    </div>
</div>
@stop