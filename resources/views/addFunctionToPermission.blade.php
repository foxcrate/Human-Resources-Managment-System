<!--<div class="card mb-3">
    <h5 class="card-title">إضافة مهمة جديدة</h5>
    <h5 class="card-title">لتصريح: {{$permission->name}}</h5>

    <form action="{{ url('/access/addFunction',$permission->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label>أدخل إسم المهمة الجديدة</label>
            <input name="functionName" type="text" class="form-control"  placeholder="المهمة الجديدة" >
        </div>
        <br>
        <input type="submit" class="btn btn-info" value="إضافة">
    </form>

</div>-->




<div class="card mb-3">
    <h5 class="card-title">إضافة مهمة جديدة</h5>
    <h5 class="card-title">لتصريح: {{$permission->name}}</h5>
    <form action="{{ url('/access/addFunction',$permission->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label>أدخل المهمة الجديدة</label>

            <table class="table">
                <thead class="thead-light">

                </thead>
                <tbody>
                @foreach($adminFunctions as $adminFunction)
                    <tr>
                        <td>{{$adminFunction}}</td>
                        
                        <td>
                            <input class="form-check-input px-5" type="checkbox" value="{{$adminFunction}}" name="newFunctions[]" {{ in_array($adminFunction,$permissionFunctions) ? "checked":"" }}>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <input type="submit" class="btn btn-info" value="إضافة">
    </form>

</div>