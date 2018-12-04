@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center h-100">
            <div class="col-md-6 align-self-center">
                <div class="card">
                    <div class="card-header">{{ trans('messages.register-header') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="username" class="col-md-5 col-form-label text-md-right">
                                    {{ trans('messages.register-form-username') }}
                                </label>

                                <div class="col-md-5">
                                    <input
                                        id="username"
                                        type="text"
                                        class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                                        name="username"
                                        value="{{ old('username') }}"
                                        required
                                        autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-5 col-form-label text-md-right">
                                    {{ trans('messages.register-form-email') }}
                                </label>

                                <div class="col-md-5">
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-5 col-form-label text-md-right">
                                    {{ trans('messages.register-form-password') }}
                                </label>

                                <div class="col-md-5">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                        name="password"
                                        required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-5 col-form-label text-md-right">
                                    {{ trans('messages.register-form-password-confirm') }}
                                </label>

                                <div class="col-md-5">
                                    <input
                                        id="password-confirm"
                                        type="password"
                                        class="form-control"
                                        name="password_confirmation"
                                        required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-5">
                                    <button type="submit" class="btn btn-primary font-weight-bold">
                                        {{ trans('messages.register-form-submit') }}
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
