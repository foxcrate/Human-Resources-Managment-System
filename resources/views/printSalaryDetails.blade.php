<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>El-Baz Human Resources</h1>
    <h1><a href="{{ url('/printSalaryDetails/'.$id) }}" class="btn btn-sm btn-warning p-1 m-1">  إطبع معلومات المرتب الخاصة بك</a></h1>
</body>
</html>