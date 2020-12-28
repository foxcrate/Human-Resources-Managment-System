<div class="card mb-3">
    <h5 class="card-title">إسم الرتبة</h5>
    <h5 class="card-title">{{$role->name}}</h5>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>الصلاحيات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($role->permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td class="table-form">
                        <!--<a href="{{ url('/roles/deletePermission',[$permission->name,$role->id]) }}" class="btn btn-outline-primary">إزالة 2 </a>-->
                        <a href="{{ route('deleteP',[$permission->name,$role->id]) }}" class="btn btn-sm btn-danger p-1">إزالة</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <section class="float-right">
            <a href="{{ url('/roles/addPermission',$role->id) }}" class="btn btn-outline-primary">إضافة صلاحية</a>
        </section>
    </div>
</div>