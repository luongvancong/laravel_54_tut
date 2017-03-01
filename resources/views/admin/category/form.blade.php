<form class="form form-horizontal" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label class="control-label col-sm-3">Parent</label>
        <div class="col-sm-6">
            <select class="form-control" name="parent_id">
                <option value="">Parent</option>
                @foreach($categories as $item)
                <option value="{{ $item->id }}" {{ $category->parent_id == $item->id ? 'selected' : '' }}><?php for($i = 0; $i < $item['level']; $i ++) echo '--'; ?>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <label class="control-label col-sm-3">Name <b class="text-danger">*</b></label>
        <div class="col-sm-6">
            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
            @if($errors->first('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-3">
            <input type="hidden" name="action" value="update">
            {!! csrf_field() !!}
            <button type="submit" class="btn btn-sm btn-primary">Update</button>
            <a href="/admin">Back</a>
        </div>
    </div>
</form>