<div class="card md-3" >
    <div class="card-body" style="padding-bottom: 1px;">
        <h5 class="card-title"> تغيير كلمة السر </h5>
        <!--<p class="card-text">تجد هنا كل المعلومات المفصلة عن العاملين في شركة الباز للبرمجيات</p>-->
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">الإسم</th>

                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name}}</td>
                        <td>
                            <a href="{{ url('/changePasswordForUser/'.$user->id) }}" class="btn btn-sm btn-warning p-1">نغيير كلمة السر</a>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>