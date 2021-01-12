<!--<div class="card mb-3">
    <p> 
    <h3 class="card-title">إضافة صلاحية جديدة</h3>
    <h3 class="card-title">لرتبة: {{$role->name}}</h3>
    </p>


    <h5 class="card-title">الصلاحيات المتوفرة  </h5>
    <h5 class="card-title">
    
    @foreach($permissions as $permission)
        <h6>- {{$permission->name}} -</h6>
    @endforeach

    </h5>

    
    <form action="{{ url('/roles/addPermission',$role->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label>أدخل الصلاحية الجديدة</label>
            <input name="permissionName" type="text" class="form-control"  placeholder="الصلاحية الجديدة" >
        </div>
        <br>
        <input type="submit" class="btn btn-info" value="إضافة">
    </form>
</div> -->





<div class="card mb-3">
    <p> 
    <h3 class="card-title">إضافة صلاحية جديدة</h3>
    <h3 class="card-title">لرتبة: {{$role->name}}</h3>
    </p>
    <form action="{{ url('/roles/addPermission',$role->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label>أدخل الصلاحية الجديدة</label>

            <table class="table">
                <thead class="thead-light">

                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{$permission->name}}</td>
                        
                        <td>
                            <input class="form-check-input px-5" type="checkbox" value="{{$permission->name}}" name="rolePermissions2[]" {{ in_array($permission->name,$rolePermissionsNames) ? "checked":"" }}>
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
