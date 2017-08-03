<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My DOcument</title>
</head>

<body>



<h1>About User</h1>

@foreach($tasks as $task)


    <li>
        <a href="/tasks/{{$task->id}}" />{{$task->body}}</li>
    @endforeach

@foreach($tasks as $task)
    <li>{{$task->body}}</li>
    @endforeach



    </form>

</body>