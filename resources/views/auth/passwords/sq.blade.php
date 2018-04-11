@extends('layout.layout')
@section('content')
    <div class="content">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                    <h5 class="content-group">{{trans('pswr.sq.login-title')}}
                        <small class="display-block">{{trans('pswr.sq.login-title2')}}</small>
                    </h5>
                </div>
                {!! Form::open([
                'method'=>'post',
                'url'   => route('sq.store'),
                'class'=> 'form-horizontal',
                'id'=>'recover-sq',
                ]) !!}
                <p class="form-text text-slate-800 text-semibold">
                    <b>{{ trans('pswr.sq.Question') }}</b> : {{ $question }} <br>
                </p>
                <div class="form-group has-feedback {{ $errors->has('response') ? 'has-feedback-right':'has-feedback-left' }}">

                    <input type="text"
                           name="response"
                           class="form-control {{ $errors->has('response') ? 'border-danger':'' }}"
                           placeholder="{{trans('pswr.sq.placeholder')}}"
                           value="{{old('response')}}" autofocus required>

                    @if($errors->has('response'))
                        <div class="form-control-feedback">
                            <i class="icon-cancel-circle2 text-danger-300"></i>
                        </div>
                        <span class="label label-block mt-5 label-danger">{{ trans('pswr.validation.sq') }}</span>
                    @else
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    @endif
                </div>
                <input type="hidden" name="token" value="{{$token}}">
                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-block">{{trans('pswr.sq.btn')}} <i
                                class="icon-arrow-right14 position-right"></i></button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop