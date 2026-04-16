<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create an account</title>
</head>
<body>

    <h1>Create an account</h1>

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

    <form action="{{ route('register.confirm') }}" method="post">
        @csrf

        <div>
            <label>Full name：</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label>Email：</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label>Password：</label>
            <input type="password" name="password">
        </div>

        <div>
            <label>Confirm Password：</label>
            <input type="password" name="password_confirmation">
        </div>

        <button type="submit">Create an account</button>
    </form>

</body>
</html>