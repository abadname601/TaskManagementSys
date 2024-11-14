<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>WELCOME</h1>
    <p>Enjoy your visit here.</p>

    @auth
        <p>You are logged in! Go to your <a href="{{ route('dashboard') }}">Dashboard</a>.</p>
    @else
        <p>Please <a href="{{ route('login') }}">log in</a> or <a href="{{ route('register') }}">register</a> to access more features.</p>
    @endauth
</body>
</html>
