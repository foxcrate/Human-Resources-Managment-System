<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>dashboard</title>
</head>
<body>
    <div class="wrapper">
        <div class="row">
            <div class="col-3 col-m-6 col-sm-6">
                <div class="counter bg-primary">
                    <p>
                        <i class="fas fa-tasks"></i>
                    </p>
                    <h3>100+</h3>
                    <p>To do</p>
                </div>
            </div>
            
            

            <div class="col-3 col-m-6 col-sm-6">
                <div class="counter bg-warning">
                    <p>
                        <i class="fas fa-spinner"></i>
                    </p>
                    <h3>100+</h3>
                    <p>In progress</p>
                </div>
            </div>
            <div class="col-3 col-m-6 col-sm-6">
                <div class="counter bg-success">
                    <p>
                        <i class="fas fa-check-circle"></i>
                    </p>
                    <h3>100+</h3>
                    <p>Completed</p>
                </div>
            </div>
            <div class="col-3 col-m-6 col-sm-6">
                <div class="counter bg-danger">
                    <p>
                        <i class="fas fa-bug"></i>
                    </p>
                    <h3>100+</h3>
                    <p>Issues</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html> -->

<div class="wrapper">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">

                    <h3>{{count($workers)}}</h3>


                    <p>عدد الموظفين</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                </div>
                <a href="/index" class="small-box-footer"> تفاصيل أكثر <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">

                    <!--<h3> 90 <sup style='font-size: 20px'>%</sup></h3>-->
                    <h3>{{$todaySalaryWorkers}}</h3>
                    <p>موظف معاد قبضه اليوم</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/todaySalaries" class="small-box-footer"> تفاصيل أكثر <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!--
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3> 4 </h3>
                    <p>On Time Today</p>
                </div>
                <div class="icon">
                    <i class="ion ion-clock"></i>
                </div>
                <a href="/attendance" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div> -->
        <!-- ./col
        -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h4>{{$todaySalaries}} جنية</h4>

                    <p>إجمالي المرتبات المستحقة اليوم</p>
                </div>
                <div class="icon">
                    <i class="ion ion-alert-circled"></i>
                </div>
                <a href="/latetime" class="small-box-footer">تفاصيل أكثر<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
</div>