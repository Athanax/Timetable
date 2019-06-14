@extends('layouts.inc')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue">
                    
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-desc">Courses</h3>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        @if (count($courses)>0)
        
                            <div class="container-fluid table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#id</th>
                                            <th>Name</th>
                                            <th>Initials</th>
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
                                            <td>
                                                <li>
                                                   
                                                    <a class="btn btn-danger"   
                                                    href="#"
                                                        onclick="
                                                        var result = confirm('Are you sure you wish to delete {{ $course->name . $course->academic_year }}?');
                                                            if( result ){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form').submit();
                                                            }
                                                                "
                                                                >Delete</a>
                                      
                                                    <form id="delete-form" action="{{ route('courses.destroy',[$course->id]) }}" 
                                                      method="POST" style="display: none;">
                                                              <input type="hidden" name="_method" value="delete">
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
        
                        <div class="container-fluid">
                            <div class="alert alert-warning">
                                <strong>Currently no Courses <a class="btn btn-warning pull-right" href="/courses/create">Create</a> </strong>
                            </div>
                        </div>
                            
                        @endif
                        
                    </ul>
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
