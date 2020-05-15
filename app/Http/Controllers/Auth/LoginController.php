<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function redirectTo()
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
        return '/home';
    }
}
}
