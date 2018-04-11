@extends('layout.layout')
@section('content')
    <div class="content">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                    <h5 class="content-group">{{trans('pages.pswr.target.login-title')}}
                        <small class="display-block">{{trans('pages.pswr.target.login-title2')}}</small>
                    </h5>
                </div>
                {!! Form::open([
                        'method'    => 'POST',
                        'url'       => route('target.store'),
                        'class'     => 'form-horizontal',
                        'id'        => 'recover-target',
                        ]) !!}
                <div class="form-group has-feedback {{ $errors->has('target') ? 'has-feedback-right':'has-feedback-left' }}">
                    <input type="text"
                           name="target"
                           class="form-control {{ $errors->has('target') ? 'border-danger':'' }}"
                           placeholder="{{trans('pages.pswr.target.placeholder')}}"
                           value="{{old('target')}}" autofocus required>

                    @if($errors->has('target'))
                        <div class="form-control-feedback">
                            <i class="icon-cancel-circle2 text-danger-300"></i>
                        </div>
                        <span class="label label-block mt-5 label-danger">{{ trans('pages.pswr.validation.target') }}</span>
                    @else
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-block">{{trans('pages.pswr.target.btn')}} <i
                                class="icon-arrow-right14 position-right"></i></button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop