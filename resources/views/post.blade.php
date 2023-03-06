<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post - {{ $post->title }}</title>
</head>
<body>
    <header>
        <a href="{{ route('post.index') }}">Back</a>
    </header>
    <div>
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
    </div>
    <div>
        <h1>{{ $user->name }}</h1>
        <p>{{ $user->email }}</p>
        <p>{{ $user->phone }}</p>
        <p>{{ $user->website }}</p>
        <div>
            <h2>Address</h2>
            <p>{{ $user->address->street }}</p>
            <p>{{ $user->address->suite }}</p>
            <p>{{ $user->address->city }}</p>
            <p>{{ $user->address->zipcode }}</p>
        </div>
        <div>
            <h2>Company</h2>
            <p>{{ $user->company->name }}</p>
            <p>{{ $user->company->catchPhrase }}</p>
            <p>{{ $user->company->bs }}</p>
        </div>
    </div>
</body>
</html>