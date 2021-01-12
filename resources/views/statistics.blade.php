
<div class="container-fluid mt-4 " id="create-form">
    <div class="row">
        <section class="col-md-12">
            <div class="card p-1">
                <h5 class="card-title">الإحصائات</h5>

                <form action="{{ url('/statisticsDetails') }}" method="post">
                    @csrf
                   
                    <div class="row">
                        <section class="col-md-6">
                            
                            <div class="form-group">
                                <label>من تاريخ</label>
                                <input name="fromDate" type="date" class="form-control"  placeholder="2020-12-12">
                                @error('fromDate')
                                <div class="alert-warning">{{$errors->first('fromDate')}}</div>
                                @enderror
                            </div>

                        </section>

                        <section class="col-md-6">

                            <div class="form-group">
                                <label>حتى تاريخ</label>
                                <input name="toDate" type="date" class="form-control"  placeholder="">
                                @error('toDate')
                                <div class="alert-warning">{{$errors->first('toDate')}}</div>
                                @enderror
                            </div>

                        </section>
                    </div>

                    <input type="submit" class="btn btn-info mt-1" value="إحصاء">
                </form>

            </div>
        </section>
        
    </div>
</div>