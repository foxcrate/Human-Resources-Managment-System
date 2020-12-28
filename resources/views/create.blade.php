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
                        </div>
                        <div class="form-group">
                            <label>التعليم</label>    
                            <select id="education" name="education" class="form-control">
                                <option value="cs">علوم الحاسب</option>
                                <option value=it>شبكات</option>
                                <option value="hr">شئون عاملين</option>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label>تاريخ التخرج</label>
                            <input name="graduationDate" type="date" class="form-control"  placeholder="أدخل تاريخ التخرج">
                        </div>  
                        <div class="form-group">
                            <label>تاريخ بدء العمل</label>
                            <input name="workStartDate" type="date" class="form-control"  placeholder="أدخل تاريخ بدء العمل">
                        </div>  
                        <div class="form-group">
                            <label>رقم الموبيل</label>
                            <input  name="mobileNumber" type="tel" class="form-control"  placeholder="أدخل رقم الموبيل">
                        </div>
                        <div class="form-group">
                            <label>العنوان</label>
                            <input name="address" type="text" class="form-control"  placeholder="أدخل العنوان">
                        </div>
                        <div class="form-group">
                            <label>الإيميل</label>
                            <input name="email" type="email" class="form-control"  placeholder="أدخل الإيميل" >
                        </div>
                        <div class="form-group">
                            <label>أيام العمل</label>
                            <input  name="workDays" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>المجموع الدراسي</label>
                            <input  name="GPA" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        
                        <div class="form-group">
                            <label>تاريخ التقدم للعمل</label>
                            <input  name="workApplyDate" type="date" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>رقم تليفون منزلي</label>
                            <input  name="homeTelephone" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>رقم موبيل ثاني</label>
                            <input  name="mobileNumber2" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>الرقم القومي</label>
                            <input  name="nationalID" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>الرقم التأميني</label>
                            <input  name="insuranceID" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label> أيام العمل الشهرية</label>
                            <input  name="monthWorkedDays" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>ساعات العمل الشهرية</label>
                            <input  name="monthWorkedHours" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>مجموع المرتب</label>
                            <input  name="totalSalary" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>أجر اليوم</label>
                            <input  name="dayPaid" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>أجر الساعة</label>
                            <input  name="hourPaid" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>ساعات العمل الواجبة شهريا</label>
                            <input  name="monthlyShouldWorkedHours" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>معاد الحضور</label>
                            <input  name="attendanceTime" type="time" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>معاد الإنصراف</label>
                            <input  name="leaveTime" type="time" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>معاد التأخير</label>
                            <input  name="lateTime" type="time" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>أيام حضور الموظف</label>
                            <input  name="daysAttended" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>أيام غياب الموظف</label>
                            <input  name="daysAbsented" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>أيام تأخر الموظف</label>
                            <input  name="daysLated" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>المرتب الأساسي</label>
                            <input  name="basicSalary" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>بدل الحضور</label>
                            <input  name="attendanceCompensation" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>بدل الإنتظام</label>
                            <input  name="orderCompensation" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>بدل إنتقال</label>
                            <input  name="transportationCompensation" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>مكافئات</label>
                            <input  name="rewards" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>حوافز</label>
                            <input  name="incentives" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>وقت عمل زائد</label>
                            <input  name="overTime" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>جزاء الغياب</label>
                            <input  name="dayAbsencePay" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>جزاء التأخير</label>
                            <input  name="dayLatePay" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>جزاء عقابي</label>
                            <input  name="naughtyPay" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>خصم التأمينات</label>
                            <input  name="insurancePay" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>خصم الضرائيب</label>
                            <input  name="taxesPay" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>
                        <div class="form-group">
                            <label>خصومات أخرى</label>
                            <input  name="otherPays" type="number" class="form-control"  placeholder="أدخل أيام العمل">
                        </div>

                        <input type="reset" class="btn btn-warning" value="مسح المعلومات">
                        <input type="submit" class="btn btn-info" value="حفظ">
                    </form>
                </div>
            </section>
            
        </div>
    </div>
</body>
</html>