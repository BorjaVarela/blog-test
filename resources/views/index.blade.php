<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    <h1>List of posts</h1>
    <div>
        @foreach ($posts as $post)
            <a href="{{ route('post.show', ['id' => $post->id]) }}">
                <div>
                    <h2>{{ $post->title }}</h2>
                    <h3>{{ $users->firstWhere('id', $post->userId)->name }}</h3>
                    <p>{{ $post->body }}</p>
                </div>
            </a>
        @endforeach
    </div>
</body>
</html>