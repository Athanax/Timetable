@extends('layouts.inc')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-heading">
                    <h4 class="col-md-offset-1">{{ $unit->name }} - Lecturers</h4>
                </div>
                <div class="box-body">
                    @if (count($lecturers)>0)
                        <div class="box box-widget widget-user-2">
                        
                            <div class="box-footer no-padding">
                                <ul class="nav nav-stacked">
                                    @foreach ($lecturers as $lecturer)
                                        <li><a href="/lecturers/{{ $lecturer->lecturer_id }}">{{ $lecturer->lecturer_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            <div class="container-fluid">
                                <strong>No lecturers for this unit</strong>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-heading">
                    <h4 class="col-md-offset-1">Courses taking {{ $unit->name }}</h4>
                </div>
                <div class="box-body">
                    @if (count($courses)>0)
                        
                        <div class="box box-widget widget-user-2">
                       
                            <div class="box-footer no-padding">
                                <ul class="nav nav-stacked">
                                    @foreach ($courses as $course)
                                        <li><a href="/courses/{{ $course->course_id }}">{{ $course->course_name }}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            <div class="container-fluid">
                                <strong>No courses taking this unit</strong>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">

        </div>
    </div>
@endsection