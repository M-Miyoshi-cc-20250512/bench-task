<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <h1>sign in</h1>

    <!-- エラーメッセージ表示 -->
    @if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('login.submit') }}" method="post">
        @csrf

        <div>
            <label>Email：</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label>Password：</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Sign in</button>
    </form>

    <form action="{{ url('/register') }}" method="get">
        <button type="submit">Create my account</button>
    </form>

</body>

</html>