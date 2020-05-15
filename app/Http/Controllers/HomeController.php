<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    if(auth()->user()->isAdmin()) {
        $data = DB::table('leave')
        ->select("*","leave.id as id","users.name as username","department.name as departmentname","position.name as positionname",)
        ->leftjoin('users',"users.id","=","leave.U_id")
        ->leftjoin('department',"department.id","=","users.department")
        ->leftjoin('position',"position.id","=","users.position")
        ->where('status',"=",'รออนุมัติ')
        ->get();
        return view('admin/mainadmin')->with( ["data"=>$data] );
        
    } else {
        return view('user/mainuser');
    }
}
}
