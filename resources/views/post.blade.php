<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href='/app.css'>
    {{-- <script src='/app.js'></script> --}}
</head>
<body>
      <h1>{!!$post->title !!}</h1>
    <div>
        {!! $post->body !!}
    </div>
<p ><a class="back" href='/'>Go Back</a></p>
</body>
</html>