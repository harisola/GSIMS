<form action="{{url('/register')}}" method="POST">
{{ csrf_field() }}
<input type="email" name="email" placeholder="example@email.com">

<input type="text" name="first_name" placeholder="First Name">
<input type="text" name="last_name" placeholder="Last Name">

<input type="password" name="password" placeholder="Password">
<input type="password" name="password_confirmation" placeholder="Confirm Password">

<input type="submit" value="Register">
</form>
