@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row mt-10">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-header text-center bg-slate">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in! OR not ?
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection