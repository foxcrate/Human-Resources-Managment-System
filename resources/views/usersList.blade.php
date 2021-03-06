<div class="card md-3" >
    <div class="card-body" style="padding-bottom: 1px;">
        <h5 class="card-title">قائمة الأعضاء</h5>
        <p class="card-text">تجد هنا كل المعلومات المفصلة عن الأعضاء في الإدارة</p>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">الإسم</th>
                    <th scope="col">الرتبة</th>
                    <th scope="col">المهام</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name}}</td>
                    
                    <td>
                        <a href="{{ url('/addRoleToUser/'.$user->id) }}" class="btn btn-sm btn-warning p-1">إضافة رتبة</a>
                        <!--<a href="{{ url('/delete/'.$user->id) }}" class="btn btn-sm btn-warning p-1">مسح</a>
                        <a href="{{ url('/show/'.$user->id) }}" class="btn btn-sm btn-warning p-1">تفاصيل</a> -->
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>