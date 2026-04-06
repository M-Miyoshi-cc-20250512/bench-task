<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>comfirmation</title>
</head>
<body>

<h1>Are your details correct?</h1>

<form action="{{route('register.complete')}}" method="POST">
    @csrf

    <p>Full name：{{ $data['name'] }}</p>
    <input type="hidden" name="name" value="{{ $data['name'] }}">

    <p>Email：{{ $data['email'] }}</p>
    <input type="hidden" name="email" value="{{ $data['email'] }}">

    <p>Password：****</p>
    <input type="hidden" name="password" value="{{ $data['password'] }}">
    <input type="hidden" name="password_confirmation" value="{{ $data['password_confirmation'] }}">

    <button type="complete">Create an account</button>
</form>

<form action="{{ url()->previous() }}" method="get">
    <button type="complete">Back</button>
</form>

</body>
</html>