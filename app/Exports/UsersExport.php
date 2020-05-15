<?php

namespace App\Exports;
use DB;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  $data = DB::table('leave')
        ->select("users.id" ,DB::raw("CONCAT(prefix, ' ', users.name,' ',lastname) "), "position.name as 1", 
        "department.name as 2",
        DB::raw('sum(CASE WHEN vacation = "ลาป่วย" THEN alltime ELSE 0 END) AS vacation1 '),
        DB::raw('sum(CASE WHEN vacation = "ลากิจ" THEN alltime ELSE 0 END) AS vacation2 '),
        DB::raw('sum(CASE WHEN vacation = "อื่นๆ" THEN alltime ELSE 0 END) AS vacation3 '),
        DB::raw('sum(alltime)'),)
        ->leftjoin('users',"users.id","=","leave.U_id")
        ->leftjoin('department',"department.id","=","users.department")
        ->leftjoin('position',"position.id","=","users.position")
        ->where('leave.status',"=","อนุมัติการลา")
        ->groupBy(['U_id',])
        ->get();
    }
    public function headings(): array
    {
        return [
            'รหัสพนักงาน',
            'ชื่อพนักงาน',
            'ตำแหน่ง',
            'ฝ่าย/แผนก',
            'ลาป่วย',
            'ลากิจ',
            'อื่นๆ',
            'รวมลาทั้งหมด'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

}
