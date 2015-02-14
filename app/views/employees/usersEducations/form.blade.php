@if(Session::has('error'))
    <div class="alert alert-danger">
        <span>{{ Session::get('error') }}</span>
    </div>
@endif
<legend>Users Educations</legend>

<div class="form-group col-md-12">
    {{ Form::label('level', 'Level *', ['class' => 'form-label']) }}
    <?php
        $levels = [
            'elementary'        => 'Elementary',
            'secondary'         => 'Secondary',
            'vocational'        => 'Vocational',
            'college'           => 'College',
            'graduate studies'  => 'Graduate Studies'
        ];
    ?>
    {{ Form::select('level', $levels, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Agency Employee Number']) }}
</div>

<div class="form-group col-md-12">
    {{ Form::label('schoolname', 'School Name *', ['class' => 'form-label']) }}
    {{ Form::text('schoolname', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Name of school']) }}
</div>

<div class="form-group col-md-12">
    {{ Form::label('degreecourse', 'Degree Course *', ['class' => 'form-label']) }}
    {{ Form::text('degreecourse', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Degree Course']) }}
</div>

<div class="form-group col-md-12">
    {{ Form::label('yeargraduated', 'Year Graduated', ['class' => 'form-label']) }}
    {{ Form::text('yeargraduated', null, ['class' => 'form-control', 'placeholder' => 'Year graduated']) }}
</div>

<div class="form-group col-md-12">
    {{ Form::label('units', 'Units', ['class' => 'form-label']) }}
    {{ Form::text('units', null, ['class' => 'form-control', 'placeholder' => 'Units']) }}
</div>

<div class="form-group col-md-12">
    {{ Form::label('attendancefrom', 'Attendance from', ['class' => 'form-label']) }}
    {{ Form::text('attendancefrom', null, ['class' => 'form-control', 'placeholder' => 'Attendance From']) }}
</div>

<div class="form-group col-md-12">
    {{ Form::label('attendanceto', 'Attendance to', ['class' => 'form-label']) }}
    {{ Form::text('attendanceto', null, ['class' => 'form-control', 'placeholder' => 'Attendance Toss']) }}
</div>

<div class="form-group col-md-12">
    {{ Form::label('awards', 'Year Graduated', ['class' => 'form-label']) }}
    {{ Form::text('awards', null, ['class' => 'form-control', 'placeholder' => 'awards']) }}
</div>

<a href="/employees/pds/educations" class="btn btn-danger">Back</a>
<button type="submit" class="btn btn-primary">Submit</button>