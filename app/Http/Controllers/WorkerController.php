<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Worker;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Attendance;
use App\Models\Past;
use Auth;
use PDF;
use App\Mail\elBaz;
use Carbon\Carbon;
//namespace App\Mail\elBaz;

require_once '../vendor/autoload.php';

use App\Exports\WorkersExport;
use Maatwebsite\Excel\Facades\Excel;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\Style\TablePosition;

class WorkerController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => 'pdf2']);
    }


    public function excel() {
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("export",$allFunctions)){
        return Excel::download(new WorkersExport, 'workers.xlsx');
        }
        return redirect()->back();
    }

    public function word(){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("export",$allFunctions)){

            $workers=Worker::all();
            $fileName='workers';
            $phpWord=new PhpWord();
            $section =$phpWord->addSection();
            $header = array('size' => 16, 'bold' => true,'rtl' => true);
            $section->addTextBreak(1);
            $section->addText('بيانات الموظفيين', $header);

            $fancyTableStyleName = 'Fancy Table';
            $fancyTableStyle = array('borderSize' => 6,'rtl' => true ,'cellMargin' => 00, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::END, 'cellSpacing' => 10);
            $fancyTableCellStyle = array('valign' => 'center');
            $fancyTableFontStyle = array('bold' => true,'rtl' => true);
            $phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle);
            $table = $section->addTable($fancyTableStyleName);
            $table->addRow();
            $table->addCell(500, $fancyTableCellStyle)->addText('أيام العمل',$fancyTableFontStyle);
            $table->addCell(500, $fancyTableCellStyle)->addText('الايميل', $fancyTableFontStyle);
            $table->addCell(500, $fancyTableCellStyle)->addText('العنوان', $fancyTableFontStyle);
            $table->addCell(500, $fancyTableCellStyle)->addText('الموبيل',$fancyTableFontStyle);
            $table->addCell(500, $fancyTableCellStyle)->addText('تاريخ بدء العمل', $fancyTableFontStyle);
            $table->addCell(500, $fancyTableCellStyle)->addText('المؤهل', $fancyTableFontStyle);
            $table->addCell(500, $fancyTableCellStyle)->addText('الإسم',$fancyTableFontStyle);
            foreach($workers as $worker) {
                $table->addRow();
                $table->addCell(2000)->addText($worker->workDays,array('name' => 'B Mitra', 'size' => 10,'rtl' => true));
                $table->addCell(2000)->addText($worker->email,array('name' => 'B Mitra', 'size' => 10,'rtl' => true));
                $table->addCell(2000)->addText($worker->address,array('name' => 'B Mitra', 'size' => 10,'rtl' => true));
                $table->addCell(2000)->addText($worker->mobileNumber,array('name' => 'B Mitra', 'size' => 10,'rtl' => true));
                $table->addCell(2000)->addText($worker->workStartDate,array('name' => 'B Mitra', 'size' => 10,'rtl' => true));
                $table->addCell(2000)->addText($worker->education,array('name' => 'B Mitra', 'size' => 10,'rtl' => true));
                $table->addCell(2000)->addText($worker->name,array('name' => 'B Mitra', 'size' => 10,'rtl' => true));
            }

            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment;filename="test.docx"');

            $objWriter =\PhpOffice\PhpWord\IOFactory::createWriter($phpWord,'Word2007');
            $objWriter->save('php://output');
        }

        return redirect()->back();
    }

    public function pdf(){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("export",$allFunctions)){    
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($this->convert_customer_data_to_html2());
            return $pdf->stream();

            /* $x = \App::make('dompdf.wrapper');
            $x->loadHTML($this->convert_customer_data_to_html2());
            $pdf = $x->output();

            $data = [
                'details' => 'This email is to notify you of this week sales and challenges we are facing as Sales department',
                'manager_name' => $user->name
            ];

            */

        }

        return redirect()->back();
    }

    public function pdf2($id){
        //dd($id);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html3($id));
        
        return $pdf->stream();
        
    }

    public function emailSalaryDetailsGet(){
        $workers=Worker::all();
        return view('worker',["workers"=>$workers,"layout"=>"emailSalaryDetails"]);
    }

    public function emailSalaryDetails($id){
        
        //Mail::to('ahmedmustafa.pro19@gmail.com')->send(new elBaz('printSalaryDetails'));
    }

    public function convert_customer_data_to_html3($id){
        $worker=Worker::find($id);
        ///////////////
        $output='
            <html lang="ar">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
                <style>
                    body{
                        font-family: DejaVu Sans, sans-serif;
                        direction: rtl;
                        width: 100%;
                        height: 210mm;
                        direction: rtl;
                        
                    }
                    .control-body {
                        margin-right: 0;
                        padding: 0 0 0 0;
                        position: relative;
                    }
                    .description{
                        position: absolute;
                        text-align: right;
                    }
                    .aa{
                        
                        padding-right: 30px;
                    }
                    .bb{
                        padding-left: 40px;
                    }

                    .divTable {
                        display: table;
                        width: 100%;
                       
                    }
                    
                    .divTableRow {
                        display: table-row;
                    }
                    
                    /*.divTableCell,
                    .divTableHead {
                        border: 1px solid #999999;
                        display: table-cell;
                        padding: 0px px;
                        word-wrap: break-word;
                        text-align: right;
                    }*/

                    .divTableCell{
                        border: 1px solid #999999;
                        display: table-cell;
                        padding: 0px px;
                        word-wrap: break-word;
                        text-align: right;
                        padding-left: 10px;
                        font-size: 15px;
                    }
                    
                    .divTableHeading {
                        background-color: #eee;
                        display: table-header-group;
                        font-weight: bold;
                    }
                    
                    .divTableFoot {
                        background-color: #eee;
                        display: table-footer-group;
                        font-weight: bold;
                    }

                    .divTableBody {
                        display: table-row-group;
                        
                    }

                    .fonty1{
                        font-size: 25px;
                    }

                    .fonty2{
                        font-size: 18px;
                        
                    }

                    .fonty3{
                        font-weight: bold;
                        margin-left: 50px;
                    }
                </style>
            </head>
            <body dir="rtl" style="direction: rtl">
                <p class="fonty1">مفردات المرتب الخاصة بك </p>

                <div class="divTable">
                    <div class="divTableBody">
                        <div class="divTableRow">
                            <div class="divTableCell">
                            ' .$worker->name .'
                            </div>
                            <div class="divTableCell fonty3">
                            الإسم 
                            </div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">
                            ' .$worker->department .'
                            </div>
                            <div class="divTableCell fonty3">
                            القسم 
                            </div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">
                            ' .$worker->totalSalary .'
                            </div>
                            <div class="divTableCell fonty3">
                            مجموع المرتب 
                            </div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">
                            ' .$worker->daysAttended .'
                            </div>
                            <div class="divTableCell fonty3">
                            أيام الحضور 
                            </div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">
                            ' .$worker->daysAbsented .'
                            </div>
                            <div class="divTableCell fonty3">
                            أيام الغياب 
                            </div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">
                            ' .$worker->hoursLated .'
                            </div>
                            <div class="divTableCell fonty3">
                            أيام التأخير 
                            </div>
                        </div>

                        
                    
                    </div>
                </div>
            </body>
            </html>
            ';
        return $output;
        //////////////
    }

    public function convert_customer_data_to_html2(){
        $workers=Worker::all();
        $output='
            <html lang="ar">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
                <style>
                    body{
                        font-family: DejaVu Sans, sans-serif;
                        direction: rtl;
                        width: 100%;
                        height: 210mm;
                        direction: rtl;
                        
                    }
                    .control-body {
                        margin-right: 0;
                        padding: 0 0 0 0;
                        position: relative;
                    }
                    .description{
                        position: absolute;
                        text-align: right;
                    }
                    .aa{
                        
                        padding-right: 30px;
                    }
                    .bb{
                        padding-left: 40px;
                    }

                    .divTable {
                        display: table;
                        width: 100%;
                       
                    }
                    
                    .divTableRow {
                        display: table-row;
                    }
                    
                    .divTableHeading {
                        background-color: #eee;
                        display: table-header-group;
                    }
                    
                    /*.divTableCell,
                    .divTableHead {
                        border: 1px solid #999999;
                        display: table-cell;
                        padding: 0px px;
                        word-wrap: break-word;
                        text-align: right;
                    }*/

                    .divTableCell{
                        border: 1px solid #999999;
                        display: table-cell;
                        padding: 0px px;
                        word-wrap: break-word;
                        text-align: right;
                        padding-left: 10px;
                        font-size: 15px;
                    }
                    
                    .divTableHeading {
                        background-color: #eee;
                        display: table-header-group;
                        font-weight: bold;
                    }
                    
                    .divTableFoot {
                        background-color: #eee;
                        display: table-footer-group;
                        font-weight: bold;
                    }

                    .divTableBody {
                        display: table-row-group;
                        
                    }

                    .fonty1{
                        font-size: 25px;
                    }

                    .fonty2{
                        font-size: 18px;
                        
                    }

                    .fonty3{
                        font-weight: bold;
                        margin-left: 50px;
                    }
                </style>
            </head>
            <body dir="rtl" style="direction: rtl">
                <p class="fonty1">قائمة العاملين</p>
                <p class="fonty2">تجد هنا كل المعلومات المفصلة عن العاملين في شركة الباز للبرمجيات</p>
                <div class="divTable">
                    <div class="divTableBody">
                        <div class="divTableRow">
                            <div class="divTableCell fonty3">
                            أيام العمل
                            </div>
                            <div class="divTableCell fonty3">
                            الايميل
                            </div>
                            <div class="divTableCell fonty3">
                            العنوان
                            </div>
                            <div class="divTableCell fonty3">
                             رقم الموبيل
                            </div>
                            <div class="divTableCell fonty3">
                            تاريخ بدء العمل
                            </div>
                            <div class="divTableCell fonty3">
                            المؤهل
                            </div>
                            <div class="divTableCell fonty3">
                            الإسم
                            </div>
                        </div>';
        foreach($workers as $worker){
            $output .='
                <div class="divTableRow">
                    <div class="divTableCell">
                    ' .$worker->daysAttended .'
                    </div>
                    <div class="divTableCell">
                    ' .$worker->email .'
                    </div>
                    <div class="divTableCell">
                    ' .$worker->address .'
                    </div>
                    <div class="divTableCell">
                    ' .$worker->mobileNumber .'
                    </div>
                    <div class="divTableCell">
                    ' .$worker->workStartDate .'
                    </div>
                    <div class="divTableCell">
                    ' .$worker->education .'
                    </div>
                    <div class="divTableCell">
                    ' .$worker->name .'
                    </div>
                </div>
            ';
        }
        $output.='
            </div>
            </div>
            </body>
            </html>
            ';
        return $output;
    }

    public function calculateSalary($id){
        $worker1=Worker::find($id);
        $worker1Attendances=$worker1->attendances;
        $current = Carbon::now();

        $founded=false;
        $workerPasts=$worker1->pasts;
        foreach($workerPasts as $past){
            if($past->date == $current->toDateString()){
                $founded=true;
                break;
            }
        }
        if($founded==false){
            //$current = Carbon::now();
            $shouldArriveTime=new Carbon($worker1->shouldArriveTime);
            $shouldLeaveTime=new Carbon($worker1->shouldLeaveTime);

            $daysAttendedByWorker=0;
            $hoursWorkedByWorker=0;
            $hoursLatedByWorker=0;
            $worker1->daysAbsented=0;
            $worker1->hoursNotWorked=0;

            $pastMonthDate=new Carbon($current->subMonth());
            //dd($pastMonthDate); 

            foreach($worker1Attendances as $attendance ){
                $ddd=new Carbon($attendance->date);
                $ttt=new Carbon($attendance->arriveTime);
                $ttt2=new Carbon($attendance->leaveTime);

                //if($ddd->month==$current->month){
                if($pastMonthDate < $ddd ){
                    //dd("alo");
                    //$worker1->daysAttended//
                    //$worker1->daysAttended=$worker1->daysAttended+1;
                    $daysAttendedByWorker ++;

                    //$worker1->hoursWorked//
                    //$worker1->hoursWorked +=$attendance->hoursWorked;
                    $hoursWorkedByWorker += $attendance->hoursWorked;

                    //$worker1->hoursLated//
                    $diffInArrive=$ttt->diffInMinutes($shouldArriveTime);
                    $diffInArrive=$diffInArrive/60;
                    $diffInLeave=$shouldLeaveTime->diffInMinutes($ttt2);
                    $diffInLeave=$diffInLeave/60;
                    if($ttt>$shouldArriveTime){
                        //$worker1->hoursLated+=$diffInArrive;
                        $hoursLatedByWorker += $diffInArrive;
                    }
                    if($shouldLeaveTime>$ttt2){
                        //$worker1->hoursLated+=$diffInLeave;
                        $hoursLatedByWorker += $diffInLeave;
                    }
                }
            }
            $worker1->daysAttended=$daysAttendedByWorker;
            $worker1->hoursWorked=$hoursWorkedByWorker;
            $worker1->hoursLated=$hoursLatedByWorker;

            $worker1->save();

            if($worker1->shouldWorkedDays > $worker1->daysAttended){
                $worker1->daysAbsented=$worker1->shouldWorkedDays-
                    $worker1->daysAttended;
            }
            if($worker1->shouldWorkedHours > $worker1->hoursWorked){
                $worker1->hoursNotWorked=$worker1->shouldWorkedHours-
                    $worker1->hoursWorked;
            }
            $worker1->save();

            $worker1->salaryToTake=($worker1->basicSalary)+
                ($worker1->attendanceCompensation)+
                ($worker1->orderCompensation)+
                ($worker1->transportationCompensation)+
                ($worker1->rewards)+
                ($worker1->incentives)+
                (($worker1->overTime)*($worker1->hourPay))-
                (($worker1->daysAbsented)*($worker1->dayAbsencePay))-
                (($worker1->hoursNotWorked)*($worker1->hourPay))-
                (($worker1->hoursLated)*($worker1->latePay))-
                (($worker1->naughty)*($worker1->hourPay))-
                ($worker1->insurancePay)-
                ($worker1->taxesPay)-($worker1->otherPay);
            $worker1->save();

            $past1=new Past();
            $past1->date=$current->toDateString();
            $past1->p_totalSalary = $worker1->totalSalary;
            $past1->p_hoursLated=$worker1->hoursLated;
            $past1->p_daysAttended=$worker1->daysAttended;
            $past1->p_daysAbsented=$worker1->daysAbsented;
            $past1->p_hoursWorked=$worker1->hoursWorked;
            $past1->p_hoursNotWorked=$worker1->hoursNotWorked;
            $past1->p_rewards=$worker1->rewards;
            $past1->p_incentives=$worker1->incentives;
            $past1->p_overTime=$worker1->overTime;
            $past1->p_naughty=$worker1->naughty;
            $past1->p_otherMoney=$worker1->otherMoney;
            $past1->p_otherMoneyExplanation=$worker1->otherMoneyExplanation;
            $past1->p_salaryToTake=$worker1->salaryToTake;
            $past1->save();

            $worker1->pasts()->attach($past1);

            ////$worker1->salaryToTake=0;
            //$worker1->daysAbsented=0;
            //$worker1->hoursNotWorked=0;
            //$worker1->daysAttended=0;
            //$worker1->hoursLated=0;
            //$worker1->hoursWorked=0;

            $worker1->save();
        }
    }

    public function addAttend($id){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
        }
        if(in_array("addAttendance",$allFunctions)){
            $worker1=Worker::find($id);
            $current = Carbon::now();
            $attend1= new Attendance();
            $attend1->date=$current->toDateString();
            $attend1->arriveTime=$current->toTimeString();
            $attend1->leaveTime=$current->toTimeString();
            $attend1->save();
            $worker1->attendances()->attach($attend1);
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function addLeave($id){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }   
        }
        if(in_array("addAttendance",$allFunctions)){
            $worker1=Worker::find($id);
            $workerAttendances=$worker1->attendances;
            $current = Carbon::now();

            foreach($workerAttendances as $wa){
                if($wa->date==$current->toDateString()){
                    $wa->leaveTime=$current->toTimeString();
                    $lt=new Carbon($wa->leaveTime);
                    $at=new Carbon($wa->arriveTime);
                    $hours=($lt->diffInMinutes($at))/60;
                    $wa->hoursWorked =$hours;
                    $wa->come=1;
                    $wa->save();
                    break;
                }
            }

            $workerStartDate=new Carbon($worker1->workStartDate);

            $currentDay=$current->day;
            $currentMonth=$current->month;
            $currentYear=$current->year;

            //$workerDay=$workerStartDate->day;
            $workerMonth=$workerStartDate->month;
            $workerYear=$workerStartDate->year;

            $workerDay=11;

            if($currentDay==$workerDay){
                //if($currentMonth==$workerMonth){
                    //if($currentYear != $workerYear){
                        //self::calculateSalary($worker1->id);
                    //}
                //}
                //else{
                    //////////////////////self::calculateSalary($worker1->id);
                //}
            }

            return redirect()->back();
        }
        return redirect()->back();
    }

    public function attendbst(){
        {
            /*$dt = Carbon::create(2021, 7, 4,8,30);
            $dt2 = Carbon::create('6:0');
            dd($dt2);
            $dt2=$dt->copy()->addMonth(2);
            $current = Carbon::now();
            dd($dt2->toDateString());
            dd($dt2->toDateString());
            $dTime=date('H:i:s');
            $attend1= new Attendance();
            $attend1->type=0;
            $attend1->date=$dDate;
            $attend1->arriveTime=$dTime;
            $attend1->leaveTime=$dTime;
            $attend1->save();
            $worker1=Worker::all()->first();
            $worker1=Worker::find(1);
            dd($worker1);
            dd($worker1->daysLated);
            $workerAttendances=$worker1->attendances;
            dd($workerAttendances[0]->arriveTime);
            $ttt=new Carbon($workerAttendances[0]->arriveTime);
            $ttt2=new Carbon($workerAttendances[0]->leaveTime);
            if($ttt>$ttt2){dd(true);}
            dd($ttt2->diffInMinutes($ttt));
            $x=($workerAttendances[0]->arriveTime)-($workerAttendances[0]->leaveTime);
            dd($workerAttendances[0]->arriveTime);
            $x=date_diff(date_create($workerAttendances[0]->arriveTime),date_create($workerAttendances[0]->leaveTime));
            $x->h;
            $x=self::calculateDaysAbsented(5);
            dd($x);
            $dDate=date('Y-m-d', strtotime($dDate. ' + 1 days'));*/
        }

        {
            $worker1=Worker::find(1);
            //dd($worker1->attendances);
            //dd($worker1);
            //$current=Carbon::now();
            $current=new Carbon('2020-12-12');
            //dd($current->subMonth());
            $date=$current->toDateString();
            $time1=new Carbon('8:00');
            $time2=new Carbon('5:00');
            for($i=0;$i<20;$i++){
                
                $date=$current->toDateString();
                $attend1=new Attendance();
                $attend1->date=$date;
                $attend1->arriveTime=$time1;
                $attend1->leaveTime=$time2;
                $attend1->come=1;
                $attend1->hoursWorked=9.0;
                $attend1->save();
                $worker1->attendances()->attach($attend1);
                $current->addDay();
            }
            /////////////////////////////////////
                $date=new Carbon('2021-1-10');
                $attend1=new Attendance();
                $attend1->date=$date;
                $attend1->arriveTime=$time1;
                $attend1->leaveTime=$time2;
                $attend1->come=1;
                $attend1->hoursWorked=9.0;
                $attend1->save();
                $worker1->attendances()->attach($attend1);

                $date=new Carbon('2021-1-11');
                $attend1=new Attendance();
                $attend1->date=$date;
                $attend1->arriveTime=$time1;
                $attend1->leaveTime=$time2;
                $attend1->come=1;
                $attend1->hoursWorked=9.0;
                $attend1->save();
                $worker1->attendances()->attach($attend1);
            /////////////////////////////////////
            dd("done");
        }
        
        {
            /*
            $workerAttendances=$worker1->attendances;
            foreach($workerAttendances as $attendance){
                //dd($attendance);
                $worker1->attendances()->detach($attendance);
            }
            $worker1->save();
            dd($workerAttendances);*/
        }


        
    }

    public function dashboard(){
        //dd(Auth::user()->userType);
        //if( Auth::user()->userType==0){
            $workers=Worker::all();
            //dd($workers);
            $current=Carbon::now();
            $currentDay=$current->day;
            $currentMonth=$current->month;
            $currentYear=$current->year;
            
            foreach($workers as $worker){
                //dd($worker);
                $founded=false;
                $workerPasts=$worker->pasts;
                foreach($workerPasts as $past){
                    if($past->date == $current->toDateString()){
                        //dd("alo");
                        $founded=true;
                        break;
                    }
                }
                if($founded){
                    continue;
                }
                $workerStartDate= new Carbon($worker->workStartDate);
                
                //$workerDay=$workerStartDate->day;
                $workerMonth=$workerStartDate->month;
                $workerYear=$workerStartDate->year;

                $workerDay=11;
                if($currentDay==$workerDay){
                   // if($currentMonth==$workerMonth){
                        //if($currentYear==$workerYear){
                            //continue;
                        //}
                    //dd($worker);
                   // }
                    self::calculateSalary($worker->id);
                }
            }

            $todaySalaryWorkers=0;
            $todaySalaries=0;

            foreach($workers as $worker){
            $workerStartDate= new Carbon($worker->workStartDate);
            $workerDay=$workerStartDate->day;
                if($workerDay==$currentDay ){
                    $todaySalaryWorkers++;
                    $todaySalaries += $worker->salaryToTake;
                }
            }
            return view('worker',['workers'=>$workers, 'todaySalaryWorkers'=>$todaySalaryWorkers, 'todaySalaries'=>$todaySalaries, "layout"=>"dashboard"]);
        //}
        //elseif( Auth::user()->userType==1){
            //dd("Aloooo");
        //}
    }

    public function toCompanyMail(){
        $adminMail=User::find(2)->email;
        //dd($adminMail);
        return view('worker',['companyMail'=>$adminMail,"layout"=>"setCompanyMail"]);
    }

    public function companyMail(Request $request){
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $admin=User::find(2);
        $admin->email=$request->email;
        $admin->emailPassword=$request->password;
        $admin->save();
    }

    public function todaySalaries(){
        $workers=Worker::all();
        $workersToday=array();

        $current=Carbon::now();
        $currentDay=$current->day;
        $currentMonth=$current->month;
        $currentYear=$current->year;

        foreach($workers as $worker){
            $workerStartDate= new Carbon($worker->workStartDate);
                
                $workerDay=$workerStartDate->day;
                $workerMonth=$workerStartDate->month;
                $workerYear=$workerStartDate->year;
                //dd($currentDay,$workerDay);
                if($currentDay==$workerDay){
                    if($currentMonth==$workerMonth){
                        if($currentYear==$workerYear){
                            continue;
                        }

                    }
                    array_push($workersToday,$worker);
                    //dd($worker);
                }
        }
        //dd($workersToday);

        return view('worker',['workersToday'=>$workersToday, "layout"=>"todaySalaries"]);
    }

    public function calculateDaysLated($id){
        $worker1=Worker::find($id);
        $workerAttendances=$worker1->attendances;
        for($i=0;$i<count($workerAttendances);$i++){
            $x=date_diff(date_create($workerAttendances[$i]->arriveTime),date_create($workerAttendances[$i]->leaveTime));
            if($workerAttendances[$i]->come ==0){
                continue;
            }
            if(($x->h)<9){
                $worker1->daysLated=($worker1->daysLated)+1;
            }
        }
        return $worker1->daysLated;
    }

    public function calculateDaysAbsented($id){
        $dDate=date("Y-m-d");
        $worker1=Worker::find($id);
        $workerAttendances=$worker1->attendances;
        //dd($workerAttendances);
        for($i=0;$i<count($workerAttendances);$i++){
            
            if($workerAttendances[$i]->date ==$dDate){
                return $worker1->daysAbsented;
            }
            if($workerAttendances[$i]->come==0){
                $worker1->daysAbsented=($worker1->daysAbsented)+1;
            }
        }
        return $worker1->daysAbsented;
    }

    public function attend(){
        $workers=Worker::all();
        /*foreach($workers as $worker){
            $worker->daysLated=self::calculateDaysLated($worker->id);
            $worker->daysAbsented=self::calculateDaysAbsented($worker->id);
        }*/
        return view('worker',['workers'=>$workers,"layout"=>"attend"]);
    }

    public function attendanceDetails(){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("attendanceDetails",$allFunctions)){

            $workers=Worker::all();
            //foreach($workers as $worker){
                
            //}
            return view('worker',['workers'=>$workers,"layout"=>"attendanceDetails"]);
        }
        return redirect()->back();
    }

 
  /*  
    public function showAccess(){
        $users=User::all();
        $usersAccess=array();
        foreach($users as $user){
            $a=explode(",",$user->access);
            array_push($usersAccess,$a);
        }
        return view('worker',['users'=>$users,'usersAccess'=>$usersAccess,"layout"=>"showAccess"]);
    }

    public function saveAccess(Request $request,$id){
        $user1=User::find($id);
        //dd($request->choice);
        if($request->choice==[]){
            $user1->access='hello';
        }
        else{
            $user1->access=implode(",",$request->choice);
        }
        
        $user1->save();
        return  redirect('/showAccess');
    }*/


    public function index(){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("index",$allFunctions)){

            $workers=Worker::all();
            return view('worker',['workers'=>$workers,"layout"=>"index"]);
        }
        return redirect()->back();
    }

    public function web(){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("index",$allFunctions)){

            $workers=Worker::where('department', '=',  'ويب')->get();
            return view('worker',['workers'=>$workers,"layout"=>"indexcs"]);
        }
        return redirect()->back();
    }

    public function andriod(){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("index",$allFunctions)){

            $workers=Worker::where('department', '=', 'اندرويد')->get();
            return view('worker',['workers'=>$workers,"layout"=>"indexit"]);
        }
        return redirect()->back();
    }

    public function hr(){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("index",$allFunctions)){

            $workers=Worker::where('department', '=', 'شئون عاملين')->get();
            return view('worker',['workers'=>$workers,"layout"=>"indexhr"]);
        }
        return redirect()->back();
    }

    public function lw(){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("index",$allFunctions)){

            $workers=Worker::where('department', '=', 'شئون قانونية')->get();
            return view('worker',['workers'=>$workers,"layout"=>"indexlw"]);
        }
        return redirect()->back();
    }

    public function create(){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("create",$allFunctions)){

            $workers=Worker::all();
            return view('create');
        }
        return redirect()->back();
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required'],
            'education' => ['required'],
            'graduationDate' => ['required'],
            'workStartDate' => ['required'],
            'mobileNumber' => ['required'],
            'address' => ['required'],
            'email' => ['required'],
            'GPA' => ['required'],
            'workApplyDate' => ['required'],
            'homeTelephone' => ['required'],
            'anotherMobileNumber' => ['required'],
            'nationalID' => ['required'],
            'insuranceID' => ['required'],
            'totalSalary' => ['required'],
            'hourPay' => ['required'],
            'shouldArriveTime' => ['required'],
            'shouldLeaveTime' => ['required'],
            'shouldWorkedDays' => ['required'],
            'shouldWorkedHours' => ['required'],
            'basicSalary' => ['required'],
            'attendanceCompensation' => ['required'],
            'orderCompensation' => ['required'],
            'transportationCompensation' => ['required'],
            'annualVacations' => ['required'],
            'regularVacation' => ['required'],
            'casualVacation' => ['required'],
            'rewards' => ['required'],
            'incentives' => ['required'],
            'overTime' => ['required'],
            'dayAbsencePay' => ['required'],
            'latePay' => ['required'],
            'naughty' => ['required'],
            'insurancePay' => ['required'],
            'taxesPay' => ['required'],
        ]);

        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("create",$allFunctions)){
        
            $worker1=new Worker();
            $worker1->name=request("name");
            if(request("department")=='web'){
                $worker1->department="ويب";
            }
            elseif(request("department")=='andriod'){
                $worker1->department="اندرويد";
            }
            elseif(request("department")=='hr'){
                $worker1->department="شئون عاملين";
            }
            elseif(request("department")=='lw'){
                $worker1->department="شئون قانونية";
            }
            $worker1->education=request("education");
            $worker1->graduationDate=request("graduationDate");
            $worker1->workStartDate=request("workStartDate");
            $worker1->mobileNumber=request("mobileNumber");
            $worker1->address=request("address");
            $worker1->email=request("email");
            $worker1->GPA=request("GPA");
            $worker1->workApplyDate=request("workApplyDate");
            $worker1->homeTelephone =request("homeTelephone");
            $worker1->anotherMobileNumber =request("anotherMobileNumber");
            $worker1->nationalID =request("nationalID");
            $worker1->insuranceID =request("insuranceID");

            $worker1->totalSalary =request("totalSalary");
            
            $worker1->hourPay =request("hourPay");

            $worker1->shouldArriveTime =request("shouldArriveTime");
            $worker1->shouldLeaveTime =request("shouldLeaveTime");
            $worker1->shouldWorkedDays =request("shouldWorkedDays");
            $worker1->shouldWorkedHours =request("shouldWorkedHours");

            $worker1->basicSalary =request("basicSalary");

            $worker1->attendanceCompensation =request("attendanceCompensation");
            $worker1->orderCompensation =request("orderCompensation");
            $worker1->transportationCompensation =request("transportationCompensation");

            $worker1->annualVacations =request("annualVacations");
            $worker1->regularVacation =request("regularVacation");
            $worker1->casualVacation =request("casualVacation");

            $worker1->rewards =request("rewards");
            $worker1->incentives =request("incentives");
            $worker1->overTime =request("overTime");

            $worker1->dayAbsencePay =request("dayAbsencePay");
            $worker1->latePay =request("latePay");
            $worker1->naughty =request("naughty");
            $worker1->insurancePay =request("insurancePay");
            $worker1->taxesPay =request("taxesPay");
            $worker1->save();

            /*///dd($worker1->workStartDate);
            $dDate=$worker1->workStartDate;
            //dd($dDate);
            $dTime=date('H:i:s');
            for($i=0;$i<30;$i++){
                $attend1= new Attendance();
                $attend1->date=$dDate;
                $attend1->arriveTime=$dTime;
                $attend1->leaveTime=$dTime;
                $attend1->save();
                $worker1->attendances()->attach($attend1);
                $dDate=date('Y-m-d', strtotime($dDate. ' + 1 days'));
            }*/

            return redirect('/');
        }
        return redirect()->back();
    }

    public function update(Request $request,$id){
        //dd($id);
        $request->validate([
            'name' => ['required'],
            'education' => ['required'],
            'graduationDate' => ['required'],
            'workStartDate' => ['required'],
            'mobileNumber' => ['required'],
            'address' => ['required'],
            'email' => ['required'],
            'GPA' => ['required'],
            'workApplyDate' => ['required'],
            'homeTelephone' => ['required'],
            'anotherMobileNumber' => ['required'],
            'nationalID' => ['required'],
            'insuranceID' => ['required'],
            'totalSalary' => ['required'],
            'hourPay' => ['required'],
            'shouldArriveTime' => ['required'],
            'shouldLeaveTime' => ['required'],
            'shouldWorkedDays' => ['required'],
            'shouldWorkedHours' => ['required'],
            'basicSalary' => ['required'],
            'attendanceCompensation' => ['required'],
            'orderCompensation' => ['required'],
            'transportationCompensation' => ['required'],
            'annualVacations' => ['required'],
            'regularVacation' => ['required'],
            'casualVacation' => ['required'],
            'rewards' => ['required'],
            'incentives' => ['required'],
            'overTime' => ['required'],
            'dayAbsencePay' => ['required'],
            'latePay' => ['required'],
            'naughty' => ['required'],
            'insurancePay' => ['required'],
            'taxesPay' => ['required'],
            'otherMoney' => ['required'],
            'otherMoneyExplanation'=> ['required'],
        ]);

        //dd($id);

        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }
          
        //dd($allFunctions);

        if(in_array("edit",$allFunctions)){


            $worker1=Worker::find($id);
            $worker1->name=$request->input("name");
            if($request->input("department")=='web'){
                $worker1->department="ويب";
            }
            elseif($request->input("department")=='andriod'){
                $worker1->department="اندرويد";
            }
            elseif($request->input("department")=='hr'){
                $worker1->department="شئون عاملين";
            }
            elseif($request->input("department")=='lw'){
                $worker1->department="شئون قانونية";
            }
            $worker1->education=$request->input("education");
            $worker1->graduationDate=$request->input("graduationDate");
            $worker1->workStartDate=$request->input("workStartDate");
            $worker1->mobileNumber=$request->input("mobileNumber");
            $worker1->address=$request->input("address");
            $worker1->email=$request->input("email");
            $worker1->GPA =$request->input("GPA");
            $worker1->workApplyDate =$request->input("workApplyDate");
            $worker1->homeTelephone =$request->input("homeTelephone");
            $worker1->anotherMobileNumber =$request->input("anotherMobileNumber");
            $worker1->nationalID =$request->input("nationalID");
            $worker1->insuranceID =$request->input("insuranceID");
            $worker1->totalSalary =$request->input("totalSalary");
            $worker1->hourPay =$request->input("hourPay");
            $worker1->shouldArriveTime =$request->input("shouldArriveTime");
            $worker1->shouldLeaveTime =$request->input("shouldLeaveTime");
            $worker1->shouldWorkedDays =$request->input("shouldWorkedDays");
            $worker1->shouldWorkedHours =$request->input("shouldWorkedHours");
            
            $worker1->basicSalary =$request->input("basicSalary");
            $worker1->attendanceCompensation =$request->input("attendanceCompensation");
            $worker1->orderCompensation =$request->input("orderCompensation");
            $worker1->transportationCompensation =$request->input("transportationCompensation");
            $worker1->annualVacations =$request->input("annualVacations");
            $worker1->regularVacation =$request->input("regularVacation");
            $worker1->casualVacation =$request->input("casualVacation");
            $worker1->rewards =$request->input("rewards");
            $worker1->incentives =$request->input("incentives");
            $worker1->overTime =$request->input("overTime");
            $worker1->dayAbsencePay =$request->input("dayAbsencePay");
            $worker1->latePay =$request->input("latePay");
            $worker1->naughty =$request->input("naughty");
            $worker1->insurancePay =$request->input("insurancePay");
            $worker1->taxesPay =$request->input("taxesPay");
            $worker1->otherMoney =$request->input("otherMoney");
            $worker1->otherMoneyExplanation =$request->input("otherMoneyExplanation");
            $worker1->save();
            return redirect('/');
        }
        return redirect()->back();

    }

    public function show($id){

        
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("show",$allFunctions)){
            $worker=Worker::find($id);
            $workers=Worker::all();
            return view('workerDetails',["workers"=>$workers,"worker"=>$worker,"layout"=>"show"]);
        }

        return redirect()->back();
    }

    public function salaryDetails($id){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("salaryDetails",$allFunctions)){

            $worker=Worker::find($id);
            $workers=Worker::all();
            return view('workerDetails',["workers"=>$workers,"worker"=>$worker,"layout"=>"salaryDetails"]);
        }
        return redirect()->back();
    }

    public function edit($id){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("edit",$allFunctions)){

            $worker=Worker::find($id);
            $workers=Worker::all();
            return view('worker',["workers"=>$workers,"worker"=>$worker,"layout"=>"edit"]);
        }
        return redirect()->back();
    }

    public function delete($id){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("delete",$allFunctions)){

            $worker = Worker::find($id);
            $worker->delete() ;
            //$worker->delete=1;
            //$worker->save();
            return redirect('/') ;
        }
        return redirect()->back();
    }
    
    public function search(Request $request){
        $roles=Auth::user()->roles;
        $allFunctions=array();
        foreach($roles as $role){
            $permissions=$role->permissions;
            foreach($permissions as $permission){
                $permissionFunctions=$permission->functions;
                $functions=explode(",",$permissionFunctions);
                foreach($functions as $function){
                    array_push($allFunctions,$function);
                }
            }
            
        }

        if(in_array("search",$allFunctions)){

            $workers=Worker::all();
            $workerName=$request->input("workerName");
            $worker=Worker::where("name",$workerName)->first();
            if($worker ==null){
                return redirect('/');
            }
            return view('workerDetails',["workers"=>$workers,"worker"=>$worker,"layout"=>"show"]);
        }
        return redirect()->back();
    }

    public function toStatistics(){

        return view('worker',['layout'=>'toStatistics']);

    }

    public function statisticsDetails(Request $request){
        $request->validate([
            'fromDate' => ['required'],
            'toDate' => ['required'],
        ]);

        $workers=Worker::all();
        $fromDate=new Carbon(request('fromDate'));
        $toDate=new Carbon(request('toDate'));
        //dd($fromDate,$toDate);
        
        $information=array();
        foreach($workers as $worker){
            $workerAttendances=$worker->attendances;
            //dd($workerAttendances);
            $workerName=$worker->name;
            $workerDepartment=$worker->department;
            $workerAttendedDays=0;
            $workerAbsentedDays=0;
            $workerLatedHours=0;
            $workerAttendedHours=0;
            //$founded=0;
            foreach($workerAttendances as $attendance){
                $attendanceDate=new Carbon($attendance->date);
                //dd($attendanceDate,$fromDate,$toDate);
                if($attendanceDate >= $fromDate && $attendanceDate <= $toDate){
                    //$founded++;
                    $workerAttendedDays++;
                    
                    $workerAttendedHours += $attendance->hoursWorked;
                }
                
            }
            $workerAbsentedDays=$worker->shouldWorkedDays - $workerAttendedDays;
            $workerLatedHours=$worker->shouldWorkedHours - $workerAttendedHours;
            //dd($workerAttendedDays,$workerAbsentedDays,$workerAttendedHours,$workerLatedHours);
            array_push($information, ['name'=>$worker->name,'department'=>$worker->department,'daysAttended'=>$workerAttendedDays,'daysAbsented'=>$workerAbsentedDays,'lateHours'=>$workerLatedHours]);
        }
        //dd($information);
        return view('worker',['toDate'=>$toDate->toDateString(),'fromDate'=>$fromDate->toDateString(),'information'=>$information,'layout'=>'statisticsInformation']);
    }

}
