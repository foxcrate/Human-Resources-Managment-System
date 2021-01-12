
<div class="container-fluid mt-4 " id="create-form">
    <div class="row">
        <section class="col-md-9">
            <div class="card p-1">
                <h5 class="card-title">تغيير كلمة السر ل {{$user->name}}</h5>
                <form action="{{ url('/changePasswordForUser/'.$user->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>كلمة السر الجديدة </label>
                        <input name="newPassword" type="password" class="form-control"  placeholder="">
                        @error('newPassword')
                        <div class="alert-warning">{{$errors->first('newPassword')}}</div>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-info" value="تغيير">
                </form>
            </div>
        </section>
        
    </div>
</div>