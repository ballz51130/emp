<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userModel AS UM;
use DB ;
use auth ;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $cValidator = [
        'name' => 'required|min:3|max:255',
        'lastname' => 'required|min:3|max:255',
        'prefix' => 'required|min:2',
      ];
    
      protected $cValidatorMsg = [
        'prefix.required' => 'กรุณาเลือกคำนำหน้าชื่อ',
        'name.required' => 'กรุณากรอกชื่อ',
        'name.min' => 'ชื่อต้องมีอย่างน้อย 3 ตัวอักษร',
        'name.max' => 'ชื่อต้องมีไม่เกิน 255 ตัวอักษร',
        'lastname.required' => 'กรุณากรอกนามสกุล',
        'lastname.min' => 'นามสกุลต้องมีอย่างน้อย 3 ตัวอักษร',
        'lastname.max' => 'นามสกุลต้องมีไม่เกิน 255 ตัวอักษร',
        'position.required' => 'กรุณาเลือกตำแหน่งงาน',
        'department.required' => 'กรุณาเลือกฝ่าย /แผนก',
      ];
    public function index()
    {
        //
        $data = DB::table('users')
        ->select("*","users.id as id","users.name as username","department.name as departmentname","position.name as positionname",)
        ->leftjoin('department',"department.id","=","users.department")
        ->leftjoin('position',"position.id","=","users.position")
        ->where('users.id',auth::user()->id)
        ->get();
        return view('user/forms.formprofile')->with( ["data"=>$data] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make( $request->all(), $this->cValidator, $this->cValidatorMsg);
        if( $validator->fails() ){
              return back()->withInput()->withErrors( $validator->errors() );
          }
          else{
        $data = UM::findOrFail( $id );
        if( is_null($data) ){
          return back()->with('jsAlert', "ไม่พบข้อมูลที่ต้องการแก้ไข");
              }
              $data->fill([
                "name" =>$request->name,
                "email" =>$request->email,
                "lastname" =>$request->lastname,
                "prefix" =>$request->prefix,
                "type"=>0,
              ]);
             if( $data->update()) {
              if( $request->has('profile') ){
      
                if( !empty($data->profile) ){
                  storage::disk('public')->delete( $data->profile );
                }
                $data->profile = $request->file('profile')->store('photo','public');
                $data->update();
              }
            }
                return back()->with('jsAlert', 'แก้ไขข้อมูลสำเร็จ');  
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
