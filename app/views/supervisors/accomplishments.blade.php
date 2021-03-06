@extends('layouts.default')

@section('content')
    <h2>Accomplishments</h2>
    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
        <thead>
        <tr>
            <th>Employee No</th>
            <th>Name</th>
            <th>Department</th>
            <th>Position</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            @if($user->role->name == 'employee')
                <tr>
                    <td>{{{ $user->employee_no }}}</td>
                    <td>{{{ isset($user->bio->lastname) ? ucfirst($user->bio->lastname) : '' }}}, {{{ isset($user->bio->firstname) ? ucfirst($user->bio->firstname) : '' }}} {{{ isset($user->bio->middlename) ? ucfirst($user->bio->middlename) : '' }}}.</td>
                    <td>{{{ ucfirst($user->department->name) }}}</td>
                    <td>{{{ ucfirst($user->position) }}}</td>
                    <td>{{{ ucfirst($user->role->name) }}}</td>
                    <td>

                        @if(Auth::getUser()->role->name != 'admin')
                            <a href="/supervisors/accomplishments/{{ $user->employee_no }}" class="btn btn-info">View Accomplishments</a>
                            <a href="/supervisors/pes/{{ $user->employee_no }}" class="btn btn-primary">Evaluate</a>
                            <a href="/supervisors/employees/{{ $user->employee_no }}/pds" class="btn btn-info">View PDS</a>
                        @else
                            <a href="/admin/accomplishments/{{ $user->employee_no }}" class="btn btn-info">View Accomplishments</a>
                        @endif
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@stop

@section('page-script')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable();
        });
    </script>
@stop