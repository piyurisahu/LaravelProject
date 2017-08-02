<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>M DOcument</title>
</head>

<body>


<h1>All Users</h1>
    @foreach($users as $user)
        <li>{{$user->name}}</li>
    @endforeach
<h1>Add A User</h1>
<form method="POST" action="/users">
    {{csrf_field()}}
    <p>

    <input type="text" name="name" placeholder="Name" required>

    </p>
    <p>

    <input type="text" name="email" placeholder="Email Address" required>
    </p>
    <p>

        <input type="password" name="password" placeholder="Password" required>
    </p>
    <p>
        <input type="submit" placeholder="addUser">
    </p>


</form>

</body>