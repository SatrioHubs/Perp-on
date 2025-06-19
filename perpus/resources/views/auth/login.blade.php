@if(session('user'))
    <p>Login sebagai: {{ session('user')->name }}</p>
@endif
<form method="POST" action="/login">
    @csrf
    <input name="email" placeholder="Email" type="email" required><br>
    <input name="password" placeholder="Password" type="password" required><br>
    <button type="submit">Login</button>
</form>

@if (session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif
