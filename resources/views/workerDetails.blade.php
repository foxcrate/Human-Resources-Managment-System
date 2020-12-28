<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="../css/style.css" /> 
    <style>
            body {
        overflow-x: hidden;
        }

        #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
        width: 15rem;
        }

        #page-content-wrapper {
        min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
        }

        @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
        }
    </style>

    <title>Worker Details</title>
</head>
@include("nav")
<body dir="rtl">
    <div class="d-flex" id="wrapper">

        <div class="bg-light border-right" id="sidebar-wrapper">
        @include("sidebar")
        </div>

        <div id="page-content-wrapper">

            @if($layout=="show")
                <div class="container-fluid mt-4 " id="show-form" dir="rtl">
                    <div class="row">
                        <section class="col-md-6">
                            <div class="card p-1">
                                <h5 class="card-title">تفاصيل الموظف</h5>
                                <h5 class="card-title">{{$worker->name}}</h5>
                                <table class="table  table-bordered"> 
                                    <tbody> 
                                        <tr>    
                                            <th> التقدير</th>
                                            <td>{{$worker->GPA}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th> تاريخ التخرج</th>
                                            <td>{{$worker->graduationDate}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th> تاريخ التقدم للعمل</th>
                                            <td>{{$worker->workApplyDate}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>رقم تليفون منزل</th>
                                            <td>{{$worker->homeTelephone}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>رقم موبيل ثاني</th>
                                            <td>{{$worker->mobileNumber2}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th> الرقم القومي</th>
                                            <td>{{$worker->nationalID}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th> رقم التأمينات</th>
                                            <td>{{$worker->insuranceID}} </td>
                                        </tr>
                                        
                                        <tr>
                                            <th> الإيميل</th>
                                            <td>{{$worker->email}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>عدد أيام العمل شهريا</th>   
                                            <td>{{$worker->monthWorkedDays}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>عدد ساعات العمل شهريا</th>
                                            <td>{{$worker->monthWorkedHours}}</td>
                                        </tr>
                                    
                                        <tr>
                                            <th> الراتب كاملا</th>
                                                <td>
                                                    <div class="fluid pr-0">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <!-- <p class="mb-0">{{$worker->totalSalary}}</p> -->
                                                                {{$worker->totalSalary}}
                                                            </div>
                                                            <div class="col-6" dir="ltr">
                                                                <a href="{{ url('/show/salaryDetails/'.$worker->id)}}"  class="btn btn-sm btn-warning">تفاصيل </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </section>
                    </div>
                </div>
            @elseif($layout=="salaryDetails")
                <div class="container-fluid mt-4 " id="show-form" dir="rtl">
                        <div class="row">
                            <section class="col-md-6">
                                <div class="card p-1">
                                    <h5 class="card-title">تفاصيل الموظف</h5>
                                    <table class="table  table-bordered"> 
                                        <tbody> 
                                            <tr>    
                                                <th> التقدير</th>
                                                <td>{{$worker->GPA}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th> تاريخ التخرج</th>
                                                <td>{{$worker->graduationDate}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th> تاريخ التقدم للعمل</th>
                                                <td>{{$worker->workApplyDate}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th>رقم تليفون منزل</th>
                                                <td>{{$worker->homeTelephone}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th>رقم موبيل ثاني</th>
                                                <td>{{$worker->mobileNumber2}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th> الرقم القومي</th>
                                                <td>{{$worker->nationalID}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th> رقم التأمينات</th>
                                                <td>{{$worker->insuranceID}} </td>
                                            </tr>
                                            
                                            <tr>
                                                <th> الإيميل</th>
                                                <td>{{$worker->email}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th>عدد أيام العمل شهريا</th>   
                                                <td>{{$worker->monthWorkedDays}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th>عدد ساعات العمل شهريا</th>
                                                <td>{{$worker->monthWorkedHours}}</td>
                                            </tr>
                                        
                                            <tr>
                                                <th> الراتب كاملا</th>
                                                <td>
                                                    <div class="fluid pr-0">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <!-- <p class="mb-0">{{$worker->totalSalary}}</p> -->
                                                                {{$worker->totalSalary}}
                                                            </div>
                                                            <div class="col-6" dir="ltr">
                                                                <a href="{{ url('/show/salaryDetails/'.$worker->id)}}"  class="btn btn-sm btn-warning">تفاصيل </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                        </tbody>
                                    </table> 
                                </div>
                            </section>
                            <section class="col-md-6">
                                <div class="card p-1">
                                    <h5 class="card-title">تفاصيل مرتب الموظف</h5>
                                        <table class="table  table-bordered"> 
                                            <tbody>
                                                <tr>
                                                    <th> أجر اليوم</th>
                                                    <td>{{$worker->dayPaid}}</td>
                                                </tr>

                                                <tr>
                                                    <th>  أجر الساعة</th>
                                                    <td>{{$worker->hourPaid}}</td>
                                                </tr>  

                                                <tr>
                                                    <th> ساعات عمل الشهر</th>
                                                    <td>{{$worker->monthlyShouldWorkedHours}}</td>
                                                </tr>

                                                <tr>
                                                    <th>وقت الحضور</th>
                                                    <td>{{$worker->attendanceTime}}</td>
                                                </tr>

                                                <tr>
                                                    <th>وقت الإنصراف</th>
                                                    <td>{{$worker->leaveTime}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> وقت التأخير</th>
                                                    <td>{{$worker->lateTime}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> أيام حضوره</th>
                                                    <td>{{$worker->daysAttended}} </td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> أيام غيابه</th>
                                                    <td>{{$worker->daysAbsented}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th>أيام تأخيره</th>
                                                    <td>{{$worker->daysLated}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th>الراتب الأساسي</th>
                                                    <td>{{$worker->basicSalary}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> بدل حضور</th>
                                                    <td>{{$worker->attendanceCompensation}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> بدل انتظام</th>
                                                    <td>{{$worker->orderCompensation}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> بدل انتقال</th>
                                                    <td>{{$worker->transportationCompensation}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> مكافئات</th>
                                                    <td>{{$worker->rewards}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> حوافز</th>
                                                    <td>{{$worker->incentives}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> وقت إضافي</th>
                                                    <td>{{$worker->overTime}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> غياب</th>
                                                    <td>{{$worker->dayAbsencePay}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> تأخير</th>
                                                    <td>{{$worker->dayLatePay}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> جزئة</th>
                                                    <td>{{$worker->naughtyPay}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> تأمينات</th>
                                                    <td>{{$worker->insurancePay}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> ضرائب</th>
                                                    <td>{{$worker->taxesPay}}</td>
                                                </tr>
                                                                                        
                                                <tr>
                                                    <th> مستقطعات أخرى</th>
                                                    <td>{{$worker->otherPays}}</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>

                            </section>
                        </div>
                </div>

            @endif
        </div>

    </div>
</body>

</html>