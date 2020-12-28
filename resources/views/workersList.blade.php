<div class="card md-3" >
    <div class="card-body" style="padding-bottom: 1px;">
        <h5 class="card-title">قائمة العاملين</h5>
        <p class="card-text">تجد هنا كل المعلومات المفصلة عن العاملين في شركة الباز للبرمجيات</p>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">الإسم</th>
                    <th scope="col">المؤهل</th>
                    <th scope="col">تاريخ بدء العمل</th>
                    <th scope="col">الموبيل</th>
                    <th scope="col">العنوان</th>
                    <th scope="col">الإيميل</th>
                    <th scope="col">أيام العمل</th>

                </tr>
            </thead>
            <tbody>
            @foreach($workers as $worker)
                    <tr>
                        <td>{{ $worker->name}}</td>
                        <td>{{ $worker->education}}</td>
                        <td>{{ $worker->workStartDate }}</td>
                        <td>{{ $worker->mobileNumber }}</td>
                        <td>{{ $worker->address }}</td>
                        <td>{{ $worker->email }}</td>
                        <td>{{ $worker->workDays }}</td>
                        <td>
                            
                                <a href="{{ url('/edit/'.$worker->id) }}" class="btn btn-sm btn-warning p-1">تعديل</a>
                                <a href="{{ url('/delete/'.$worker->id) }}" class="btn btn-sm btn-warning p-1">مسح</a>
                                <a href="{{ url('/show/'.$worker->id) }}" class="btn btn-sm btn-warning p-1">تفاصيل</a>
                            
                            
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div style="margin-right:15px;">
    <a class="btn btn-sm btn-danger px-4 py-2 " href="{{ url('/pdf') }}">PDF</a>
    <a class="btn btn-sm btn-primary px-4 py-2 " href="{{ url('/word') }}">Word</a>
    <a class="btn btn-sm btn-success px-4 py-2 " href="{{ url('/excel') }}">Excel</a>
</div>
<br>

<!-- Search form -->
<form action="{{ url('/search') }}" method="post">
    @csrf
    <input class="form-control" name="workerName" type="text" placeholder="Search Worker" aria-label="Search">
</form>