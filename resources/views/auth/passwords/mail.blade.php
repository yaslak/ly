@extends('layout.layout')
@section('content')
    <div class="content">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                    <h5 class="content-group">{{trans('pswr.mail.login-title')}}
                        <small class="display-block">{{trans('pswr.mail.login-title2')}}</small>
                    </h5>
                </div>
                {!! Form::open([
                'method'=>'POST',
                'url'=> route('mail.store'),
                'class'=> 'form-horizontal',
                'id'=>'recover-mail',
                ]) !!}
                <div class="form-group has-feedback {{ $errors->has('code') ? 'has-feedback-right':'has-feedback-left' }}">

                    <input type="text"
                           name="code"
                           class="form-control {{ $errors->has('code') ? 'border-danger':'' }}"
                           placeholder="{{trans('pswr.mail.placeholder')}}"
                           value="{{old('code')}}" autofocus required>

                    @if($errors->has('code'))
                        <div class="form-control-feedback">
                            <i class="icon-cancel-circle2 text-danger-300"></i>
                        </div>
                        <span class="label label-block mt-5 label-danger">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{ trans('pswr.validation.mail') }}</font>
                            </font>
                        </span>
                    @else
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    @endif
                </div>

                <input type="hidden"
                       name="token"
                       value="{{$token}}" required>

                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-block">{{trans('pswr.mail.btn')}} <i
                                class="icon-arrow-right14 position-right"></i></button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop