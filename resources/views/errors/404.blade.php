<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error 404</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-5/6 mx-auto text-gray-700 text-center leading-8">
        <h1 class="text-4xl font-bold mb-4">Error 404: Page not found</h1>
        <a href="{{ route('post.index') }}" class="no-underline text-white border border-blue-600 bg-blue-500 rounded p-2">Go home</a>
    </div>
</body>
</html>