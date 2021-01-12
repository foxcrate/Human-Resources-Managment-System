<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>New Worker</title>
</head>
@include("nav")
<body dir="rtl">
    <div class="container-fluid mt-4 " id="create-form">
        <div class="row">
            <!-- <section class="col-md-7">
                
            </section> -->
            
            <section class="col-md-9">
                <div class="card p-1">
                    <h5 class="card-title">أدخل بيانات الموظف الجديد</h5>
                    <form action="{{ url('/store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>الإسم</label>
                            <input name="name" type="text" class="form-control"  placeholder="أدخل الإسم" >
                            @error('name')
                            <div class="alert-warning">{{$errors->first('name')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>القسم</label>    
                            <select id="department" name="department" class="form-control">
                                <option value="web">ويب</option>
                                <option value="andriod">اندرويد</option>
                                <option value="hr">شئون عاملين</option>
                                <option value="lw">شئون قانونية</option>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label>التعليم </label>
                            <input name="education" type="text" class="form-control"  placeholder="أدخل التعليم ">
                            @error('education')
                            <div class="alert-warning">{{$errors->first('education')}}</div>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label>تاريخ التخرج</label>
                            <input name="graduationDate" type="date" class="form-control"  placeholder="أدخل تاريخ التخرج">
                            @error('graduationDate')
                            <div class="alert-warning">{{$errors->first('graduationDate')}}</div>
                            @enderror
                        </div>  
                        <div class="form-group">
                            <label>تاريخ بدء العمل</label>
                            <input name="workStartDate" type="date" class="form-control"  placeholder="أدخل تاريخ بدء العمل">
                            @error('workStartDate')
                            <div class="alert-warning">{{$errors->first('workStartDate')}}</div>
                            @enderror
                        </div>  
                        <div class="form-group">
                            <label>رقم الموبيل</label>
                            <input  name="mobileNumber" type="tel" class="form-control"  placeholder="أدخل رقم الموبيل">
                            @error('mobileNumber')
                            <div class="alert-warning">{{$errors->first('mobileNumber')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>العنوان</label>
                            <input name="address" type="text" class="form-control"  placeholder="أدخل العنوان">
                            @error('address')
                            <div class="alert-warning">{{$errors->first('address')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>الإيميل</label>
                            <input name="email" type="email" class="form-control"  placeholder="أدخل الإيميل" >
                            @error('email')
                            <div class="alert-warning">{{$errors->first('email')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>المجموع الدراسي</label>
                            <input  name="GPA" type="number" step="any" class="form-control"  placeholder="أدخل المجموع الدراسي">
                            @error('GPA')
                            <div class="alert-warning">{{$errors->first('GPA')}}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>تاريخ التقدم للعمل</label>
                            <input  name="workApplyDate" type="date" class="form-control"  placeholder="أدخل تاريخ التقدم للعمل">
                            @error('workApplyDate')
                            <div class="alert-warning">{{$errors->first('workApplyDate')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>رقم تليفون منزلي</label>
                            <input  name="homeTelephone" type="number" class="form-control"  placeholder="أدخل تليفون المنزل">
                            @error('homeTelephone')
                            <div class="alert-warning">{{$errors->first('homeTelephone')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>رقم موبيل ثاني</label>
                            <input  name="anotherMobileNumber" type="number" class="form-control"  placeholder="أدخل رقم موبيل ثاني">
                            @error('anotherMobileNumber')
                            <div class="alert-warning">{{$errors->first('anotherMobileNumber')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>الرقم القومي</label>
                            <input  name="nationalID" type="number" class="form-control"  placeholder="أدخل الرقم القومي">
                            @error('nationalID')
                            <div class="alert-warning">{{$errors->first('nationalID')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>الرقم التأميني</label>
                            <input  name="insuranceID" type="number" class="form-control"  placeholder="أدخل الرقم التأميني">
                            @error('insuranceID')
                            <div class="alert-warning">{{$errors->first('insuranceID')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>مجموع المرتب</label>
                            <input  name="totalSalary" type="number" class="form-control"  placeholder="أدخل مجموع المرتب المفترض من الموظف أخذه">
                            @error('totalSalary')
                            <div class="alert-warning">{{$errors->first('totalSalary')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>أجر الساعة</label>
                            <input  name="hourPay" type="number" step="any" class="form-control"  placeholder="أدخل أجر الساعة للموظف">
                            @error('hourPay')
                            <div class="alert-warning">{{$errors->first('hourPay')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>معاد الحضور</label>
                            <input  name="shouldArriveTime" type="time" class="form-control"  placeholder="أدخل معاد الحضور للموظف">
                            @error('shouldArriveTime')
                            <div class="alert-warning">{{$errors->first('shouldArriveTime')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>معاد الإنصراف</label>
                            <input  name="shouldLeaveTime" type="time" class="form-control"  placeholder="أدخل معاد الإنصراف للموظف">
                            @error('shouldLeaveTime')
                            <div class="alert-warning">{{$errors->first('shouldLeaveTime')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>أيام الواجبة شهريا</label>
                            <input  name="shouldWorkedDays" type="number" class="form-control"  placeholder="أدخل أيام العمل الواجبة شهريا">
                            @error('shouldWorkedDays')
                            <div class="alert-warning">{{$errors->first('shouldWorkedDays')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>ساعات العمل الواجبة شهريا</label>
                            <input  name="shouldWorkedHours" type="number" step="any" class="form-control"  placeholder="أدخل ساعات العمل الواجبة شهريا">
                            @error('shouldWorkedHours')
                            <div class="alert-warning">{{$errors->first('shouldWorkedHours')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>المرتب الأساسي</label>
                            <input  name="basicSalary" type="number" class="form-control"  placeholder="أدخل الراتب الأساسي">
                            @error('basicSalary')
                            <div class="alert-warning">{{$errors->first('basicSalary')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>بدل الحضور</label>
                            <input  name="attendanceCompensation" type="number" class="form-control"  placeholder="أدخل بدل الحضور">
                            @error('attendanceCompensation')
                            <div class="alert-warning">{{$errors->first('attendanceCompensation')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>بدل الإنتظام</label>
                            <input  name="orderCompensation" type="number" class="form-control"  placeholder="أدخل بدل الإنتظام">
                            @error('orderCompensation')
                            <div class="alert-warning">{{$errors->first('orderCompensation')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>بدل إنتقال</label>
                            <input  name="transportationCompensation" type="number" class="form-control"  placeholder="أدخل بدل الإنتقال">
                            @error('transportationCompensation')
                            <div class="alert-warning">{{$errors->first('transportationCompensation')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>الأجازات السنوية</label>
                            <input  name='annualVacations' type="number" class="form-control"  placeholder="أدخل الأجازات السنوية">
                            @error('annualVacations')
                            <div class="alert-warning">{{$errors->first('annualVacations')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>الأجازات الإعتيادية</label>
                            <input  name='regularVacation' type="number" class="form-control"  placeholder="أدخل الأجازات الإعتيادية">
                            @error('regularVacation')
                            <div class="alert-warning">{{$errors->first('regularVacation')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>الأجازات العارضة</label>
                            <input  name='casualVacation' type="number" class="form-control"  placeholder="أدخل الأجازات العارضة">
                            @error('casualVacation')
                            <div class="alert-warning">{{$errors->first('casualVacation')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>مكافئات</label>
                            <input  name="rewards" type="number" class="form-control"  placeholder="أدخل المكافئات">
                            @error('rewards')
                            <div class="alert-warning">{{$errors->first('rewards')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>حوافز</label>
                            <input  name="incentives" type="number" class="form-control"  placeholder="أدخل الحوافز">
                            @error('incentives')
                            <div class="alert-warning">{{$errors->first('incentives')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>وقت عمل زائد</label>
                            <input  name="overTime" type="number" step="any" class="form-control"  placeholder="أدخل وقت العمل الزائد">
                            @error('overTime')
                            <div class="alert-warning">{{$errors->first('overTime')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>جزاء الغياب</label>
                            <input  name="dayAbsencePay" type="number"  step="any" class="form-control"  placeholder="أدخل جزاء يوم الغياب (بالجنيهات)">
                            @error('dayAbsencePay')
                            <div class="alert-warning">{{$errors->first('dayAbsencePay')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>جزاء التأخير</label>
                            <input  name="latePay" type="number" step="any" class="form-control"  placeholder="أدخل جزاء نقس الساعة عن عدد ساعات العمل المطلوبة (بالجنيهات)">
                            @error('latePay')
                            <div class="alert-warning">{{$errors->first('latePay')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>عقاب</label>
                            <input  name="naughty" type="number" step="any" class="form-control"  placeholder="أدخل عدد مرات العقاب (المرة بأجر ساعة)">
                            @error('naughty')
                            <div class="alert-warning">{{$errors->first('naughty')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>خصم التأمينات</label>
                            <input  name="insurancePay" type="number" class="form-control"  placeholder="أدخل خصم التأمينات">
                            @error('insurancePay')
                            <div class="alert-warning">{{$errors->first('insurancePay')}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>خصم الضرائيب</label>
                            <input  name="taxesPay" type="number" class="form-control"  placeholder="أدخل خصم الضرائب">
                            @error('taxesPay')
                            <div class="alert-warning">{{$errors->first('taxesPay')}}</div>
                            @enderror
                        </div>
                        <!--<div class="form-group">
                            <label>خصومات أخرى</label>
                            <input  name="otherMoney" type="number" class="form-control"  placeholder="أدخل الخصومات الأخرى">
                        </div>
                        <div class="form-group">
                            <label>تفسير الخصومات الأخرى</label>
                            <input  name="otherMoneyExplanation" type="text" class="form-control"  placeholder="أدخل تفسير الخصومات الأخرى">
                        </div>-->

                        <input type="reset" class="btn btn-warning" value="مسح المعلومات">
                        <input type="submit" class="btn btn-info" value="حفظ">
                    </form>
                </div>
            </section>
            
        </div>
    </div>
</body>
</html>