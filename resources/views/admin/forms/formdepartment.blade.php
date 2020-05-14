@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 style="text-align:center;">{{ !empty($data->id) ? 'แก้ไข' : 'เพิ่ม' }}ข้อมูล ฝ่าย / แผนก </h2>
                @if(!empty($data->id))
                <form action="{{ action('admin\departmentController@update',$data->id) }}" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('PUT') }}
                    @else
                    <form method="POST" action="{{ url('admin/managedepartment') }}" enctype="multipart/form-data">
                        @endif
                        <div class="card-body">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="name" class="">ฝ่าย / แผนก</label>
                                </div>
                            </div>
                            <div class="form-row align-items-center">
                                <div class="col-6">
                                    <label class="sr-only" for="inlineFormInput">Name</label>
                                    <input id="name" type="text"
                                        class="form-control{{ $errors->first('name') ? ' is-invalid' : '' }}"
                                        name="name" value="{{ !empty($data->name) ? $data->name: old('name') }}"
                                        placeholder="ฝ่าย / แผนก">
                                    @if (!empty($errors->first('name')))
                                    <message class="text-danger">{{ $errors->first('name') }}</massage>
                                        @endif
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2"> บันทึกข้อมูล</button>
                                </div>
                            </div>
                    </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
