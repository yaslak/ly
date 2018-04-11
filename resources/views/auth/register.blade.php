@extends('layout.layout')
@section('themeJs')
    <script type="text/javascript" src="{{asset('js/plugins/notifications/jgrowl.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/ui/moment/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/pickers/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/pickers/anytime.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/pickers/pickadate/picker.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/pickers/pickadate/picker.date.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/pickers/pickadate/picker.time.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/pickers/pickadate/legacy.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/pages/picker_date.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/plugins/forms/selects/bootstrap_select.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/pages/form_bootstrap_select.js')}}"></script>
@stop
@section('content')
    <!-- Advanced login -->
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 mt-10">
        {{ Form::open(['method'=>'post','url'=>route('register'),'class'=>'form-horizontal']) }}
            <div class="panel">
                <div class="panel-header">
                    <div class="text-center">
                        <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                        <h5 class="content-group text-slate">{{ucfirst(trans('pages.register.register'))}}
                            <small class="display-block text-muted">{{ucfirst(trans('pages.register.answer'))}}</small>
                        </h5>
                    </div>
                </div>
                <div class="panel-body">

                    <fieldset>
                        <legend class="text-semibold">
                            <i class="icon-file-text2 position-left"></i>
                            {{ ucfirst(trans('pages.register.virtuel')) }}
                            <a class="control-arrow" data-toggle="collapse" data-target="#virtuel">
                                <i class="icon-circle-down2"></i>
                            </a>
                        </legend>

                        <div class="collapse in" id="virtuel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-5 has-feedback">
                                        {{ Form::label('name',ucfirst(trans('validation.attributes.username')) . ' * : ',['class'=>'text-slate']) }}
                                        {{ Form::text('name',old('name'),['id'=>'name','class'=>($errors->has('name')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.username')),'required']) }}
                                        @if($errors->has('name'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2 text-danger"></i>
                                            </div>
                                            <span class="label label-block label-danger">{{ $errors->first('name') }}</span>
                                        @else
                                            <div class="form-control-feedback">
                                                <i class="fas fa-user text-slate"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group m-5 has-feedback">
                                        {{ Form::label('email',ucfirst(trans('validation.attributes.email')) . ' * : ',['class'=>'text-slate']) }}
                                        {{ Form::email('email',old('email'),['id'=>'email','class'=>($errors->has('email')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.email')),'required']) }}
                                        @if($errors->has('email'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2 text-danger"></i>
                                            </div>
                                            <span class="label label-block label-danger">{{ $errors->first('email') }}</span>
                                        @else
                                            <div class="form-control-feedback">
                                                <i class="icon-mention text-slate"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group m-5 has-feedback">
                                        {{ Form::label('password',ucfirst(trans('validation.attributes.password')) . ' * : ',['class'=>'text-slate']) }}
                                        {{ Form::password('password',['id'=>'password','class'=>($errors->has('password')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.password')),'required']) }}
                                        @if($errors->has('password'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2 text-danger"></i>
                                            </div>
                                            <span class="label label-block label-danger">{{ $errors->first('password') }}</span>
                                        @else
                                            <div class="form-control-feedback">
                                                <i class="icon-eye-blocked2 text-slate"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group m-5 has-feedback">
                                        {{ Form::label('password_confirmation',ucfirst(trans('validation.attributes.password_confirmation')) . ' * : ',['class'=>'text-slate']) }}
                                        {{ Form::password('password_confirmation',['id'=>'password_confirmation','class'=>($errors->has('password')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.password_confirmation')),'required']) }}
                                        @if($errors->has('password'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2 text-danger"></i>
                                            </div>
                                            <span class="label label-block label-danger">{{ $errors->first('password') }}</span>
                                        @else
                                            <div class="form-control-feedback">
                                                <i class="icon-lock2 text-slate"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend class="text-semibold">
                            <i class="icon-file-text2 position-left"></i>
                            {{ ucfirst(trans('pages.register.reel')) }}
                            <a class="control-arrow" data-toggle="collapse" data-target="#reel">
                                <i class="icon-circle-down2"></i>
                            </a>
                        </legend>

                        <div class="collapse in" id="reel">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group m-5 has-feedback">
                                        {{ Form::label('last_name',ucfirst(trans('validation.attributes.last_name')),['class'=>'text-slate']) }}
                                        {{ Form::text('last_name',old('last_name'),['id'=>'last_name','class'=>($errors->has('last_name')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.last_name'))]) }}
                                        @if($errors->has('last_name'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2 text-danger"></i>
                                            </div>
                                            <span class="label label-block label-danger">{{ $errors->first('last_name') }}</span>
                                        @else
                                            <div class="form-control-feedback">
                                                <i class="fas fa-user text-slate"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group m-5 has-feedback">
                                        {{ Form::label('first_name',ucfirst(trans('validation.attributes.first_name')),['class'=>'text-slate']) }}
                                        {{ Form::text('first_name',old('first_name'),['id'=>'first_name','class'=>($errors->has('first_name')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.first_name'))]) }}
                                        @if($errors->has('last_name'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2 text-danger"></i>
                                            </div>
                                            <span class="label label-block label-danger">{{ $errors->first('first_name') }}</span>
                                        @else
                                            <div class="form-control-feedback">
                                                <i class="fas fa-user text-slate"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="sex">{{ trans('validation.attributes.sex') }} :</label>

                                    <div class="input-group">
                                        <div class="input-group-addon {{ ($errors->has('sex')) ? 'border-danger' : 'border-slate' }}">
                                            <i class="icon-people"></i>
                                        </div>

                                        <select class="bootstrap-select {{ ($errors->has('sex')) ? 'border-danger' : 'border-slate' }}"
                                                id="sex"
                                                name="sex"
                                                data-width="100%">
                                            <option value="">-----</option>
                                            <option value="homme" {{ (old('sex') == 'homme') ? 'selected' : '' }}>Homme</option>
                                            <option value="femme" {{ (old('sex') == 'femme') ? 'selected' : '' }}>Femme</option>
                                        </select>
                                        @if($errors->has('sex'))
                                            <span class="label label-block label-danger">{{ $errors->first('sex') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group m-5 has-feedback">
                                        {{ Form::label('dtn',ucfirst(trans('validation.attributes.dtn')) . ' * : ',['class'=>'text-slate']) }}
                                        {{ Form::date('dtn',null,['id'=>'dtn','class'=>($errors->has('dtn')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.dtn'))]) }}
                                        @if($errors->has('dtn'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2 text-danger"></i>
                                            </div>
                                            <span class="label label-block label-danger">{{ $errors->first('dtn') }}</span>
                                        @else
                                            <div class="form-control-feedback">
                                                <i class=" icon-calendar text-slate"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group m-5 has-feedback">
                                        {{ Form::label('tel',ucfirst(trans('validation.attributes.phone')) . ' : ',['class'=>'text-slate']) }}
                                        {{ Form::tel('tel',null,['id'=>'tel','class'=>($errors->has('tel')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.phone'))]) }}
                                        @if($errors->has('tel'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2 text-danger"></i>
                                            </div>
                                            <span class="label label-block label-danger">{{ $errors->first('tel') }}</span>
                                        @else
                                            <div class="form-control-feedback">
                                                <i class="icon-phone-wave text-slate"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group m-5 has-feedback">
                                        {{ Form::label('address',ucfirst(trans('validation.attributes.address')) . ' : ',['class'=>'text-slate']) }}
                                        {{ Form::text('address',null,['id'=>'address','class'=>($errors->has('address')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.address'))]) }}
                                        @if($errors->has('address'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2 text-danger"></i>
                                            </div>
                                            <span class="label label-block label-danger">{{ $errors->first('address') }}</span>
                                        @else
                                            <div class="form-control-feedback">
                                                <i class="icon-home5 text-slate"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group m-5 has-feedback">
                                        {{ Form::label('house_nbr',ucfirst(trans('validation.attributes.build')) . ' : ',['class'=>'text-slate']) }}
                                        {{ Form::text('house_nbr',null,['id'=>'address','class'=>($errors->has('house_nbr')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.build'))]) }}
                                        @if($errors->has('house_nbr'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2 text-danger"></i>
                                            </div>
                                            <span class="label label-block label-danger">{{ $errors->first('house_nbr') }}</span>
                                        @else
                                            <div class="form-control-feedback">
                                                <i class="icon-office text-slate"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group m-5 has-feedback">
                                        {{ Form::label('city',ucfirst(trans('validation.attributes.city')) . ' : ',['class'=>'text-slate']) }}
                                        {{ Form::text('city',null,['id'=>'city','class'=>($errors->has('city')) ? 'form-control text-slate border-danger' : 'form-control text-slate border-slate','placeholder'=>ucfirst(trans('validation.attributes.city'))]) }}
                                        @if($errors->has('house_nbr'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2 text-danger"></i>
                                            </div>
                                            <span class="label label-block label-danger">{{ $errors->first('city') }}</span>
                                        @else
                                            <div class="form-control-feedback">
                                                <i class="icon-city text-slate"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary">
                            {{ucfirst(trans('pages.register.register'))}}<i class="icon-arrow-right14 position-right"></i>
                        </button>
                    </div>

                </div>
            </div>


        {{ Form::close() }}
    </div>
    <!-- /advanced login -->
@stop
