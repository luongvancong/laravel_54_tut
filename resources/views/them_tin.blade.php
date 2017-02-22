<!DOCTYPE html>
<html>
<head>
    <title>Them tin</title>
</head>
<body>

    <form method="POST" action="">
        <p>
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}">
            {{ $errors->first('title') }}
        </p>
        <p>
            <label>Content</label>
            <textarea name="content">{{ old('content') }}</textarea>
            {{ $errors->first('content') }}
        </p>
        {!! csrf_field() !!}
        <button type="submit">Submit</button>
    </form>

</body>
</html>