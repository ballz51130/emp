@extends('layouts.app')

@section('content')

<div class="container">
    <h3 class="text-center">รายการลา</h3>
    <div class="clearfix mb-2">
    </div>
    <table class="table table-striped">
    
        <thead class="text-center">
            <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">ชื่อ-สกุล</th>
                <th scope="col">เรื่อง</th>
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
                <td class="text-center">{{$value->prefix}} {{$value->username}} {{$value->lastname}}</td>
                <td class="text-center">{{$value->title}}</td>
                <td class="text-center">{{$value->vacation}}</td>
                <td class="text-center">{{$value->detail}}</td>
                <td class="text-center">{{ date('d-M-Y', strtotime($value->indate)) }}</td>
                <td class="text-center">{{ date('d-M-Y', strtotime($value->todate)) }}</td>
                <td class="text-center">{{$value->alltime}} วัน</td>
                <td class="text-center">{{$value->status}}</td>
                <td class="text-center">
                <a href="{{ action('admin\adminController@edit', $value->id, $value->U_id) }}" class="btn btn-secondary">ตรวจสอบ</a>
                </td>
            </tr>
        </tbody>
@endforeach
    </table>
</div>
@endsection
