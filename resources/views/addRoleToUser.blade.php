<div class="card mb-3">
    <h5 class="card-title">إضافة رتبة للعضو:</h5>
    <h5 class="card-title">{{$user->name}}</h5>
    <form action="{{ url('/users/addRoleToUser',$user->id) }}" method="post">
        @csrf
        <!--<div class="form-group">
            <label>أدخل الصلاحية الجديدة</label>
            @foreach($allRoles as $role)
            <div class=" form-switch ">
                <label for="">{{$role->name}}</label>
                <input class="form-check-input px-5" type="checkbox" value="add" name="userRoles[]" >                    
            </div>
            @endforeach
        </div>-->

        <div class="form-group">
            <label>أدخل الصلاحية الجديدة</label>
            <table class="table">
                <thead class="thead-light">

                </thead>
                <tbody>
                @foreach($allRoles as $role)
                    <tr>
                        <td>{{$role->name}}</td>
                        
                        <td>
                            <input class="form-check-input px-5" type="checkbox" value="{{$role->name}}" name="userRoles[]" {{ in_array($role->name,$userRolesNames) ? "checked":"" }}> 
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