@extends('layouts.master')

@section('title','登入')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">會員登入</div>
                    <div class="panel-body">
                        @if($errors->has('msg'))
                            <div class="row">
                                <div class="text-center text-danger">
                                    {!! $errors->first('msg') !!}
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <form method="POST" action="{{ action('Auth\AuthController@login') }}" style="padding:20px;">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="email">信箱</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">密碼</label>
                                    <input type="password" class="form-control" name="password" />
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" checked="checked" />記住我
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-default btn-block">登入</button>
                                </div>
                                <p class="text-right">
                                    <a href="{{ action('Auth\PasswordController@showResetForm') }}">忘記密碼？</a>
                                </p>
                                <hr />
                                <div class="text-center">
                                    <p>其他登入方式</p>
                                    <a href="{{ route('social.redirect', ['provider' => 'facebook']) }}" class="btn btn-lg btn-primary btn-block">Facebook</a>
                                    <a href="{{ route('social.redirect', ['provider' => 'google']) }}" class="btn btn-lg btn-danger btn-block">Google</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop