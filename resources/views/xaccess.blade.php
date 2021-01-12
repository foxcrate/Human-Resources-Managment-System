<div class="card md-3" dir="rtl">
    <div class="card-body">
        <h5 class="card-title">صلاحيات الموظفين</h5>
        <p class="card-text">يمكنك تحديد صلاحية الموظف بالضغط على الصلاحية المطلوبة</p>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">إضافة</th>
                    <th scope="col"> مسح</th>
                    <th scope="col">تعديل بيانات</th>
                    <th scope="col">عرض تفاصيل</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                @foreach($users as $user) 
                
                <form action="{{ url('/saveAccess/'.$user->id) }}" method="post">
                    
                    @csrf
                    
                    <tr>
                        <th scope="row">{{$user->name}}</th>

                        <td >
                            <div class=" form-switch ">
                                <input class="form-check-input px-5" type="checkbox" value="add" name="choice[]" {{ in_array("add",explode(",",$user->access))? "checked":"" }} >
                                
                            </div>
                        </td>

                        <td>    
                            <div class=" form-switch ">
                                <input class="form-check-input px-5" type="checkbox" value="remove" name="choice[]" {{ in_array("remove",explode(",",$user->access))? "checked":"" }}>
                            </div>
                        </td>

                        <td>
                            <div class=" form-switch">
                                <input class="form-check-input px-5" type="checkbox" value="edit" name="choice[]" {{ in_array("edit",explode(",",$user->access))? "checked":"" }}>
                            </div>
                        </td>

                        <td>
                            <div class=" form-switch">
                                <input class="form-check-input px-5" type="checkbox" value="details" name="choice[]" {{ in_array("details",explode(",",$user->access))? "checked":"" }} >
                            </div>
                        </td>

                        <td>
                            <input type="submit" value="حفظ" class="btn btn-primary m-7 py-1">
                        </td>
                    </tr>
                </form>
                
                @endforeach
            </tbody>
        </table>
    </div>
</div>