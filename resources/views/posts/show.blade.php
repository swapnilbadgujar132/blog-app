<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="mb-4">{{ $post_details->title }}</h2>
                <p><strong>Content:</strong> {{ $post_details->content }}</p>
                <p><strong>Author:</strong> {{ $post_details->author_name }}</p>
                <p><strong>Published at:</strong> {{ $post_details->published_at }}</p>
                <hr>

                <!-- Comments Section -->
                <h3 class="mt-4">Comments</h3>
                @if ($post_comments->isNotEmpty())
                    <ul class="list-group">
                        @foreach($post_comments as $comment)
                            <li class="list-group-item">
                                <strong>{{ $comment->commenter_name }}:</strong> {{ $comment->content }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">No comments yet.</p>
                @endif
                <hr>

                <h4 class="mt-4">Add a Comment</h4>
                <form action="{{ route('comments.store', $post_details->post_id) }}" method="POST" class="mt-3">
                    @csrf
                    <div class="form-group">
                        <label for="commenter_name">Name:</label>
                        <input type="text" name="commenter_name" class="form-control" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="content">Comment:</label>
                        <textarea name="content" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Add Comment</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
