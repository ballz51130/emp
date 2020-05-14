@extends('layouts.app')

@section('content')

<div class="container">
  <h3 class="text-center">ข้อมูลการลา</h3>
  <div class="clearfix mb-2">
    <div class="float-left">
        </div>
   <a href="{{ url('/leave/create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i>เขียนใบลา</a>


</div>
{{Auth::user()->prefix}} {{Auth::user()->name}} {{Auth::user()->lastname}}

  <table class="table table-striped">
  <thead class="text-center">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">วันที่เขียน</th>
      <th scope="col">หัวข้อ</th>
      <th scope="col">การลา</th>
      <th scope="col">สาเหตุการลา</th>
      <th scope="col">ตั้งแต่วันที่</th>
      <th scope="col">ถึงวันที่</th>
      <th scope="col">เป็นจำนวน</th>
      <th scope="col">สถานะ</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach( $data as $key => $value )
  
    <tr>
      <th class="text-center">{{$loop->iteration }}</th>
      <th class="text-center">{{ date('d-M-Y ', strtotime($value->date)) }}</th>
      <td class="text-center">{{ $value->title }}</td>
      <td class="text-center">{{ $value->vacation }}</td>
      <td class="text-center">{{ $value->detail }}</td>
      <td class="text-center">{{ date('d-M-Y ', strtotime($value->indate)) }}</td>
      <td class="text-center">{{ date('d-M-Y ', strtotime($value->todate)) }}</td>
      <td class="text-center">{{ $value->alltime}} วัน</td>
      <td class="text-center">{{ $value->status}}</td>
      <td class="text-center">
      
      </td>
    </tr>
    @endforeach
  </tbody>

</table>
</div>
@endsection
