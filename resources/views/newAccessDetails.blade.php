<div class="card mb-3">
    <h5 class="card-title">مهام الصلاحية</h5>
    <h5 class="card-title">{{$permissionName}}</h5>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>المهام</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($functions as $function)
                <tr>
                    <td>{{ $function }}</td>
                    <td class="table-form">
                        
                        <a href="{{ route('deletef',[$permissionName,$function]) }}" class="btn btn-sm btn-danger p-1">إزالة</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <section class="float-right">
            <a href="{{ url('/access/toAddFunction',$permissionName) }}" class="btn btn-outline-primary">إضافة مهمة</a>
        </section>
    </div>
</div>