@extends('layout.layout')
@section('content')
    <div class="content">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                    <h5 class="content-group">{{trans('pswr.Npsw.login-title')}}
                        <small class="display-block">{{trans('pswr.Npsw.login-title2')}}</small>
                    </h5>
                </div>
                {!! Form::open([
                'method'=>'POST',
                'url'=> route('NPsw.store'),
                'class'=> 'form-horizontal',
                'id'=>'recover-Npsw'
                ]) !!}
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-feedback-right':'has-feedback-left' }}">

                    <input type="password"
                           name="password"
                           class="form-control {{ $errors->has('password') ? 'border-danger':'' }}"
                           placeholder="{{trans('pswr.Npsw.placeholder')}}"
                           autofocus required>

                    @if($errors->has('password'))
                        <div class="form-control-feedback">
                            <i class="icon-cancel-circle2 text-danger-300"></i>
                        </div>
                        <span class="label label-block mt-5 label-danger">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{ trans('pswr.validation.Npsw') }}</font>
                            </font>
                        </span>
                    @else
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-feedback-right':'has-feedback-left' }}">

                    <input type="password"
                           name="password_confirmation"
                           class="form-control {{ $errors->has('password') ? 'border-danger':'' }}"
                           placeholder="{{trans('pswr.Npsw.placeholder-confirmation')}}"
                           autofocus required>

                    @if($errors->has('password'))
                        <div class="form-control-feedback">
                            <i class="icon-cancel-circle2 text-danger-300"></i>
                        </div>
                        <span class="label label-block mt-5 label-danger">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{ trans('pswr.validation.Npsw') }}</font>
                            </font>
                        </span>
                    @else
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    @endif
                </div>


                <input type="hidden" name="token" value="{{$token}}">
                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-block">{{trans('pswr.Npsw.btn')}} <i
                                class="icon-arrow-right14 position-right"></i></button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop