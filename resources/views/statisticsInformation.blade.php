<div class="card md-3 mt-5" >
    <div class="card-body" style="padding-bottom: 1px;">
        <h5 class="card-title"> الإحصائات من "{{$fromDate}}" إلى "{{$toDate}}"</h5>
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
            @for($i=0; $i < count($information); $i++)
                    <tr>
                        <td>{{ $information[$i]['name'] }}</td>
                        <td>{{ $information[$i]['department'] }}</td>
                        <td>{{ $information[$i]['daysAttended'] }}</td>
                        <td>{{ $information[$i]['daysAbsented'] }}</td>
                        <td>{{ $information[$i]['lateHours'] }}</td>
                    </tr>
                    
            @endfor
            </tbody>
        </table>
    </div>
</div>