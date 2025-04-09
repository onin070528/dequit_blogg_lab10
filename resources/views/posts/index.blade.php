<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .card {
            border-radius: 12px;
            overflow: hidden;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 12px 12px 0 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .list-group-item {
            border-radius: 8px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .list-group-item:hover {
            background-color: #f1f1f1;
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }
        .btn {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .btn-sm {
            padding: 6px 12px;
        }
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
        .pagination .page-link {
            border-radius: 5px;
        }
        .text-muted {
            font-size: 1.1em;
        }
    </style>
</head>
<body class="p-4">

<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 800px;">

        <div class="card-header text-center">
            <h1>All Posts</h1>
        </div>

        <a href="/posts/create" class="btn btn-success mb-3">
            <i class="bi bi-plus-circle"></i> Create New Post
        </a>

        @if ($posts->isEmpty())
            <p class="text-center text-muted">No content available.</p>
        @else
            <div class="list-group">
                @foreach ($posts as $post)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <a href="/posts/{{ $post->id }}" class="text-decoration-none fw-bold text-dark">
                                {{ $post->title }}
                            </a>
                        </div>
                        <div class="d-flex">
                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-sm btn-primary mx-2">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="/posts/{{ $post->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Section -->
            {{ $posts->links() }}
        @endif

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
