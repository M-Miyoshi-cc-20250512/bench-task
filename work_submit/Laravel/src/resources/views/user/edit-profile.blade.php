<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
</head>
<body>

<h1>Edit your profile</h1>

<!-- 成功メッセージ -->
@if (session('message'))
    <p style="color: green;">{{ session('message') }}</p>
@endif

<!-- バリデーションエラー -->
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('profile.update') }}" method="post">
    @csrf

    <div>
        <label>Name：</label><br>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
    </div>

    <div>
        <label>Email：</label><br>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
    </div>

    <div>
        <label>Address：</label><br>
        <input type="text" name="address" value="{{ old('address', $user->address) }}">
    </div>

    <div>
        <label>Phone：</label><br>
        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">
    </div>

    <div>
        <label>New Password：</label><br>
        <input type="password" name="password">
    </div>

    <button type="submit">Update</button>
</form>

<br>

<form action="{{ route('profile') }}" method="get">
    <button type="submit">Back to profile</button>
</form>

</body>
</html>