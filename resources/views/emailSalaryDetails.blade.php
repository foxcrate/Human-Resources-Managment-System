<div class="card md-3" >
    <div class="card-body" style="padding-bottom: 1px;">
        <h5 class="card-title"> إيميل مفردات المرتب</h5>
        <!--<p class="card-text">تجد هنا كل المعلومات المفصلة عن العاملين في شركة الباز للبرمجيات</p>-->
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">الإسم</th>
                    <th scope="col">القسم</th>
                </tr>
            </thead>
            <tbody>
            @foreach($workers as $worker)
                    <tr>
                        <td>{{ $worker->name}}</td>
                        <td>{{ $worker->department}}</td>
                        <td>
                            <a href="{{ url('/emailSalaryDetails/'.$worker->id) }}" class="btn btn-sm btn-warning p-1">إرسال إيميل بمفردات المرتب</a>
                            <!-- <a href="{{ url('/addLeave/'.$worker->id) }}" class="btn btn-sm btn-warning p-1">مغادرة</a> -->
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>