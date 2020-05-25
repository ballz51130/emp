<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userModel AS UM;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class changepasswordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $cValidator = [
        'password' => 'required|min:5',
        'confpassword' => 'required|same:password',
      ];
    
      protected $cValidatorMsg = [
        'password.required' => 'กรุณากรอกรหัสผ่าน',
        'password.min' => 'รหัสผ่านต้องมีอย่างน้อย 5 ตัวอักษร',
        'confpassword.required' => 'กรุณายืนยันรหัสผ่าน',
        'confpassword.same' => 'รหัสผ่านไม่ตรงกัน',

      ];
    public function index()
    {
        //
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
        $data = UM::findOrFail( $id );
        if( is_null($data) ){
          return back()->with('jsAlert', "ไม่พบข้อมูลที่ต้องการแก้ไข");
      }
        return view('admin/forms.formchange')->with( ["data"=>$data] );
     
     
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
                "password" => Hash::make($request->password),
              ]);
                $data->update();
              }
              return redirect()->route('manageuser.store')->with('jsAlert', 'แก้ไขรหัสผ่านสำเร็จ');
              
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
