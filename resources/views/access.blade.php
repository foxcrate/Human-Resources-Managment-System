<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
   
    <div class="table-responsive">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-info"><i class="fa fa-key"></i>الصلاحيات المتوفرة </h1>
                    <section class="float-right">
                        <a href="{{ url('/access/toAddPermission') }}" class="btn btn-outline-primary">إضافة صلاحية</a>
                    </section>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>الصلاحية</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td class="table-form">
                                        <a href="{{ url('/access/Details',$permission->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">تفاصيل</a>
                                        <a href="{{ url('/access/Remove',$permission->name) }}" class="btn btn-sm btn-danger" style="margin-right: 3px;">مسح</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>