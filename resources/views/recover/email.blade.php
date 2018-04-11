@extends('layout.layout')
@section('content')
    <div class="content">
        <div class="panel border-slate-300 panel-bordered">
            <div class="panel-heading bg-slate-300">
                <h6 class="panel-title">
                    {{trans('pages.recover_mail.title-panel')}}
                </h6>
                <div class="heading-elements">
                    <i class="icon-lock text-slate-600 mt-3"></i>
                </div>
            </div>

            <div class="panel-body">
                <p style="vertical-align: inherit;">
                    @if(isset($user)) <b>{{$user->name}}</b> @endif, {{trans('pages.recover_mail.text')}}
                </p>
                {!! Form::open(['method'=>'put', 'class'=> 'form-horizontal','data-ajax'=>'true','data-response'=>'#data','id'=>'recover-mail', 'url'=>route('recover.mail.store')]) !!}
                <div class="form-group">
                    {{ Form::label('token',trans('pages.recover_mail.label'),['class'=>'control-label text-semibold']) }}
                </div>
                <div class="form-group">
                    <input type="text" name="token"
                           id="token" class="form-control {{ $errors->has('token') ? 'border-danger':'' }}"
                           value="{!! old('token')!!}"
                           placeholder="{{trans('pages.recover_mail.placeholder')}}"
                           autofocus required>
                    @if($errors->has('token'))
                        <div class="form-control-feedback">
                            <i class="icon-cancel-circle2 text-danger-300"></i>
                        </div>
                        <span class="label label-block mt-5 label-danger">
                            {{ $errors->first('token') }}
                        </span>
                    @endif
                </div>
                <div class="stepy-navigator mt-5">
                    <button type="submit" class="position-right button-next btn bg-slate-300">
                        {{trans('pages.recover_mail.btn')}} <i class="icon-arrow-right14 position-right"></i>
                    </button>
                </div>
                {!! Form::close()!!}
            </div>
        </div>
    </div>
@stop