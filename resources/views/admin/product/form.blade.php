<form class="form form-horizontal" method="POST" action="" enctype="multipart/form-data">
    @if($product->exists)
        <div class="form-group">
            <label class="control-label col-sm-3"></label>
            <div class="col-sm-6">
                <img height="90" src="/uploads/{{ $product->image }}" onerror="this.src='/images/grey.gif'">
            </div>
        </div>
    @endif
    <div class="form-group">
        <label class="control-label col-sm-3">Ảnh đại diện</label>
        <div class="col-sm-6">
            <input type="file" name="image">
        </div>
    </div>

    <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
        <label class="control-label col-sm-3">Tên</label>
        <div class="col-sm-6">
            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
            <span class="help-inline text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('quantity') ? 'has-error' : '' }}">
        <label class="control-label col-sm-3">Số lượng</label>
        <div class="col-sm-6">
            <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control">
            <span class="help-inline text-danger">{{ $errors->first('quantity') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('price') ? 'has-error' : '' }}">
        <label class="control-label col-sm-3">Gía</label>
        <div class="col-sm-6">
            <input type="text" name="price" value="{{ $product->price }}" class="form-control">
            <span class="help-inline text-danger">{{ $errors->first('price') }}</span>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3">Giá khuyến mãi</label>
        <div class="col-sm-6">
            <input type="text" name="promotion_price" value="{{ $product->promotion_price }}" class="form-control">

        </div>
    </div>

    <div class="form-group {{ $errors->first('category_id') ? 'has-error' : '' }}">
        <label class="control-label col-sm-3">Danh mục</label>
        <div class="col-sm-6">
            <select class="form-control" name="category_id">
                <option value="">Danh mục</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>@for($i = 0; $i < $category->level; $i ++) -- @endfor{{ $category->name }}</option>
                @endforeach
            </select>
            <span class="help-inline text-danger">{{ $errors->first('category_id') }}</span>
        </div>
    </div>

    <div class="form-group ">
        <label class="control-label col-sm-3">Mô tả ngắn</label>
        <div class="col-sm-6">
            <textarea name="teaser" class="form-control">{{ $product->teaser }}</textarea>
        </div>
    </div>

    <div class="form-group ">
        <label class="control-label col-sm-3">Mô tả</label>
        <div class="col-sm-12">
            <textarea name="content" class="editor">{{ $product->content }}</textarea>

        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-3">
            <input type="hidden" name="action" value="update">
            {!! csrf_field() !!}
            <button style="submit" class="btn btn-sm btn-primary">Cập nhật</button>
        </div>
    </div>
</form>

