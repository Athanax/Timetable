@extends('layouts.inc')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
            <div class="container-fluid">
                <div class="box box-primary">
                    <div class="box-heading">
                        <span class="pull-left"><h4 class="col-md-offset-1">Lecturers</h4></span><span class="pull-right padding" style="padding:10px"><a  href="/lecturers">View more >></a></span>
                    </div>
                    <div class="box-body">
                        
                        @if (count($lecturers)>0)
                        
                                
                            <div class="container-fluid table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#id</th>
                                            <th>Name</th>
                                            <th>email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lecturers as $lecturer)
                                            <tr>
                                                <td>{{ $lecturer->id }}</td>
                                                <td><a href="/lecturers/{{ $lecturer->id }}">{{ $lecturer->name }}</a></td>
                                                <td>{{ $lecturer->email }}</td>
                                            </tr>
                                        @endforeach
                                            
                                    </tbody>
                                </table>
                            </div>
                            
                        @else
                        <div class="container-fluid">
                            <div class="alert alert-info">
                                <strong>Currently no Lecturer</strong><span class="pull-right"><a href="/lecturers/create">Create Lecturer</a></span>
                            </div>
                        </div>
                        
                        @endif
                    </div>     
                </div>
                <div class="box box-primary">
                    <div class="box-heading">
                            <span class="pull-left"><h4 class="col-md-offset-1">Courses</h4></span><span class="pull-right padding" style="padding:10px"><a  href="/courses">View more >></a></span>                        
                    </div>
                    <div class="box-body">
                        @if (count($courses)>0)
                            <div class="container-fluid table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#id</th>
                                            <th>Name</th>
                                            <th>Abbr</th>
                                            <th>Capacity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td>{{ $course->id }}</td>
                                                <td><a href="/courses/{{ $course->id }}">{{ $course->name }}</a></td>
                                                <td>{{ $course->initials }}</td>
                                                <td>{{ $course->capacity }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="container-fluid">
                                <div class="alert alert-info">
                                    <strong>Currently no Courses</strong><span class="pull-right"><a href="/courses/create">Create course</a></span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-heading">
                        <span class="pull-left"><h4 class="col-md-offset-1">Rooms</h4></span><span class="pull-right padding" style="padding:10px"><a  href="/room">View more >></a></span>                        
                    
                </div>
                <div class="box-body">
                    @if (count($rooms)>0)
                    <div class="box box-widget widget-user-2">
                       <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                @foreach ($rooms as $room)
                                    <li><a href="/rooms/{{ $room->id }}">{{ $room->name }} ---> {{ $room->block_name }}</a></li>                                    
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    @else
                    <div class="container-fluid">
                        <div class="alert alert-info">
                            <strong>Currently no rooms</strong><span class="pull-right"><a href="/rooms/create">Create rooms</a></span>
                        </div>
                    </div>
                    
                    @endif
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-heading">
                    <h4 class="col-md-offset-1">Units</h4>
                </div>
                <div class="box-body">
                    @if (count($units)>0)
                        <div class="container-fluid table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#id</th>
                                        <th>Unit name</th>
                                        <th>Unit code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($units as $unit)
                                        <tr>
                                            <td>{{ $unit->id }}</td>
                                            <td><a href="/units/{{ $unit->id }}">{{ $unit->name }}</a></td>
                                            <td>{{ $unit->unit_code }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="container-fluid">
                            <div class="alert alert-info">
                                <strong>Currently no units</strong><span class="pull-right"><a href="/units/create">Create units</a></span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
