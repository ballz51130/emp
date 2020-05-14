@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin:30px;">
            <div class="card">
                <div class="card-header">ข้อมูลส่วนตัว</div>
                @csrf
                @foreach( $data as $key => $value )
                <div class="card-body">
                    <div class="form-row"   >
                        <div class="form-group col-md-12">
                            @if(!empty($value->profile))
                            <div class="text-center">
                                <img src="{{asset('storage/'.$value->profile)}}" width="150px" height="150px">
                            </div>
                            @else
                            <div class="text-center">
                                <img src="{{asset('storage/photo/no_image.png')}}" width="150px" height="150px">
                                @endif
                            </div>
                        </div>
                    </div>
                    <form action="{{ action('user\UserController@update',$value->id) }}" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{ method_field('PUT') }}
                        <div class="form-group col-md-12" style="margin-left:270px;">
                            <input type="file" name="profile" accept="image/*">
                        </div>
                        <div class="form-row" style="padding:30px;">
                            <div class="form-group col-md-8">
                                <label for="inputEmail4">Email</label>
                                <input id="email" type="email"
                                    class="form-control {{ $errors->first('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ !empty($value->email) ? $value->email: old('email') }}">
                                @if ($errors->first('email'))
                                <message class="text-danger">{{ $errors->first('email') }}</massage>
                                    @endif
                            </div>
                            <div class="form-group col-md-12">
                                <a href="{{ action('user\changepasswordController@edit', $value->id) }}" class="btn btn-primary">เปลียนรหัสผ่าน</a>
                            </div>
                        </div>
                        <div class="form-row" style="padding:30px;margin-top:-50px; " >
                            <div class="form-group col-md-3">
                                <label for="prefix">คำนำหน้าชื่อ</label>
                                @if($value->prefix)
                                <select class="form-control {{ !empty( $errors->first('prefix')) ? 'is-invalid' : '' }}"
                                    name="prefix" id="prefix">
                                    <option value="{{ $value->prefix }}" class="form-control">{{ $value->prefix }}
                                    </option>
                                    <option value="นาย" @if( old ('prefix')=='นาย' ) selected="selected" @endif>นาย
                                    </option>
                                    <option value="นาง" @if (old('prefix')=='นาง' ) selected="selected" @endif>นาง
                                    </option>
                                    <option value="นางสาว" @if (old('prefix')=='นางสาว' ) selected="selected" @endif>
                                        นางสาว</option>
                                </select>
                                @else
                                <select class="form-control {{ !empty( $errors->first('prefix')) ? 'is-invalid' : '' }}"
                                    name="prefix" id="prefix">
                                    <option value="" class="form-control">-เลือกคำนำหน้า-</option>
                                    <option value="นาย" @if( old ('prefix')=='นาย' ) selected="selected" @endif>นาย
                                    </option>
                                    <option value="นาง" @if (old('prefix')=='นาง' ) selected="selected" @endif>นาง
                                    </option>
                                    <option value="นางสาว" @if (old('prefix')=='นางสาว' ) selected="selected" @endif>
                                        นางสาว</option>
                                </select>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label for="name">ชื่อ</label>
                                <input type="text" name="name"
                                    class="form-control {{ !empty( $errors->first('name')) ? 'is-invalid' : '' }}"
                                    value="{{ !empty($value->username) ? $value->username: old('username') }}">
                                @if(!empty( $errors->first('name')))
                                <message class="text-danger">- {{ $errors->first('name') }} </message>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lastname">นามสกุล</label>
                                <input type="text" name="lastname"
                                    class="form-control {{ !empty( $errors->first('lastname')) ? 'is-invalid' : '' }}"
                                    value="{{ !empty($value->lastname) ? $value->lastname: old('lastname') }}">
                                @if(!empty( $errors->first('name')))
                                <message class="text-danger">- {{ $errors->first('name') }} </message>
                                @endif
                            </div>
                        </div>
                        <button type="submit" style="margin-left:300px; margin-bottom:20px;" class="btn btn-primary">บันทึก</button>
                    </form>
                </div>
                @endforeach
            </div> 
        </div>
    </div>
</div>

@endsection
