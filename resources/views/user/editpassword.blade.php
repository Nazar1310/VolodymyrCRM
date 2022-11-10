@extends('layouts.main')
@section('title', 'CRM')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-left"></label>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Old password</label>
                    <div class="col-md-4">
                        <input name="old_password" type="password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}">
                        @if ($errors->has('old_password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('old_password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">New password</label>
                    <div class="col-md-4">
                        <input name="new_password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}">
                        @if ($errors->has('new_password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('new_password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Confirm new password</label>
                    <div class="col-md-4">
                        <input name="new_password_confirmation" type="password" class="form-control{{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }}">
                        @if ($errors->has('new_password_confirmation'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Зберегти
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
