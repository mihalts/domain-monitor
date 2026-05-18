<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Domain Monitor</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 1100px; margin: 30px auto; padding: 0 16px; }
        nav { display: flex; gap: 12px; margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        input, select { width: 100%; padding: 8px; margin: 6px 0 12px; }
        button, .button { padding: 8px 12px; cursor: pointer; }
        .success { color: green; }
        .error { color: red; }
        .actions { display: flex; gap: 8px; align-items: center; }
    </style>
</head>
<body>
<nav>
    @auth
        <a href="{{ route('domains.index') }}">Domains</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endauth
</nav>

@if(session('success'))
    <p class="success">{{ session('success') }}</p>
@endif

@if($errors->any())
    <div class="error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@yield('content')
</body>
</html>
