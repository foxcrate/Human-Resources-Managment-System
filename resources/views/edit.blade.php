<div class="card mb-3">
    <div class="card mb-3">
        <h5 class="card-title">أدخل بيانات الموظف المعدله</h5>
        <form action="{{ url('/update/'.$worker->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label>الإسم</label>
                <input value={{$worker->name}} name="name" type="text" class="form-control"  placeholder="أدخل الإسم" >
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
                <input value={{$worker->graduationDate}} name="graduationDate" type="date" class="form-control"  placeholder="أدخل تاريخ التخرج">
            </div> 
            <div class="form-group">
                <label>تاريخ بدء العمل</label>
                <input value={{$worker->workStartDate}} name="workStartDate" type="date" class="form-control"  placeholder="أدخل تاريخ بدء العمل">
            </div>  
            <div class="form-group">
                <label>رقم الموبيل</label>
                <input value={{$worker->mobileNumber}} name="mobileNumber" type="tel" class="form-control"  placeholder="أدخل رقم الموبيل">
            </div>
            <div class="form-group">
                <label>العنوان</label>
                <input value={{$worker->address}} name="address" type="text" class="form-control"  placeholder="أدخل العنوان">
            </div>
            <div class="form-group">
                <label>الإيميل</label>
                <input value={{$worker->email}} name="email" type="email" class="form-control"  placeholder="أدخل الإيميل" >
            </div>
            <div class="form-group">
                <label>أيام العمل</label>
                <input value={{$worker->workDays}} name="workDays" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>المجموع الدراسي</label>
                <input value={{$worker->GPA}} name="GPA" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            
            <div class="form-group">
                <label>تاريخ التقدم للعمل</label>
                <input value={{$worker->workApplyDate}} name="workApplyDate" type="date" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>رقم تليفون منزلي</label>
                <input value={{$worker->homeTelephone}} name="homeTelephone" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>رقم موبيل ثاني</label>
                <input value={{$worker->mobileNumber2}} name="mobileNumber2" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>الرقم القومي</label>
                <input value={{$worker->nationalID}} name="nationalID" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>الرقم التأميني</label>
                <input value={{$worker->insuranceID}} name="insuranceID" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label> أيام العمل الشهرية</label>
                <input value={{$worker->monthWorkedDays}} name="monthWorkedDays" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>ساعات العمل الشهرية</label>
                <input value={{$worker->monthWorkedHours}} name="monthWorkedHours" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>مجموع المرتب</label>
                <input value={{$worker->totalSalary}} name="totalSalary" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>أجر اليوم</label>
                <input value={{$worker->dayPaid}} name="dayPaid" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>أجر الساعة</label>
                <input value={{$worker->hourPaid}} name="hourPaid" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>ساعات العمل الواجبة شهريا</label>
                <input value={{$worker->monthlyShouldWorkedHours}} name="monthlyShouldWorkedHours" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>معاد الحضور</label>
                <input value={{$worker->attendanceTime}} name="attendanceTime" type="time" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>معاد الإنصراف</label>
                <input value={{$worker->leaveTime}} name="leaveTime" type="time" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>معاد التأخير</label>
                <input value={{$worker->lateTime}} name="lateTime" type="time" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>أيام حضور الموظف</label>
                <input value={{$worker->daysAttended}} name="daysAttended" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>أيام غياب الموظف</label>
                <input value={{$worker->daysAbsented}} name="daysAbsented" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>أيام تأخر الموظف</label>
                <input value={{$worker->daysLated}} name="daysLated" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>المرتب الأساسي</label>
                <input value={{$worker->basicSalary}} name="basicSalary" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>بدل الحضور</label>
                <input value={{$worker->attendanceCompensation}} name="attendanceCompensation" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>بدل الإنتظام</label>
                <input value={{$worker->orderCompensation}} name="orderCompensation" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>بدل إنتقال</label>
                <input value={{$worker->transportationCompensation}} name="transportationCompensation" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>مكافئات</label>
                <input value={{$worker->rewards}} name="rewards" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>حوافز</label>
                <input value={{$worker->incentives}} name="incentives" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>وقت عمل زائد</label>
                <input value={{$worker->overTime}} name="overTime" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>جزاء الغياب</label>
                <input value={{$worker->dayAbsencePay}} name="dayAbsencePay" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>جزاء التأخير</label>
                <input value={{$worker->dayLatePay}} name="dayLatePay" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>جزاء عقابي</label>
                <input value={{$worker->naughtyPay}} name="naughtyPay" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>خصم التأمينات</label>
                <input value={{$worker->insurancePay}} name="insurancePay" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>خصم الضرائيب</label>
                <input value={{$worker->taxesPay}} name="taxesPay" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>
            <div class="form-group">
                <label>خصومات أخرى</label>
                <input value={{$worker->otherPays}} name="otherPays" type="number" class="form-control"  placeholder="أدخل أيام العمل">
            </div>

            <input type="reset" class="btn btn-warning" value="مسح المعلومات">
            <input type="submit" class="btn btn-info" value="حفظ">
            
        </form>
    </div>
</div>