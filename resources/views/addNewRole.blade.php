<div class="card p-1">
    <h5 class="card-title">أدخل بيانات الرتبة الجديدة</h5>
    <form action="{{ url('/roles/addNewRole') }}" method="post">
        @csrf
        <div class="form-group">
            <label>أدخل الإسم</label>
            <input name="roleName" type="text" class="form-control"  placeholder="أدخل الإسم" >
        </div>
        <br>
        <input type="submit" class="btn btn-info" value="حفظ">
    </form>
</div>