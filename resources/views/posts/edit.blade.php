<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center">
        <h1>Update Post</h1>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">List Post</a>
    </div>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', ['post' => $post->post_id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" rows="5">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="author_name">Author Name</label>
            <input type="text" name="author_name" class="form-control" value="{{ old('author_name', $post->author_name) }}">
            @error('author_name')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="published_at">Published At</label>
            <input type="date" name="published_at" class="form-control" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d') : '') }}">
            @error('published_at')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Post</button>
        </div>
    </form>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
