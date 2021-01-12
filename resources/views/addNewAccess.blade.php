<div class="card p-1">
    <h5 class="card-title">أدخل بيانات الصلاحية الجديدة</h5>
    <form action="{{ url('/access/addNewAccess') }}" method="post">
        @csrf
        <div class="form-group">
            <label>أدخل الإسم</label>
            <input name="accessName" type="text" class="form-control"  placeholder="أدخل الإسم" >
            @error('accessName')
            <div class="alert-warning">{{$errors->first('accessName')}}</div>
            @enderror
        </div>
        
        <br>
        <input type="submit" class="btn btn-info" value="حفظ">
    </form>
</div>