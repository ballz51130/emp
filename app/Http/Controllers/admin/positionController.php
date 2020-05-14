<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\positionModel AS PM;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class positionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $cValidator = [
        'name' => 'required|min:3|max:255',
      ];
    
      protected $cValidatorMsg = [
        'name.required' => 'กรุณากรอกตำแหน่งงาน',
        'name.min' => 'ตำแหน่งงานต้องมีอย่างน้อย 3 ตัวอักษร',
        'name.max' => 'ตำแหน่งงานต้องมีไม่เกิน 255 ตัวอักษร',
      ];
    public function index()
    {
        //
        $data = PM::get();
        return view('admin/manageposition')->with( ["data"=>$data] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/forms.formposition');
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
        $validator = Validator::make( $request->all(), $this->cValidator, $this->cValidatorMsg);
        if( $validator->fails() ){
            return back()->withInput()->withErrors( $validator->errors() );
          }
          else{
          $data = new PM;
          $data->fill([
            "name" =>$request->name,
          ]);
          $data->save();
          return redirect()->route('manageposition.store')->with('jsAlert', 'เพิ่มข้อมูลสำเร็จ');
        }
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
        $data = PM::findOrFail( $id );
        if( is_null($data) ){
          return back()->with('jsAlert', "ไม่พบข้อมูลที่ต้องการแก้ไข");
      }
      return view('admin/forms.formposition')->with(['data'=>$data]);
      
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
        $data = PM::findOrFail( $id );
        if( is_null($data) ){
          return back()->with('jsAlert', "ไม่พบข้อมูลที่ต้องการแก้ไข");
              }
              $data->fill([
                "name" =>$request->name,
              ]);
        
                $data->update();
                return redirect()->route('manageposition.store')->with('jsAlert', 'แก้ไขข้อมูลสำเร็จ');
              
          }
    }
    public function delete($id)
    {
        //
        $data = PM::findOrFail($id);
      if( is_null($data) ){
        return back()->with('jsAlert', "ไม่พบข้อมูลที่ต้องการแก้ไข");
    }
    $data->delete();
    return back()->with('jsAlert', "ลบข้อมูลสำเร็จ");
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
