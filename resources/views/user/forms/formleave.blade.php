@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ฟอร์มใบลา</div>
                @csrf
                @foreach( $data as $key => $value )
                <div class="card-body">
                <form action="{{ action('user\leaveController@update',$value->id) }}" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{ method_field('PUT') }}
                        <div class="controls">
                            <div class="row" style="margin-top:7px;">
                            <input type="hidden" name="U_id" value="{{ $value->id}}">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">เขียนที่ *</label>
                                        <input id="address" type="address"
                                            class="form-control {{ $errors->first('address') ? ' is-invalid' : '' }}"
                                            name="address" value="{{ !empty($data->address) ? $data->address: old('address') }}">
                                        @if ($errors->first('address'))
                                        <message class="text-danger">{{ $errors->first('address') }}</massage>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">วันที่ *</label>
                                        <input id="date" type="date"
                                            class="form-control {{ $errors->first('date') ? ' is-invalid' : '' }}"
                                            name="date" value="{{ !empty($data->date) ? $data->date: old('date') }}">
                                        @if ($errors->first('date'))
                                        <message class="text-danger">{{ $errors->first('date') }}</massage>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_email">เรี่องขอลา *</label>
                                        <input type="text" name="title"
                                            class="form-control {{ !empty( $errors->first('title')) ? 'is-invalid' : '' }}"
                                           value="{{ !empty($data->title) ? $data->title: old('title') }}">
                                        @if(!empty( $errors->first('title')))
                                        <message class="text-danger">- {{ $errors->first('title') }} </message>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">เรียน *</label>
                                        <input type="text" name="dear"
                                            class="form-control {{ !empty( $errors->first('dear')) ? 'is-invalid' : '' }}"
                                            value="{{ !empty($data->dear) ? $data->dear: old('dear') }}">
                                        @if(!empty( $errors->first('dear')))
                                        <message class="text-danger">- {{ $errors->first('dear') }} </message>
                                        @endif
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
                                        <input type="text" class="form-control"value="{{ $value->vacation}} {{$value->username}} {{$value->lastname}}" disabled>
                                        <h5><p></p></h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">พนักงานประจำตำแหน่ง *</label>
                                        <input type="text" class="form-control"value="{{ $value->positionname }}" disabled>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">ฝ่าย/แผนก *</label> 
                                        <input type="text" class="form-control"value="{{ $value->departmentname }}" disabled>
                                        
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
                                        <select class="form-control {{ !empty( $errors->first('vacation')) ? 'is-invalid' : '' }}" name="vacation" id="vacation">
                            @if(!empty($data->perfix))
                            <option value="" class="form-control">-เลือกหมายเหตุการลา-</option>
                            @else
                            <option value="{{ !empty($data->vacation) ? $data->vacation: old('vacation') }}" class="form-control">{{ !empty($data->vacation) ? $data->vacation: old('vacation') }}</option>
                            @endif
                                    <option value="นาย" @if( old ('vacation')=='นาย') selected="selected" @endif>นาย</option>
                                    <option value="นาง" @if (old('vacation') == 'นาง') selected="selected" @endif>นาง</option>
                                    <option value="นางสาว" @if (old('vacation') == 'นางสาว') selected="selected" @endif>นางสาว</option>
                                </select>
                                        
                                        @if(!empty( $errors->first('vacation')))
                                        <message class="text-danger">- {{ $errors->first('vacation') }} </message>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">อื่นๆ โปรดระบุ *</label>
                                        <input  type="text" class="form-control" name="etc" value="{{ !empty($data->etc) ? $data->etc: old('etc') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">เนื่องจาก *</label>
                                        <textarea  name="detail" class="form-control {{ !empty( $errors->first('detail')) ? 'is-invalid' : '' }}"
                                            placeholder="สาเหตุการลา *" rows="4" 
                                            data-error="Please, leave us a message.">
                                            {{ !empty($data->detail) ? $data->detail: old('detail') }}
                                            </textarea>
                                            @if(!empty( $errors->first('detail')))
                                        <message class="text-danger">- {{ $errors->first('detail') }} </message>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="indate">ตั้งแต่วันที่ *</label>
                                        <input id="indate" type="date"
                                            class="form-control {{ $errors->first('indate') ? ' is-invalid' : '' }}"
                                            name="indate" value="{{ !empty($data->indate) ? $data->indate: old('indate') }}">
                                        @if ($errors->first('indate'))
                                        <message class="text-danger">{{ $errors->first('indate') }}</massage>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date">ถึงวันที่ *</label>
                                        <input id="todate" type="date"
                                            class="form-control {{ $errors->first('todate') ? ' is-invalid' : '' }}"
                                            name="todate" value="{{ !empty($data->todate) ? $data->todate: old('todate') }}">
                                        @if ($errors->first('todate'))
                                        <message class="text-danger">{{ $errors->first('todate') }}</massage>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="indate">เป็นเวลาทั่งสิ้น(วัน) *</label>
                                        <input id="indate" type="text"
                                            class="form-control {{ $errors->first('alltime') ? ' is-invalid' : '' }}"
                                            name="alltime" value="{{ !empty($data->alltime) ? $data->alltime: old('alltime') }}">
                                        @if ($errors->first('alltime'))
                                        <message class="text-danger">{{ $errors->first('alltime') }}</massage>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:7px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contacted">ในระหว่างลาหากมีธุระเรงด่วนสําคัญ
                                            สามารถติดตอข้าพเจ้าไดที่ *</label>
                                        <input id="contacted" type="text"
                                            class="form-control {{ $errors->first('contacted') ? ' is-invalid' : '' }}"
                                            name="contacted" value="{{ !empty($data->contacted) ? $data->contacted: old('contacted') }}">
                                        @if ($errors->first('contacted'))
                                        <message class="text-danger">{{ $errors->first('contacted') }}</massage>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">รูปหลักฐาน</label>
                                <div class="col-sm-8">
                                    <input type="file" name="image" accept="image/*">
                                </div>

                            </div>
@endforeach
                            <div class="col-md-12" style="margin-top:30px; text-align:center;">
                                <button type="submit" class="btn btn-primary"
                                    class="btn btn-success btn-send">บันทึก</button>
                            </div>
                            <div class="form-group col-md-12" style="margin-left:270px;">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
