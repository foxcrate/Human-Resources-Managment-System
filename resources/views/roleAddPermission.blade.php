<div class="card mb-3">
    <h5 class="card-title">إضافة صلاحية جديدة</h5>
    <h5 class="card-title">لرتبة: {{$role->name}}</h5>
    <form action="{{ url('/roles/addPermission',$role->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label>أدخل الصلاحية الجديدة</label>
            <input name="permissionName" type="text" class="form-control"  placeholder="الصلاحية الجديدة" >
        </div>
        <br>
        <input type="submit" class="btn btn-info" value="إضافة">
    </form>
</div>