<div class="card md-5" >
    <div class="card-body" style="padding-bottom: 1px;">
        <h5 class="card-title"> تفاصيل الحضور</h5>
        <!--<p class="card-text">تجد هنا كل المعلومات المفصلة عن العاملين في شركة الباز للبرمجيات</p>-->
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">الإسم</th>
                    <th scope="col">القسم</th>
                    <th scope="col">أيام الحضور</th>
                    <th scope="col">أيام الغياب</th>
                    <th scope="col">ساعات التأخير</th>
                </tr>
            </thead>
            <tbody>
            @foreach($workers as $worker)
                    <tr>
                        <td>{{ $worker->name}}</td>
                        <td>{{ $worker->department}}</td>
                        <td>{{ $worker->daysAttended}}</td>
                        <td>{{ $worker->daysAbsented}}</td>
                        <td>{{ $worker->hoursLated}}</td>
                        <td>
                            <!-- <a href="{{ url('/addAttend/'.$worker->id) }}" class="btn btn-sm btn-warning p-1">وصول</a>
                            <a href="{{ url('/addLeave/'.$worker->id) }}" class="btn btn-sm btn-warning p-1">مغادرة</a> -->
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


