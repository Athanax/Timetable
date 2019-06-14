@extends('layouts.inc')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue">
                    
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-desc">Lecturers</h3>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        @if (count($lecturers)>0)
        
                            <div class="container-fluid table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Joined</th>
                                        </tr>
                                    </thead>
            
                                    <tbody>
                                        @foreach ($lecturers as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td><a href="/lecturers/{{ $user->id }}">{{ $user->name }}</a></td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <li>
                                                   
                                                    <a class="btn btn-danger"   
                                                    href="#"
                                                        onclick="
                                                        var result = confirm('Are you sure you wish to delete {{ $user->name . $user->academic_year }}?');
                                                            if( result ){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form').submit();
                                                            }
                                                                "
                                                                >Delete</a>
                                      
                                                    <form id="delete-form" action="{{ route('lecturers.destroy',[$user->id]) }}" 
                                                      method="POST" style="display: none;">
                                                        <input type="hidden" name="_method" value="delete">
                                                        {{ csrf_field() }}
                                                    <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
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
                                <strong>Currently no Lecturers <a class="btn btn-warning pull-right" href="/lecturers/create">Create</a> </strong>
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
                            <li><a href="/lecturers">All Lecturers</a></li>
                            <li><a href="/lecturers/create">Create Lecturer</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
@endsection
