<div class="container-fluid mt-4 " id="create-form">
    <div class="row">
        <section class="col-md-9">
            <div class="card p-1">
                <h5 class="card-title">إيميل الشركة</h5>
                
                <form action="{{ url('/companyMail') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>الايميل </label>
                        <input name="email" type="emal" class="form-control"  placeholder="{{$companyMail}}">
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
                    <input type="submit" class="btn btn-info" value="تسجيل">
                </form>
            </div>
        </section>
        
    </div>
</div>