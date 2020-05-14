<?php

namespace App\Http\Controllers\user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB ;
use App\Models\leavemodel AS LM;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class leaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $cValidator = [
        'address' => 'required|min:10|max:255',
        'date' => 'required',
        'dear' => 'required',
        'title' => 'required|min:3|max:255',
        'vacation' => 'required',
        'detail' => 'required|min:5',
        'indate' => 'required',
        'todate' => 'required',
        'alltime' => 'required',
        'contacted' => 'required',

      ];
    
      protected $cValidatorMsg = [
        'address.required' => 'กรุณากรอกที่อยู่',
        'address.min' => 'ที่อยู่ต้อมมีมากกว่า 10 ตัวอักษร',
        'address.max' => 'ที่อยู่ต้องน้อยกว่า 255 ตัวอักษร',
        'date.required' => 'กรุณาเลือกวันที่เขียน',
        'dear.required' => 'กรุณากรอกชื่อผู้รับเรื่อง',
        'title.required' => 'กรุณาเขียนหัวข้อการลา',
        'title.min' => 'หัวข้อการลาต้องมี่มากกว่า 3 ตัวอักษร',
        'title.max' => 'หัวข้อการลาต้องไม่เกิน 255 ตัวอักษร',
        'vacation.required' => 'กรุณาเลือกหัวข้อการลา',
        'detail.required' => 'กรุณากรอกช่องรายระเอียดการลา',
        'detail.min' => 'รายระเอียดการลาต้องมีมากกว่า 3 ตัวอักษร',
        'indate.required' => 'กรุณาเลือกวันที่ต้องการลา',
        'todate.required' => 'กรุณาเลือกถึงวันที่ต้องการลา',
        'alltime.required' => 'กรุณากรอกจำนวนวันทั่งหมดที่ลา',
        'contacted.required' => 'กรุณากรอก ช่องทางการติดต่อ',
        
        
      ];
    public function index()
    {
        //
        $data = DB::table('leave')
        ->select("*","users.id as id","users.name as username","department.name as departmentname","position.name as positionname",)
        ->leftjoin('users',"users.id","=","leave.U_id")
        ->leftjoin('department',"department.id","=","users.department")
        ->leftjoin('position',"position.id","=","users.position")
        ->where('users.id',auth::user()->id)
        ->get();
        return view('user/leave')->with( ["data"=>$data] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = DB::table('users')
        ->select("*","users.id as id","users.name as username","department.name as departmentname","position.name as positionname",)
        ->leftjoin('department',"department.id","=","users.department")
        ->leftjoin('position',"position.id","=","users.position")
        ->leftjoin('leave',"leave.U_id","=","users.id")
        ->where('users.id',auth::user()->id)
        ->limit(1)
        ->get();
        return view('user/forms.formleave')->with( ["data"=>$data] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
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
          $data = new LM;
          $data->fill([
            "address" =>$request->address,
            "date" =>$request->date,
            "dear" => $request->dear,
            "U_id" =>$request->U_id,
            "title" =>$request->title,
            "vacation"=>$request->vacation,
            "etc" =>$request->etc,
            "detail" =>$request->detail,
            "indate" =>$request->indate,
            "todate" =>$request->todate,
            "alltime" =>$request->alltime,
            "contacted" =>$request->contacted,
            "status"=>'รออนุมัติ',
          ]);
          if($data->save()){
            if($request->has('image') ){
              $data->image = $request->file('image')->store('leave','public');
              $data->update();
            }
          }
          return redirect()->to('/leave')->with('jsAlert', 'เพิ่มข้อมูลสำเร็จ');
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
