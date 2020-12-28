<?php

namespace App\Exports;

use App\Models\Worker;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WorkersExport implements FromCollection, WithEvents, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return Worker::all();
    }

    public function registerEvents(): array{
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }

    public function headings(): array{
        return [
            'الرقم',
            'الإسم',
            'المؤهل',
            'تاريخ التخرج',
            'تاريخ بدء العمل',
            'رقم الموبيل',
            'العنوان',
            'الايميل',
            'ايام العمل',
            'التقدير',
            'تاريخ التقدم للعمل',
            'تليفون المنزل',
            'رقم الموبيل 2',
            'الرقم القومي',
            'الرقم التأميني',
            'ايام عمله فالشهر',
            'ساعات عمله فالشهر',
            'المرتب كاملا',
            'مرتب اليوم',
            'مرتب الساعة',
            'ساعات العمل الواجبة شهريا',
            'وقت الحضور',
            'وقت الانصراف',
            'وقت التأخير',
            'ايام حضوره',
            'ايام غيابه',
            'ايام تأخيره',
            'المرتب الاساسي',
            'بدل حضور',
            'بدل انتظام',
            'بدل مواصلات',
            'مكافئات',
            'حوافز',
            'وقت اضافي',
            'خصم يوم الغياب',
            'خصم يوم التأخير',
            'خصم العقاب',
            'خصم التأمين',
            'خصم الضرائب',
            'خصومان اخرى',
        ];
    }

    public function map($worker): array{
        return [
            $worker->id,
            $worker->name,
            $worker->education,
            $worker->graduationDate,
            $worker->workStartDate,
            $worker->mobileNumber,
            $worker->address,
            $worker->email,
            $worker->workDays,
            $worker->GPA,
            $worker->workApplyDate,
            $worker->homeTelephone,
            $worker->mobileNumber2,
            $worker->nationalID,
            $worker->insuranceID,
            $worker->monthWorkedDays ,
            $worker->monthWorkedHours,
            $worker->totalSalary,
            $worker->dayPaid,
            $worker->hourPaid,
            $worker->monthlyShouldWorkedHours,
            $worker->attendanceTime,
            $worker->leaveTime,
            $worker->lateTime,
            $worker->daysAttended ,
            $worker->daysAbsented,
            $worker->daysLated,
            $worker->basicSalary,
            $worker->attendanceCompensation,
            $worker->orderCompensation,
            $worker->transportationCompensation,
            $worker->rewards,
            $worker->incentives,
            $worker->overTime,
            $worker->dayAbsencePay,
            $worker->dayLatePay ,
            $worker->naughtyPay ,
            $worker->insurancePay ,
            $worker->taxesPay,
            $worker->otherPays,
        ];
    }

}
