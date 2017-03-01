@extends('admin/layouts/default')

@section('content')
<div class="page-header">
    <h1>
        Setting
    </h1>
</div>

<form class="form form-horizontal" method="POST" enctype="multipart/form-data">

    @if(is_file($_SERVER['DOCUMENT_ROOT'] . '/uploads/'.  array_get($setting, 'logo')))
    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-3">
            <img height="90" src="/uploads/{{ array_get($setting, 'logo') }}">
        </div>
    </div>
    @endif

    <div class="form-group">
        <label class="control-label col-sm-3">Logo</label>
        <div class="col-sm-6">
            <input type="file" name="logo" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Company name</label>
        <div class="col-sm-6">
            <input type="text" name="company_name" value="{{ $setting->company_name }}" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Address</label>
        <div class="col-sm-6">
            <input type="text" name="address" value="{{ $setting->address }}" class="form-control">
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



@stop

