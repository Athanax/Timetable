@extends('layouts.inc')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-heading">
                        <h3 class="col-md-offset-5">TIMETABLE</h3>
                    </div>
                    <div class="box-body">
                        @if (count($lessons)>0)

                        <h4 class="col-md-offset-1">Monday</h4>
                        <div class="container-fluid">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Unit name</th>
                                        <th>Lecturer name</th>
                                        <th>Unit code</th>
                                        <th>Course</th>
                                        <th>Academic year</th>
                                        <th>Block</th>
                                        <th>Room name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lessons as $lesson)
                                        @if ($lesson->day == 1)
                                            
                                            <tr>
                                                @if ($lesson->session == 1)
                                                    <td>8:00-11:00</td>
                                                @elseif($lesson->session == 2)
                                                    <td>11:00-14:00</td>
                                                @elseif($lesson->session == 3)
                                                    <td>14:00-16:00</td>
                                                @endif
                                                <td>{{ $lesson->unit_name }}</td>
                                                <td>{{ $lesson->lecturer_name }}</td>
                                                <td>{{ $lesson->unit_code }}</td>
                                                <td>{{ $lesson->course_name }}</td>
                                                <td>{{ $lesson->course_academic_year }}</td>
                                                <td>{{ $lesson->block_name }}</td>
                                                <td>{{ $lesson->room_number }}</td>
                                            </tr>
                                        
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <h4 class="col-md-offset-1">Tuesday</h4>
                        <div class="container-fluid">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Unit name</th>
                                        <th>Lecturer name</th>
                                        <th>Unit code</th>
                                        <th>Course</th>
                                        <th>Academic year</th>
                                        <th>Block</th>
                                        <th>Room name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lessons as $lesson)
                                        @if ($lesson->day == 2)
                                            
                                            <tr>
                                                @if ($lesson->session == 1)
                                                    <td>8:00-11:00</td>
                                                @elseif($lesson->session == 2)
                                                    <td>11:00-14:00</td>
                                                @elseif($lesson->session == 3)
                                                    <td>14:00-16:00</td>
                                                @endif
                                                <td>{{ $lesson->unit_name }}</td>
                                                <td>{{ $lesson->lecturer_name }}</td>
                                                <td>{{ $lesson->unit_code }}</td>
                                                <td>{{ $lesson->course_name }}</td>
                                                <td>{{ $lesson->course_academic_year }}</td>
                                                <td>{{ $lesson->block_name }}</td>
                                                <td>{{ $lesson->room_number }}</td>
                                            </tr>
                                        
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <h4 class="col-md-offset-1">Wednesday</h4>
                        <div class="container-fluid">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Unit name</th>
                                        <th>Lecturer name</th>
                                        <th>Unit code</th>
                                        <th>Course</th>
                                        <th>Academic year</th>
                                        <th>Block</th>
                                        <th>Room name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lessons as $lesson)
                                        @if ($lesson->day == 3)
                                            
                                            <tr>
                                                @if ($lesson->session == 1)
                                                    <td>8:00-11:00</td>
                                                @elseif($lesson->session == 2)
                                                    <td>11:00-14:00</td>
                                                @elseif($lesson->session == 3)
                                                    <td>14:00-16:00</td>
                                                @endif
                                                <td>{{ $lesson->unit_name }}</td>
                                                <td>{{ $lesson->lecturer_name }}</td>
                                                <td>{{ $lesson->unit_code }}</td>
                                                <td>{{ $lesson->course_name }}</td>
                                                <td>{{ $lesson->course_academic_year }}</td>
                                                <td>{{ $lesson->block_name }}</td>
                                                <td>{{ $lesson->room_number }}</td>
                                            </tr>
                                        
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <h4 class="col-md-offset-1">Thursday</h4>
                        <div class="container-fluid">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Unit name</th>
                                        <th>Lecturer name</th>
                                        <th>Unit code</th>
                                        <th>Course</th>
                                        <th>Academic year</th>
                                        <th>Block</th>
                                        <th>Room name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lessons as $lesson)
                                        @if ($lesson->day == 4)
                                            
                                            <tr>
                                                @if ($lesson->session == 1)
                                                    <td>8:00-11:00</td>
                                                @elseif($lesson->session == 2)
                                                    <td>11:00-14:00</td>
                                                @elseif($lesson->session == 3)
                                                    <td>14:00-16:00</td>
                                                @endif
                                                <td>{{ $lesson->unit_name }}</td>
                                                <td>{{ $lesson->lecturer_name }}</td>
                                                <td>{{ $lesson->unit_code }}</td>
                                                <td>{{ $lesson->course_name }}</td>
                                                <td>{{ $lesson->course_academic_year }}</td>
                                                <td>{{ $lesson->block_name }}</td>
                                                <td>{{ $lesson->room_number }}</td>
                                            </tr>
                                        
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <h4 class="col-md-offset-1">Friday</h4>
                        <div class="container-fluid">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Unit name</th>
                                        <th>Lecturer name</th>
                                        <th>Unit code</th>
                                        <th>Course</th>
                                        <th>Academic year</th>
                                        <th>Block</th>
                                        <th>Room name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lessons as $lesson)
                                        @if ($lesson->day == 5)
                                            
                                            <tr>
                                                @if ($lesson->session == 1)
                                                    <td>8:00-11:00</td>
                                                @elseif($lesson->session == 2)
                                                    <td>11:00-14:00</td>
                                                @elseif($lesson->session == 3)
                                                    <td>14:00-16:00</td>
                                                @endif
                                                <td>{{ $lesson->unit_name }}</td>
                                                <td>{{ $lesson->lecturer_name }}</td>
                                                <td>{{ $lesson->unit_code }}</td>
                                                <td>{{ $lesson->course_name }}</td>
                                                <td>{{ $lesson->course_academic_year }}</td>
                                                <td>{{ $lesson->block_name }}</td>
                                                <td>{{ $lesson->room_number }}</td>
                                            </tr>
                                        
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        

                        @else
                        
                        <div class="alert alert-warning">
                            <div class="container-fluid">
                                <strong>No lesson Found in the timetable</strong>
                            </div>
                        </div>

                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-widget widget-user-2">
                    
                    <div class="box-footer">
                        <ul class="nav nav-stacked">
                            
                            <li><a href="/print">Print timetable</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection