<div class="card mb-3">
    <div class="card mb-3">
        <h5 class="card-title">أدخل بيانات الموظف المعدله</h5>
        <form action="{{ url('/update/'.$worker->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label>الإسم</label>
                <input value={{$worker->name}} name="name" type="text" class="form-control"  placeholder="أدخل الإسم" >
                @error('name')
                <div class="alert-warning">{{$errors->first('name')}}</div>
                @enderror
            </div>
            <!--<div class="form-group">
                <label>القسم</label>
                <select id="department" name="department" class="form-control" value={{$worker->department}}>
                    <option value="web">ويب</option>
                    <option value="andriod">اندرويد</option>
                    <option value="hr">شئون عاملين</option>
                    <option value="lw">شئون قانونية</option>
                </select> 
            </div>-->
            <div class="form-group">
                <label>التعليم</label>
                <input value={{$worker->education}} name="education" type="text" class="form-control"  placeholder="أدخل التعليم ">
                @error('education')
                <div class="alert-warning">{{$errors->first('education')}}</div>
                @enderror
            </div> 
            <div class="form-group">
                <label>تاريخ التخرج</label>
                <input value={{$worker->graduationDate}} name="graduationDate" type="date" class="form-control"  placeholder="أدخل تاريخ التخرج">
                @error('graduationDate')
                <div class="alert-warning">{{$errors->first('graduationDate')}}</div>
                @enderror
            </div> 
            <div class="form-group">
                <label>تاريخ بدء العمل</label>
                <input value={{$worker->workStartDate}} name="workStartDate" type="date" class="form-control"  placeholder="أدخل تاريخ بدء العمل">
                @error('workStartDate')
                <div class="alert-warning">{{$errors->first('workStartDate')}}</div>
                @enderror
            </div>  
            <div class="form-group">
                <label>رقم الموبيل</label>
                <input value={{$worker->mobileNumber}} name="mobileNumber" type="tel" class="form-control"  placeholder="أدخل رقم الموبيل">
                @error('mobileNumber')
                <div class="alert-warning">{{$errors->first('mobileNumber')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>العنوان</label>
                <input value={{$worker->address}} name="address" type="text" class="form-control"  placeholder="أدخل العنوان">
                @error('address')
                <div class="alert-warning">{{$errors->first('address')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>الإيميل</label>
                <input value={{$worker->email}} name="email" type="email" class="form-control"  placeholder="أدخل الإيميل" >
                @error('email')
                <div class="alert-warning">{{$errors->first('email')}}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>المجموع الدراسي</label>
                <input value={{$worker->GPA}} name="GPA" type="number" step="any" class="form-control"  placeholder="أدخل المجومع الدراسي(GPA) ">
                @error('GPA')
                <div class="alert-warning">{{$errors->first('GPA')}}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>تاريخ التقدم للعمل</label>
                <input value={{$worker->workApplyDate}} name="workApplyDate" type="date" class="form-control"  placeholder="أدخل تاريخ التقدم للعمل ">
                @error('workApplyDate')
                <div class="alert-warning">{{$errors->first('workApplyDate')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>رقم تليفون منزلي</label>
                <input value={{$worker->homeTelephone}} name="homeTelephone" type="number" class="form-control"  placeholder="أدخل تليفون منزلي ">
                @error('homeTelephone')
                <div class="alert-warning">{{$errors->first('homeTelephone')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>رقم موبيل أخر</label>
                <input value={{$worker->anotherMobileNumber}} name="anotherMobileNumber" type="number" class="form-control"  placeholder="أدخل رقم موبيل اخر ">
                @error('anotherMobileNumber')
                <div class="alert-warning">{{$errors->first('anotherMobileNumber')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>الرقم القومي</label>
                <input value={{$worker->nationalID}} name="nationalID" type="number" class="form-control"  placeholder="أدخل الرقم القومي ">
                @error('nationalID')
                <div class="alert-warning">{{$errors->first('nationalID')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>الرقم التأميني</label>
                <input value={{$worker->insuranceID}} name="insuranceID" type="number" class="form-control"  placeholder="أدخل الرقم التأميني ">
                @error('insuranceID')
                <div class="alert-warning">{{$errors->first('insuranceID')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>مجموع المرتب</label>
                <input value={{$worker->totalSalary}} name="totalSalary" type="number" class="form-control"  placeholder="أدخل مجموع المرتب ">
                @error('totalSalary')
                <div class="alert-warning">{{$errors->first('totalSalary')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>أجر الساعة</label>
                <input value={{$worker->hourPay}} name="hourPay" type="number" step="any" class="form-control"  placeholder="أدخل أجر الساعة ">
                @error('hourPay')
                <div class="alert-warning">{{$errors->first('hourPay')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>معاد الحضور</label>
                <input value={{$worker->shouldArriveTime}} name="shouldArriveTime" type="time" class="form-control"  placeholder="أدخل معاد الحضور ">
                @error('shouldArriveTime')
                <div class="alert-warning">{{$errors->first('shouldArriveTime')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>معاد الإنصراف</label>
                <input value={{$worker->shouldLeaveTime}} name="shouldLeaveTime" type="time" class="form-control"  placeholder="أدخل معاد الانصراف ">
                @error('shouldLeaveTime')
                <div class="alert-warning">{{$errors->first('shouldLeaveTime')}}</div>
                @enderror
            </div>

            <div class="form-group my-3">
                <label>أجازات الأسبوع </label>

                <div class="input-group-text">
                <div >
                    <label for="1">السبت</label>
                    <input id="1" type="checkbox" value="Saturday" name="holidays[]">

                    <label for="2" >الحد</label>
                    <input  id="2" type="checkbox" value="Sunday" name="holidays[]">

                    <label for="3">الاتنين</label>
                    <input id="3" type="checkbox" value="Monday" name="holidays[]">

                    <label for="4">الثلاثاء</label>
                    <input id="4" type="checkbox" value="Tuesday" name="holidays[]">

                    <label for="5">الأربعاء</label>
                    <input id="5" type="checkbox" value="Wednesday" name="holidays[]">

                    <label for="6">الخميس</label>
                    <input id="6" type="checkbox" value="Thursday" name="holidays[]">

                    <label for="7">الجمعة</label>
                    <input id="7" type="checkbox" value="Friday" name="holidays[]">
                </div>
                </div>

                @error('holidays')
                <div class="alert-warning">{{$errors->first('holidays')}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>ساعات العمل الواجبة يوميا</label>
                <input value={{$worker->dailyShouldWorkedHours}} name="dailyShouldWorkedHours" type="number" step="any" class="form-control"  placeholder="أدخل ساعات العمل الواجبة شهريا ">
                @error('dailyShouldWorkedHours')
                <div class="alert-warning">{{$errors->first('dailyShouldWorkedHours')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>المرتب الأساسي</label>
                <input value={{$worker->basicSalary}} name="basicSalary" type="number" class="form-control"  placeholder="أدخل المرتب الاساسي ">
                @error('basicSalary')
                <div class="alert-warning">{{$errors->first('basicSalary')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>بدل الحضور</label>
                <input value={{$worker->attendanceCompensation}} name="attendanceCompensation" type="number" class="form-control"  placeholder="أدخل بدل الحضور ">
                @error('attendanceCompensation')
                <div class="alert-warning">{{$errors->first('attendanceCompensation')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>بدل الإنتظام</label>
                <input value={{$worker->orderCompensation}} name="orderCompensation" type="number" class="form-control"  placeholder="أدخل بدل الانتظام ">
                @error('orderCompensation')
                <div class="alert-warning">{{$errors->first('orderCompensation')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>بدل إنتقال</label>
                <input value={{$worker->transportationCompensation}} name="transportationCompensation" type="number" class="form-control"  placeholder="أدخل بدل الانتقال ">
                @error('transportationCompensation')
                <div class="alert-warning">{{$errors->first('transportationCompensation')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>الأجازات السنوية</label>
                <input value={{$worker->annualVacations}} name="annualVacations" type="number" class="form-control"  placeholder="أدخل الاجازات السنوية ">
                @error('annualVacations')
                <div class="alert-warning">{{$errors->first('annualVacations')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>الأجازات الإعتيادية</label>
                <input value={{$worker->regularVacation}} name="regularVacation" type="number" class="form-control"  placeholder="أدخل الاجازات الاعتيادية ">
                @error('regularVacation')
                <div class="alert-warning">{{$errors->first('regularVacation')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>الأجازات العارضة</label>
                <input value={{$worker->casualVacation}} name="casualVacation" type="number" class="form-control"  placeholder="أدخل الأجازات العارضة ">
                @error('casualVacation')
                <div class="alert-warning">{{$errors->first('casualVacation')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>مكافئات</label>
                <input value={{$worker->rewards}} name="rewards" type="number" class="form-control"  placeholder="أدخل المكافأت ">
                @error('rewards')
                <div class="alert-warning">{{$errors->first('rewards')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>حوافز</label>
                <input value={{$worker->incentives}} name="incentives" type="number" class="form-control"  placeholder="أدخل الحوافز ">
                @error('incentives')
                <div class="alert-warning">{{$errors->first('incentives')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>وقت عمل زائد</label>
                <input value={{$worker->overTime}} name="overTime" type="number" step="any" class="form-control"  placeholder=" أدخل وقت العمل الزائد">
                @error('overTime')
                <div class="alert-warning">{{$errors->first('overTime')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>جزاء الغياب</label>
                <input value={{$worker->dayAbsencePay}} name="dayAbsencePay" type="number" step="any" class="form-control"  placeholder="أدخل جزاء الغياب ">
                @error('dayAbsencePay')
                <div class="alert-warning">{{$errors->first('dayAbsencePay')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>جزاء التأخير</label>
                <input value={{$worker->latePay}} name="latePay" type="number" step="any" class="form-control"  placeholder="أدخل جزاء التأخير ">
                @error('latePay')
                <div class="alert-warning">{{$errors->first('latePay')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>العقاب </label>
                <input value={{$worker->naughty}} name="naughty" type="number" step="any" class="form-control"  placeholder="أدخل العقاب  (عدد الساعات)">
                @error('naughty')
                <div class="alert-warning">{{$errors->first('naughty')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>خصم التأمينات</label>
                <input value={{$worker->insurancePay}} name="insurancePay" type="number" class="form-control"  placeholder="أدخل خصم التأمينات">
                @error('insurancePay')
                <div class="alert-warning">{{$errors->first('insurancePay')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>خصم الضرائيب</label>
                <input value={{$worker->taxesPay}} name="taxesPay" type="number" class="form-control"  placeholder="أدخل خصم الضرائب">
                @error('taxesPay')
                <div class="alert-warning">{{$errors->first('taxesPay')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>خصومات أخرى</label>
                <input value={{$worker->otherMoney}} name="otherMoney" type="number" class="form-control"  placeholder="أدخل الخصومات الاخرى">
                @error('otherMoney')
                <div class="alert-warning">{{$errors->first('otherMoney')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>سبب خصومات أخرى</label>
                <input value={{$worker->otherMoneyExplanation}} name="otherMoneyExplanation" type="text" class="form-control"  placeholder="أدخل سبب الخصومات الاخرى">
                @error('otherMoneyExplanation')
                <div class="alert-warning">{{$errors->first('otherMoneyExplanation')}}</div>
                @enderror
            </div>

            <!--<input type="reset" class="btn btn-warning" value="مسح المعلومات">-->
            <input type="submit" class="btn btn-info" value="حفظ">
            
        </form>
    </div>
</div>