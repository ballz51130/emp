@extends('layouts.app')

@section('content')

<div class="container">
  <h3 class="text-center">จัดการข้อมูลพนักงาน</h3>
  <div class="clearfix mb-2">
    <div class="float-left">
           <!-- <form method="GET" class="form-inline">
               <div class="form-group">
                   <label for="search" class="sr-only">Search</label>
                   <input type="text" class="form-control" id="search" name="search" placeholder="ค้นหา ชื่อสมาชิก" value="{{ !empty($_GET['search']) ? $_GET['search'] : '' }}">
</div>
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>
            </form> -->
        </div>
   <a href="{{ url('admin/manageposition/create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> เพิ่มข้อมูลพนักงาน</a>
</div>
  <table class="table table-striped">
  <thead class="text-center">
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">ตำแหน่งงาน</th>
      <th scope="col">จัดการ</th>
    </tr>
  </thead>
  <tbody>
     @foreach( $data as $key => $value )
    <tr>
      <th class="text-center">{{$loop->iteration }}</th>
      <td class="text-center">{{ $value->name}}</td>
      <td class="text-center">
      <a href="{{ action('admin\positionController@edit', $value->id) }}"class="btn btn-secondary">แก้ไข</a>
      <a href="{{ action('admin\positionController@delete', $value->id) }}" onclick="return confirm('ลบ ?')" class="btn btn-danger"><i class="fa fa-trash"></i> ลบ</a>
      
      </td>
    </tr>
    @endforeach
  </tbody>

</table>
</div>
@endsection
