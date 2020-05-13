@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <h1 style="text-align:center;">{{ !empty($data->id) ? 'แก้ไข' : 'เพิ่ม' }}ข้อมูลสมาชิก </h1>
        @if(!empty($data->id))
        <form action="{{ action('admin\ManageUserController@update',$data->id) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{ method_field('PUT') }}
        @else
       <form method="POST" action="{{ url('admin/manageuser') }}" enctype="multipart/form-data"> 
        @endif
                <div class="card-body">
                        @csrf
                        <div class="form-group row" >
                            <label for="name" class="col-md-4 col-form-label text-md-right">คำนำหน้าชื่อ</label>

                            <div class="col-md-6">
                            <select class="form-control {{ !empty( $errors->first('prefix')) ? 'is-invalid' : '' }}" name="prefix" id="prefix">
                            @if(!empty($data->perfix))
                            <option value="" class="form-control">-เลือกคำนำหน้า-</option>
                            @else
                            
                            <option value="{{ !empty($data->prefix) ? $data->prefix: old('prefix') }}" class="form-control">{{ !empty($data->prefix) ? $data->prefix: old('prefix') }}</option>
                            @endif
                                    <option value="นาย" @if( old ('prefix')=='นาย') selected="selected" @endif>นาย</option>
                                    <option value="นาง" @if (old('prefix') == 'นาง') selected="selected" @endif>นาง</option>
                                    <option value="นางสาว" @if (old('prefix') == 'นางสาว') selected="selected" @endif>นางสาว</option>
                                </select>
                                @if (!empty($errors->first('prefix')))
                                    
                                        <message class="text-danger">{{ $errors->first('prefix') }}</massage>
                                @endif
                            </div>
                       
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ชื่อ</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->first('name') ? ' is-invalid' : '' }}" name="name" value="{{ !empty($data->name) ? $data->name: old('name') }}">

                                @if (!empty($errors->first('name')))
                                    
                                        <message class="text-danger">{{ $errors->first('name') }}</massage>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">นามสกุล</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control{{ $errors->first('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ !empty($data->lastname) ? $data->lastname: old('lastname') }}">

                                @if ($errors->first('lastname'))
                                    
                                        <message class="text-danger">{{ $errors->first('lastname') }}</massage>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ตำแหน่งงาน</label>

                            <div class="col-md-6">
                                <select class="form-control {{ !empty( $errors->first('position')) ? 'is-invalid' : '' }}" name="position" id="position" value="{{ !empty($data->position) ? $data->position: old('position') }}" >
                                <option value="" class="form-control">-เลือกตำแหน่งงาน-</option>
                                @foreach( $position AS $key => $value )
                                @php
                                    $sel = '';
                                @endphp

                                @if( !empty($data->position) )
                                    @if($value->id == $data->position )
                                        @php
                                            $sel='selected="1"';
                                        @endphp
                                    @endif
                                @endif
                                    @if($value->id == old('position'))
                                    @php
                                        $sel = 'selected="1"';
                                    @endphp  
                                @endif     
                                <option class="form-control" {{ $sel }} value="{{ $value->id }}"> {{ $value->name }} </option>
                                @endforeach
                                </select>
                                @if ($errors->first('position'))
                                        <message class="text-danger">{{ $errors->first('position') }}</massage>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ฝ่าย/แผนก</label>

                            <div class="col-md-6">
                            <select class="form-control {{ !empty( $errors->first('department')) ? 'is-invalid' : '' }}" name="department" id="department" value="{{ !empty($data->department) ? $data->department: old('department') }}" >
                            <option value="" class="form-control">-เลือกตำแหน่งงาน-</option>
                            @foreach( $department AS $key => $value )
                            @php
                                $sel = '';
                            @endphp

                            @if( !empty($data->department) )
                                @if($value->id == $data->department )
                                    @php
                                        $sel='selected="1"';
                                    @endphp
                                @endif
                            @endif
                                @if($value->id == old('department'))
                                @php
                                    $sel = 'selected="1"';
                                @endphp  
                            @endif     
                            <option class="form-control" {{ $sel }} value="{{ $value->id }}"> {{ $value->name }} </option>
                            @endforeach
                            </select>
                                
                                @if ($errors->first('department'))
                                    
                                        <message class="text-danger">{{ $errors->first('department') }}</massage>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control {{ $errors->first('email') ? ' is-invalid' : '' }}" name="email" value="{{ !empty($data->email) ? $data->email: old('email') }}">

                                @if ($errors->first('email'))
                                    
                                        <message class="text-danger">{{ $errors->first('email') }}</massage>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">รหัสผ่าน</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control {{ $errors->first('password') ? ' is-invalid' : '' }}" name="password" >
                                @if ($errors->first('password'))
                                    
                                        <message class="text-danger">{{ $errors->first('password') }}</massage>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('รูป') }}</label>
                            <div class="col-md-6">
                            <input type="file" name="profile" class="form-control" accept="image/*" />
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    บันทึกข้อมูล
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
