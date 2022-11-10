@extends('layouts.main')
@section('title', 'CRM')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="">
                @csrf
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-4">
                        <input name="name" value="{{isset($user)?$user['name']:''}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Email</label>
                    <div class="col-md-4">
                        <input name="email" value="{{isset($user)?$user['email']:''}}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                        <a style="margin-left: 20px" href="{{route('users-edit-password',$user->id)}}">Change password</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
