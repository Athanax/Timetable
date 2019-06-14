@extends('layouts.inc')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-heading">
                    <h4 class="col-md-offset-1">List of lessons</h4>
                </div>
                <div class="box-body">
                    <div class="container-fluid table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                   
                                    <th>Unit id</th>
                                    <th>Unit name</th>
                                    <th>Unit code</th>
                                    <th>Course name</th>
                                    <th>Academic Year</th>
                                    <th>Lecture name</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($lectures as $lecture)
                                    <tr>
                                        <td>{{ $lecture->unit_id }}</td>
                                        <td><a href="/units/{{ $lecture->unit_id }}">{{ $lecture->unit_name }}</a></td>
                                        <td>{{ $lecture->unit_code }}</td>
                                        <td><a href="/courses/{{ $lecture->course_id }}">{{ $lecture->course_name }}</a></td>
                                        <td>{{ $lecture->course_academic_year }}</td>
                                        @if (empty($lecture->lecturer_id))
                                            <td>No lecturer assigned</td>

                                        @else
                                            <td><a href="/lecturers/{{ $lecture->lecturer_id }}">{{ $lecture->lecturer_name }}</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-widget widget-user-2">
                    
                <div class="box-footer">
                    <ul class="nav nav-stacked">
                        
                        <li><a href="/timetable">Create timetable</a></li>
                        @if (count($new_lectures)>0)
                            <div class="container-fluid">
                                <div class="alert alert-warning">
                                    <strong>Some units are not effected in the timetable</strong>
                                    <strong>Click the link below to effect the changes</strong>
                                </div>


                            </div>
                            <li style="border:solid 1px"><a href="/apply_changes">Apply changes</a></li>

                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection