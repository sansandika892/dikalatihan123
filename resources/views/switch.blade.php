<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @switch($role)
    @case("admin")
    <p>You are an administrator.</p>
    @break

    @case("penulis")
    <p>You are a writer.</p>

    @break
    @default
    <p>You are a regular user.</p>

    @endswitch

    @if($role == "admin")
    <p>You are an administrator.</p>
    @elseif($role == "penulis")
    <p>You are a writer.</p>
    @else
    <p>You are a regular user.</p>
    @endif
</body>
</html>
