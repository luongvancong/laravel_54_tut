@extends('admin/layouts/default')

@section('content')
<div>
    <div class="page-header">
        <h1>
            Categories
            <a class="btn btn-sm btn-primary pull-right" href="{{ route('admin.category.create') }}">Thêm mới</a>
        </h1>
    </div>

    <table class="table table-stripped table-hover">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Active</th>
            <th width="30">Edit</th>
            <th width="30">Del</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category['id'] }}</td>
                    <td><?php for($i = 0; $i < $category->level; $i ++) echo '--'; ?>{{ $category['name'] }}</td>
                    <th>
                        <a href="{{ route('admin.category.active', $category->id) }}" class="btn btn-xs {{ $category['active'] == 1 ? 'btn-primary' : 'btn-default' }}">{{ $category['active'] == 1 ? 'Active' : 'Deactive' }}</a>
                    </th>
                    <td>
                        {!! makeEditButton(route('admin.category.edit', $category->id)) !!}
                    </td>
                    <td>
                        {!! makeDeleteButton(route('admin.category.delete', $category->id)) !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop