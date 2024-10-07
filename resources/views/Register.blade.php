<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
</head>
<body>
    {!! session('msg') !!}
    <form action="{{route('register')}}" method="post">
        @csrf
        <!-- (cross-site request forgery; it helps to create authenticated token to keep webpage safe, dont forget it) -->
        <p>
            <label>First Name</label>
            <input type="text" name="first_name">
        </p>
        <p>
            <label>Last Name</label>
            <input type="text" name="last_name">
        </p>
        <p>
            <label>Email</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Phone Number</label>
            <input type="text" name="phone_number">
        </p>
        <p>
            <label>Address</label>
            <input type="text" name="address">
        </p>
        <p>
            <label>Password</label>
            <input type="password" name="password">
        </p>
        <p>
            <label>Confirm Password</label>
            <input type="password" name="confirm_password">
        </p>
        <button type="submit">Register</button>

    </form>








</body>
</html>