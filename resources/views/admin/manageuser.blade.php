@extends('layouts.app')

@section('content')

<div class="container">
  <h3 class="text-center">จัดการข้อมูลสมาชิก</h3>
  <div class="clearfix mb-2">
    <div class="float-left">
           <form method="GET" class="form-inline">
               <div class="form-group">
                   <label for="search" class="sr-only">Search</label>
                   <input type="text" class="form-control" id="search" name="search" placeholder="ค้นหา ชื่อสมาชิก" value="{{ !empty($_GET['search']) ? $_GET['search'] : '' }}">
</div>
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>
            </form>
        </div>
   <a href="{{ url('admin/manageuser/create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> เพิ่มข้อมูลลูกค้า</a>


</div>
  <table class="table table-striped">
  <thead class="text-center">
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">รูป</th>
      <th scope="col">ชื่อ-สกุล</th>
      <th scope="col">ตำแหน่งงาน</th>
      <th scope="col">ฝ่าย/แผนก</th>
      <th scope="col">จัดการ</th>
    </tr>
  </thead>
  <tbody>

     @foreach( $data as $key => $value )
    <tr>
      <th class="text-center">{{$loop->iteration }}</th>
      <td class="text-center">
      @if(!empty($value->profile))
            <div class="text-center">
            <img src="{{asset('storage/'.$value->profile)}}" width="80px" height="80px">
            </div>
            @else
            <div class="text-center">
            <img src="{{asset('storage/photos/Noimg.jpg')}}" width="80px" height="80px">
            @endif 
      </td>
      <td class="text-center">{{ $value->username }} {{ $value->lastname }}</td>
      <td class="text-center">{{ $value->positionname }}</td>
      <td class="text-center">{{ $value->departmentname }}</td>
      <td class="text-center">
      <a href="{{ action('admin\ManageUserController@edit', $value->id) }}"class="btn btn-secondary">แก้ไข</a>
      <a href="{{ action('admin\ManageUserController@delete', $value->id) }}" onclick="return confirm('ลบ ?')" class="btn btn-danger"><i class="fa fa-trash"></i> ลบ</a>
      
      </td>
    </tr>
    @endforeach
  </tbody>

</table>
</div>
@endsection
