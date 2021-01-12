<div class="container-fluid mt-4 " id="create-form">
    <div class="row">
        <section class="col-md-9">
            <div class="card p-1">
                <h5 class="card-title">إضافة عضو جديد</h5>
                
                <form action="{{ url('/addNewUser') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>الإسم </label>
                        <input name="name" type="text" class="form-control"  placeholder="">
                        @error('name')
                        <div class="alert-warning">{{$errors->first('name')}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>الايميل </label>
                        <input name="email" type="email" class="form-control"  placeholder="">
                        @error('email')
                        <div class="alert-warning">{{$errors->first('email')}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>كلمة السر </label>
                        <input name="password" type="password" class="form-control"  placeholder="">
                        @error('password')
                        <div class="alert-warning">{{$errors->first('password')}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>إعادة كلمة السر </label>
                        <input name="password_confirmation" type="password" class="form-control"  placeholder="">
                        <!--@error('password')
                        <div class="alert-warning">{{$errors->first('password')}}</div>
                        @enderror-->
                    </div>
                    <input type="submit" class="btn btn-info" value="إضافة">
                </form>
            </div>
        </section>
        
    </div>
</div>