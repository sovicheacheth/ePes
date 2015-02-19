@extends('layouts.default')

@section('content')
    @if(Auth::getUser()->lockpds == 'locked')
        <div class="lock">
            <h1>YOUR PDS IS LOCKED.</h1>
            <p>If you need to change something, ask the HR Department to unlock it.</p>
        </div>
    @endif

    {{ Form::open(['route' => 'employees.pds.organizations.store', 'method' => 'post']) }}
        @include('employees.usersorganizations.form')
    {{ Form::close() }}
@stop

@section('page-script')

@stop