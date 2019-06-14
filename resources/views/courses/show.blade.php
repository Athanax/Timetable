@extends('layouts.inc')

@section('content')
<div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-heading">
                    <h3 class="col-md-offset-1">{{ $course->name }}</h3>
                    <h4 class="col-md-offset-1">Units taken</h4>
                </div>
                <div class="box-body">
                    <div class="box box-widget widget-user-2">
                    
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                @if (count($my_units)>0)
                                    <div class="container-fluid table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Unit name</th>
                                                <th>Unit code</th>
                                                <th>Lecturer name</th>
                                                
                                            </tr>
                                            <tbody>
                                                @foreach ($my_units as $unit)
                                            
                                                    <tr>
                                                        <td>{{ $unit->unit_code }}</td>
                                                        <td><a href="/units/{{ $unit->unit_id }}">{{ $unit->unit_name }}</a></td>
                                                        @if (empty($unit->lecturer_name))
                                                            <td>
                                                                <span class="row">
                                                                    <span class="col-md-4">
                                                                        No lecturer
                                                                    </span>
                                                                    <div class="col-md-6">
                                                                        <form id="" action="{{ route('courses.assign') }}" method="POST" style="display: block;">
                                                                                <input type="hidden" name="unit_id" value="{{ $unit->unit_id }}">
                                                                                <input type="hidden" name="course_id" value="{{ $unit->course_id }}">
                                                                                <input type="submit" value="Assign Lecturer" class="btn btn-warning">
                                                                                
                                                                                {{ csrf_field() }}
                                                                        </form>
                                                                    </div>
                                                                </span> 
                                                                    {{-- <a class="btn btn-success"   
                                                                    href="#" onclick="document.getElementById('assign_lect').submit();">   Assign lecturer</a> --}}
                                                                   

                                                            </td>
                                                        @else
                                                            <td><a href="/lecturers/{{ $unit->lecturer_id }}">{{ $unit->lecturer_name }}</a></td>
                                                        @endif
                                                        <td>
                                                            <li>
                                                                
                                                                <a class="btn btn-warning"   
                                                                href="#"
                                                                    onclick="
                                                                    var result = confirm('Are you sure you wish to Remove {{ $unit->id }}?');
                                                                        if( result ){
                                                                            event.preventDefault();
                                                                            document.getElementById('delete-form').submit();
                                                                        }
                                                                            "
                                                                            >Remove</a>
                                                    
                                                                <form id="delete-form" action="{{ route('courses.remove') }}" 
                                                                    method="POST" style="display: none;">
                                                                            <input type="hidden" name="unit_id" value="{{ $unit->unit_id }}">
                                                                            <input type="hidden" name="course_id" value="{{ $unit->course_id }}">
                                                                            {{ csrf_field() }}
                                                                </form>
  
                                                                
                                                    
                                                            </li>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                    
                                @else
                                    <div class="alert alert-warning">
                                        <strong>Currently no Units</strong>
                                    </div>
                                @endif
                                
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>       
            
            <div class="box box-primary">
                <div class="box-heading">
                    <h4 class="col-md-offset-1">Register unit</h4>
                </div>
                <div class="box-body">
                    <div class="comtainer-fluid">
                        <form action="{{ route('courses.add_unit') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" required readonly name="course_id" value="{{ $course->id }}">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4" for="">
                                        <span class="pull-right">Select a Unit</span> 
                                    </label>
                                    <div class="col-md-8">
                                        <select required class="form-control " name="unit_id" id="">
                                            <option selected disabled value="">Select a Unit</option>
                                            @foreach ($units as $unit)
                                                
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <input type="submit" class="btn btn-primary pull-right">
    
                        </form>
                    </div>
                </div>
            </div>  
            
            
            <div class="box box-primary">
                <div class="box-heading">
                    <h2 class="col-md-offset-5">Lessons</h2>
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
                            <strong>No lesson for {{ $room->name }} Found in the timetable</strong>
                        </div>
                    </div>

                    @endif
                </div>
            </div>



        </div>
        <div class="col-md-3">
            <div>
                <div class="box box-widget widget-user-2">
                       
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a href="/courses">All Courses</a></li>
                            <li><a href="/courses/create">Create Course</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection