@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <form action="{{ action('admin\changepasswordsController@update',$data->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('PUT') }}
                    <div class="card-body">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="name" class="">เปลียนรหัสผ่าน</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control{{ $errors->first('password') ? ' is-invalid' : '' }}"
                                    name="password" autocomplete="new-password">
                                @if ($errors->first('password'))
                                <message class="text-danger">{{ $errors->first('password') }}</massage>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password"
                                    class="form-control{{ $errors->first('confpassword') ? ' is-invalid' : '' }}"
                                    name="confpassword" autocomplete="new-password">
                                @if ($errors->first('confpassword'))
                                <message class="text-danger">{{ $errors->first('confpassword') }}</massage>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    บันทึก
                                </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
