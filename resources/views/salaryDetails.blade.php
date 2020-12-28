<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{ Form::open(['action'=> ['workerController@delete', $student->id], 'method'=>'POST']) }}
            {{ method_field('DELETE') }}
            {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
    {{ Form::close() }}
</body>
</html>