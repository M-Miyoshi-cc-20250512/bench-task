<h1>profile</h1>

@if(session('message'))
    <p style="color:green;">{{ session('message') }}</p>
@endif

<p>Full Name：{{ $user->name }}</p>
<p>Email：{{ $user->email }}</p>
<p>Address：{{ $user->address ?? '' }}</p>
<p>Phone：{{ $user->phone ?? '' }}</p>

<a href="{{ route('profile.edit') }}"><button>Edit Profile</button></a>