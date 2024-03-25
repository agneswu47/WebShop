@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Student' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('students.student.destroy', $student->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('students.student.index') }}" class="btn btn-primary" title="Show All Student">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('students.student.create') }}" class="btn btn-success" title="Create New Student">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('students.student.edit', $student->id ) }}" class="btn btn-primary" title="Edit Student">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Student" onclick="return confirm(&quot;Click Ok to delete Student.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Fullname</dt>
            <dd>{{ $student->fullname }}</dd>
            <dt>Email</dt>
            <dd>{{ $student->email }}</dd>
            <dt>Birthday</dt>
            <dd>{{ $student->Birthday }}</dd>
            <dt>Reg Date</dt>
            <dd>{{ $student->reg_date }}</dd>
            <dt>Major</dt>
            <dd>{{ optional($student->major)->name_major }}</dd>

        </dl>

    </div>
</div>

@endsection