<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Posts</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

        <!-- Search Form -->
        <form method="GET" class="form-inline mb-4">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search by title" style="width: 300px;">
            </div>
            <button type="submit" class="btn btn-info ml-2">Search</button>
        </form>

        <ul class="list-group">
            @foreach($posts as $post)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('posts.show', $post->post_id) }}" class="h4">{{ $post->title }}</a>
                        <p class="mb-0 text-muted">Title: {{ $post->title }} | Content: {{ $post->content }} | Author: {{ $post->author_name }} | Published: {{ $post->published_at }}</p>
                    </div>

                    <div class="ml-auto">
                        <a href="{{ route('posts.show', $post->post_id) }}" class="btn btn-warning btn-sm">More Details</a>

                        <a href="{{ route('posts.edit', $post->post_id) }}" class="btn btn-warning btn-sm ml-2">Edit</a>

                        <form action="{{ route('posts.destroy', $post->post_id) }}" method="POST" style="display: inline-block;" class="ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>


        <br>
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
