@extends('layouts.inc')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="container-fluid">
                    <form action="{{ route('units.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4" for="">Name</label>
                                <div class="col-md-8">
                                    <input required class="form-control" type="text" name="name">
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4" for="">Code</label>
                                <div class="col-md-8">
                                    <input required class="form-control" type="text" name="unit_code">
                                </div>
                            </div>
                            
                        </div>
                      
                        <input  type="submit" class="btn btn-primary pull-right">

                    </form>
                </div>
            </div>
            <div class="col-md-3">
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