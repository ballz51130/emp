<?php

namespace App\Http\Controllers\admin;
use PDF;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PDFController extends Controller
{
    function index()
    {
        $customer_data = DB::table('leave')
        ->select("users.id as userid" ,"users.prefix","users.name as username","lastname" , "position.name AS position" , 
        "department.name as department", "leave.vacation" ,"leave.indate" ,"leave.todate", 
        DB::raw('sum(alltime) as alltimes'), 
        DB::raw('sum(CASE WHEN vacation = "ลาป่วย" THEN alltime ELSE 0 END) AS vacation1 '),
        DB::raw('sum(CASE WHEN vacation = "ลากิจ" THEN alltime ELSE 0 END) AS vacation2 '),
        DB::raw('sum(CASE WHEN vacation = "อื่นๆ" THEN alltime ELSE 0 END) AS vacation3 '),)
        ->leftjoin('users',"users.id","=","leave.U_id")
        ->leftjoin('department',"department.id","=","users.department")
        ->leftjoin('position',"position.id","=","users.position")
        ->where('leave.status',"=","อนุมัติการลา")
        ->groupBy(['U_id',])
        ->get();
     return view('admin\export')->with(['customer_data'=> $customer_data]);
     
    }
    function pdf()
    {
        $customer_data = DB::table('leave')
        ->select("users.id as userid" ,"users.prefix","users.name as username","lastname" , "position.name AS position" , 
        "department.name as department", "leave.vacation" ,"leave.indate" ,"leave.todate", 
        DB::raw('sum(alltime) as alltimes'), 
        DB::raw('sum(CASE WHEN vacation = "ลาป่วย" THEN alltime ELSE 0 END) AS vacation1 '),
        DB::raw('sum(CASE WHEN vacation = "ลากิจ" THEN alltime ELSE 0 END) AS vacation2 '),
        DB::raw('sum(CASE WHEN vacation = "อื่นๆ" THEN alltime ELSE 0 END) AS vacation3 '),)
        ->leftjoin('users',"users.id","=","leave.U_id")
        ->leftjoin('department',"department.id","=","users.department")
        ->leftjoin('position',"position.id","=","users.position")
        ->where('leave.status',"=","อนุมัติการลา")
        ->groupBy(['U_id',])
        ->get();
     $pdf = PDF::loadView('pdf',['customer_data'=>$customer_data]);
     return @$pdf->stream();
    }

}
