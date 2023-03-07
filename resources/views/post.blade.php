<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post - {{ $post->title }}</title>
    @vite('resources/css/app.css')
</head>
<body class="w-5/6 mx-auto text-gray-700">
    <div class="border-b border-gray-400 pb-4">
        <h1 class="text-4xl font-bold text-center mb-4">{{ $post->title }}</h1>
        <p class="first-letter:capitalize">{{ $post->body }}</p>
    </div>
    <div class="border-b border-gray-400 pb-4">
        <h1 class="text-2xl font-bold">Author:</h1>
        <div class="grid grid-cols-3 gap-2">
            <div>
                <h2 class="text-xl font-bold">Info</h2>
                <p>{{ $user->name }}</p>
                <p>{{ $user->email }}</p>
                <p>{{ $user->phone }}</p>
                <p>{{ $user->website }}</p>
            </div>
            <div>
                <h2 class="text-xl font-bold">Address</h2>
                <p>{{ $user->address->street }}</p>
                <p>{{ $user->address->suite }}</p>
                <p>{{ $user->address->city }}</p>
                <p>{{ $user->address->zipcode }}</p>
            </div>
            <div>
                <h2 class="text-xl font-bold">Company</h2>
                <p>{{ $user->company->name }}</p>
                <p>{{ $user->company->catchPhrase }}</p>
                <p>{{ $user->company->bs }}</p>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <a href="{{ route('post.index') }}" class="no-underline text-white border border-blue-600 bg-blue-500 rounded p-2">Go Back</a>
    </div>
</body>
</html>