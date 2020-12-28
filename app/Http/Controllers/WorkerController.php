<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
use Auth;
use PDF;

require_once '../vendor/autoload.php';

use App\Exports\WorkersExport;
use Maatwebsite\Excel\Facades\Excel;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\Style\TablePosition;

class WorkerController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /*public function jsonRegGet(){
        return view('json');
    }

    public function jsonRegPost(Request $request){
        $user=new User();
        $user->name=$request->input("name");
        $user->email=$request->input("email");
        $user->password=$request->input("password");
        $user->roles=$request->input("roles");
        $user->save();
    }*/


    public function excel() {
        return Excel::download(new WorkersExport, 'workers.xlsx');
    }

    public function word(){
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

    public function pdf(){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html2());
        return $pdf->stream();
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
                    ' .$worker->workDays .'
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

    /*public function convert_customer_data_to_html(){
        $workers=Worker::all();
        $output='
                <html lang="ar">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
                        
                        .divTableCell,
                        .divTableHead {
                            border: 1px solid #999999;
                            display: table-cell;
                            padding: 3px 10px;
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
                    </style>
                </head>
                <body dir="rtl" style="direction: rtl">
                <p >قائمة العاملين</p>
                <p >تجد هنا كل المعلومات المفصلة عن العاملين في شركة الباز للبرمجيات</p>
                <div class="control-body">
                <table class="description ">
                    <thead dir="rtl" style="direction: rtl">
                        <tr class="bb">
                            <th >أيام العمل</th>
                            <th >الإيميل</th>
                            <th >العنوان</th>
                            <th class="bb">الموبيل</th>
                            <th >تاريخ بدء العمل</th>
                            <th >المؤهل</th>
                            <th class="bb">الإسم</th>
                        </tr>
                    </thead>
                    <tbody>
        ';
        foreach($workers as $worker){
            $output .='
                    <tr>
                        <td >' .$worker->workDays .'</td>
                        <td >' .$worker->email .'</td>
                        <td >' .$worker->address .'</td>
                        <td class="aa">' .$worker->mobileNumber .'</td>
                        <td >' .$worker->workStartDate .'</td>
                        <td >' .$worker->education .'</td>
                        <td >' .$worker->name .'</td>
                    </tr>
            ';
        }
        $output.='
                </tbody>
            </table>
            </div>
            </body>
            </html>
            ';
        return $output;
    }*/

    public function dashboard(){
        $workers=Worker::all();
        return view('worker',['workers'=>$workers,"layout"=>"dashboard"]);
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
    }
*/

    public function index(){

        $workers=Worker::all();
        return view('worker',['workers'=>$workers,"layout"=>"index"]);
    }

    public function cs(){
        $workers=Worker::where('education', '=',  'علوم الحاسب')->get();
        return view('worker',['workers'=>$workers,"layout"=>"indexcs"]);
    }
    public function it(){
        $workers=Worker::where('education', '=', 'شبكات')->get();
        return view('worker',['workers'=>$workers,"layout"=>"indexit"]);
    }
    public function hr(){
        $workers=Worker::where('education', '=', 'شئون عاملين')->get();
        return view('worker',['workers'=>$workers,"layout"=>"indexhr"]);
    }

    public function create(){
        if(in_array("add",explode(",",Auth::user()->access))){

            $workers=Worker::all();
            return view('create');
        }
        else{
            return redirect()->back();
        }
    }

    public function store(){
        $worker1=new Worker();
        $worker1->name=request("name");
        if(request("education")=='cs'){
            $worker1->education="علوم الحاسب";
        }
        elseif(request("education")=='it'){
            $worker1->education="شبكات";
        }
        elseif(request("education")=='hr'){
            $worker1->education="شئون عاملين";
        }
        $worker1->graduationDate=request("graduationDate");
        $worker1->workStartDate=request("workStartDate");
        $worker1->mobileNumber=request("mobileNumber");
        $worker1->address=request("address");
        $worker1->email=request("email");
        $worker1->workDays=request("workDays");
        $worker1->GPA=request("GPA");
        $worker1->workApplyDate =request("workApplyDate");
        $worker1->homeTelephone =request("homeTelephone");
        $worker1->mobileNumber2 =request("mobileNumber2");
        $worker1->nationalID =request("nationalID");
        $worker1->insuranceID =request("insuranceID");
        $worker1->monthWorkedDays =request("monthWorkedDays");
        $worker1->monthWorkedHours =request("monthWorkedHours");
        $worker1->totalSalary =request("totalSalary");
        $worker1->dayPaid =request("dayPaid");
        $worker1->hourPaid =request("hourPaid");
        $worker1->monthlyShouldWorkedHours =request("monthlyShouldWorkedHours");
        $worker1->attendanceTime =request("attendanceTime");
        $worker1->leaveTime =request("leaveTime");
        $worker1->lateTime =request("lateTime");
        $worker1->daysAttended =request("daysAttended");
        $worker1->daysAbsented =request("daysAbsented");
        $worker1->daysLated =request("daysLated");
        $worker1->basicSalary =request("basicSalary");
        $worker1->attendanceCompensation =request("attendanceCompensation");
        $worker1->orderCompensation =request("orderCompensation");
        $worker1->transportationCompensation =request("transportationCompensation");
        $worker1->rewards =request("rewards");
        $worker1->incentives =request("incentives");
        $worker1->overTime =request("overTime");
        $worker1->dayAbsencePay =request("dayAbsencePay");
        $worker1->dayLatePay =request("dayLatePay");
        $worker1->naughtyPay =request("naughtyPay");
        $worker1->insurancePay =request("insurancePay");
        $worker1->taxesPay =request("taxesPay");
        $worker1->otherPays =request("otherPays");
        $worker1->save();
        return redirect('/');
    }

    public function update(Request $request,$id){
        if(in_array("edit",explode(",",Auth::user()->access))){
            $worker1=Worker::find($id);
            $worker1->name=$request->input("name");
            if($request->input("education")=='cs'){
                $worker1->education="علوم الحاسب";
            }
            elseif($request->input("education")=='it'){
                $worker1->education="شبكات";
            }
            elseif($request->input("education")=='hr'){
                $worker1->education="شئون عاملين";
            }
            $worker1->graduationDate=$request->input("graduationDate");
            $worker1->workStartDate=$request->input("workStartDate");
            $worker1->mobileNumber=$request->input("mobileNumber");
            $worker1->address=$request->input("address");
            $worker1->email=$request->input("email");
            $worker1->workDays=$request->input("workDays");
            $worker1->GPA =$request->input("GPA");
            $worker1->workApplyDate =$request->input("workApplyDate");
            $worker1->homeTelephone =$request->input("homeTelephone");
            $worker1->mobileNumber2 =$request->input("mobileNumber2");
            $worker1->nationalID =$request->input("nationalID");
            $worker1->insuranceID =$request->input("insuranceID");
            $worker1->monthWorkedDays =$request->input("monthWorkedDays");
            $worker1->monthWorkedHours =$request->input("monthWorkedHours");
            $worker1->totalSalary =$request->input("totalSalary");
            $worker1->dayPaid =$request->input("dayPaid");
            $worker1->hourPaid =$request->input("hourPaid");
            $worker1->monthlyShouldWorkedHours =$request->input("monthlyShouldWorkedHours");
            $worker1->attendanceTime =$request->input("attendanceTime");
            $worker1->leaveTime =$request->input("leaveTime");
            $worker1->lateTime =$request->input("lateTime");
            $worker1->daysAttended =$request->input("daysAttended");
            $worker1->daysAbsented =$request->input("daysAbsented");
            $worker1->daysLated =$request->input("daysLated");
            $worker1->basicSalary =$request->input("basicSalary");
            $worker1->attendanceCompensation =$request->input("attendanceCompensation");
            $worker1->orderCompensation =$request->input("orderCompensation");
            $worker1->transportationCompensation =$request->input("transportationCompensation");
            $worker1->rewards =$request->input("rewards");
            $worker1->incentives =$request->input("incentives");
            $worker1->overTime =$request->input("overTime");
            $worker1->dayAbsencePay =$request->input("dayAbsencePay");
            $worker1->dayLatePay =$request->input("dayLatePay");
            $worker1->naughtyPay =$request->input("naughtyPay");
            $worker1->insurancePay =$request->input("insurancePay");
            $worker1->taxesPay =$request->input("taxesPay");
            $worker1->otherPays =$request->input("otherPays");
            $worker1->save();
            return redirect('/');
        }
        else{
            return redirect()->back();
        }

    }

    public function show($id){
        $worker=Worker::find($id);
        $workers=Worker::all();
        return view('workerDetails',["workers"=>$workers,"worker"=>$worker,"layout"=>"show"]);

    }

    public function salaryDetails($id){
            $worker=Worker::find($id);
            $workers=Worker::all();
            return view('workerDetails',["workers"=>$workers,"worker"=>$worker,"layout"=>"salaryDetails"]);
    }

    public function edit($id){
        if(in_array("edit",explode(",",Auth::user()->access))){
            $worker=Worker::find($id);
            $workers=Worker::all();
            return view('worker',["workers"=>$workers,"worker"=>$worker,"layout"=>"edit"]);
        }
        else{
            return redirect()->back();
        }
    }

    public function delete($id){
        if(in_array("remove",explode(",",Auth::user()->access))){
            $worker = Worker::find($id);
            //$worker->delete() ;
            $worker->delete=1;
            $worker->save();
            return redirect('/') ;
        }
        else{
            return redirect()->back();
        }
    }
    
    public function search(Request $request){
        $workers=Worker::all();
        $workerName=$request->input("workerName");
        $worker=Worker::where("name",$workerName)->first();
        return view('workerDetails',["workers"=>$workers,"worker"=>$worker,"layout"=>"show"]);
    }

}
