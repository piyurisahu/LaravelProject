<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My DOcument</title>
</head>

<body>


<h1></h1>
{{--@foreach($users as $user)--}}
{{--    <li>{{$user->name}}</li>--}}
{{--@endforeach--}}
<h1>About User</h1>

@foreach($tasks as $task)
    <li><a href="tasks/{$task->user_id}" name="{{$task->body}}"/> </li>
    @endforeach




</form>

</body>