<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    @vite('resources/css/app.css')
</head>
<body class="w-5/6 mx-auto text-gray-700">
    <h1 class="text-3xl font-bold mb-4">List of posts</h1>
    <div class="grid grid-cols-3 gap-2">
        @foreach ($posts as $post)
            <a href="{{ route('post.show', ['id' => $post->id]) }}" class="no-underline text-black border-gray-300 border rounded">
                <div class="p-2">
                    <h2 class="font-bold text-center text-xl first-letter:capitalize">{{ $post->title }}</h2>
                    <p class="text-justify text-gray-800 first-letter:capitalize">{{ $post->body }}</p>
                </div>
            </a>
        @endforeach
    </div>
</body>
</html>