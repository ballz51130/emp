@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายละเอียดการลา</div>
                @csrf
                @foreach( $data as $key => $value)
                <div class="card-body">
                    <div class="controls">
                        <div class="row" style="margin-top:7px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">เขียนที่ *</label>
                                    <input id="address" type="address" class="form-control" name="address"
                                        value="{{$value->address}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">วันที่ *</label>
                                    <input id="date" type="date" class="form-control" name="date"
                                        value="{{$value->date}}">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:7px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_email">เรี่องขอลา *</label>
                                    <input type="text" name="title" class="form-control" value="{{$value->title}}">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:7px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email">เรียน *</label>
                                    <input type="text" name="dear" class="form-control" value="{{$value->dear}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_need"></label>
                                    <span
                                        style="margin-top:35px; position:absolute;">(ผู้บริหารฝ่ายบุคคลและบัญชี)</span>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:7px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">ข้าพเจ้า *</label>
                                    <input type="text" class="form-control" name="etc"
                                        value="{{ $value->prefix}} {{$value->username}} {{$value->lastname}}">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">พนักงานประจำตำแหน่ง *</label>
                                    <input type="text" class="form-control" name="etc"
                                        value="{{ $value->positionname }}">

                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:7px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">ฝ่าย/แผนก *</label>
                                    <input type="text" class="form-control" name="etc"
                                        value="{{ $value->departmentname }}">

                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:7px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5> <label for="date">มีความประสงค์ที่จะ </label> </h5>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:7px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">การลา*</label>
                                    <input type="text" class="form-control" name="etc"
                                        value="{{$value->vacation}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">อื่นๆ *</label>
                                    <input type="text" class="form-control" name="etc"
                                        value="{{ !empty($data->etc) ? $data->etc: old('etc') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:7px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">เนื่องจาก *</label>
                                    <textarea name="detail" class="form-control" rows="4">
                                        {{$value->detail}}
                                            </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:7px;">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="since">ตั้งแต่วันที่ *</label>
                                    <input id="since" type="date" class="form-control" name="since"
                                        value="{{$value->indate}}">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date">ถึงวันที่ *</label>
                                    <input id="todate" type="date" class="form-control" name="todate"
                                        value="{{$value->todate}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="since">เป็นเวลาทั่งสิ้น *</label>
                                    <input id="since" type="text" class="form-control" name="alltime"
                                        value="{{$value->alltime}}">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:7px;">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="since">โดยการลาครั้งลาสุดของข้าพเจ้าคือ วันที่ *</label>
                                    <input id="since" type="date" class="form-control" name="#" value="">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date">ถึงวันที่ *</label>
                                    <input id="todate" type="date" class="form-control" name="#">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="since">เป็นเวลาทั่งสิ้น *</label>
                                    <input type="text" class="form-control" name="#" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:7px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="contacted">ในระหว่างลาหากมีธุระเรงด่วนสําคัญ
                                        สามารถติดตอข้าพเจ้าไดที่ *</label>
                                    <input id="contacted" type="text" class="form-control" name="contacted"
                                        value="{{$value->contacted}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_email">สถิติลา</label>
                                        @foreach($users as $c)
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">ประเภท</th>
                                                    <th scope="col">ลามาแล้ว</th>
                                                    <th scope="col">ลาครั้งนี้</th>
                                                    <th scope="col">รวม</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                                <tr>
                                                    <th scope="row">ลาป่วย</th>
                                                    <td>@if($c->vacation == 'ลาป่วย') {{$c->total}}  @endif</td>
                                                    <td> @if($value->vacation == 'ลาป่วย'){{$value->alltime}}   @endif</td>
                                                    <td>@if(($c->vacation == 'ลาป่วย')&&($value->vacation == 'ลาป่วย')) 
                                                    {{$c->total+$value->alltime}} @else
                                                     @if($c->vacation == 'ลาป่วย')
                                                     {{$c->total}}  
                                                    @endif
                                                    @if($value->vacation == 'ลาป่วย')
                                                    {{$value->alltime}} 
                                                    @endif
                                                    @endif
                                                   </td>
                                                  
                                                </tr>
                                                <tr>
                                                    <th scope="row">ลากิจ</th>
                                                    <td>@if($c->vacation == 'ลากิจ') {{$c->total}}  @endif</td>
                                                    <td> @if($value->vacation == 'ลากิจ'){{$value->alltime}}   @endif</td>
                                                    <td>@if(($c->vacation == 'ลากิจ')&&($value->vacation == 'ลากิจ')) 
                                                    {{$c->total+$value->alltime}}   @else
                                                     @if($c->vacation == 'ลากิจ')
                                                     {{$c->total}}  
                                                    @endif
                                                    @if($value->vacation == 'ลากิจ')
                                                    {{$value->alltime}} 
                                                    @endif
                                                    @endif
                                                   </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">อื่นๆ</th>
                                                    <td>@if($c->vacation == 'อื่นๆ') {{$c->total}}   @endif</td>
                                                    <td> @if($value->vacation == 'อื่นๆ'){{$value->alltime}}   @endif</td>
                                                    <td>@if(($c->vacation == 'อื่นๆ')&&($value->vacation == 'อื่นๆ')) 
                                                    {{$c->total+$value->alltime}} @else
                                                     @if($c->vacation == 'อื่นๆ')
                                                     {{$c->total}}  
                                                    @endif
                                                    @if($value->vacation == 'อื่นๆ')
                                                    {{$value->alltime}} 
                                                    @endif
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_need">รูปหลักฐาน</label>
                                        @if(!empty($value->image))
                                        <div class="text-center">
                                            <img src="{{asset('storage/'.$value->image)}}" width="200px" height="200px">
                                        </div>
                                        @else
                                        <div class="text-center">
                                            <img src="{{asset('storage/photos/No_Image.png')}}" width="80px" height="80px">
                                            </div>
                                            @endif
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ action('admin\adminController@update',$value->id) }}" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                {{ method_field('PUT') }}
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">การอนุมัดติ</label>
                                    <div class="col-md-6">
                                        <input type="hidden" name="approve" value=" {{ Auth::user()->id }}">
                                        <select
                                            class="form-control {{ !empty( $errors->first('status')) ? 'is-invalid' : '' }}"
                                            name="status" id="status">
                                            <option value="" class="form-control">-เลือก-</option>
                                            <option value="อนุมัติการลา">อนุมัติการลา</option>
                                            <option value="ไม่อนุมัติการลา">ไม่อนุมัติการลา</option>
                                        </select>
                                        @if (!empty($errors->first('status')))
                                        <message class="text-danger">{{ $errors->first('status') }}</massage>
                                            @endif
                                    </div>

                                </div>
                                <div class="col-md-12" style="margin-top:30px; text-align:center;">
                                    <button type="submit" class="btn btn-primary"
                                        class="btn btn-success btn-send">บันทึก</button>
                                </div>
                               
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        @endsection
