@extends('layouts.inc')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="container-fluid">
                    <form action="{{ route('courses.store') }}" method="POST">
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
                                <label class="col-md-4" for="">Initials</label>
                                <div class="col-md-8">
                                    <input required class="form-control" type="text" name="initials">
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4" for="">Academic year</label>
                                <div class="col-md-8">
                                    <select class="select2 form-control" name="academic_year" id="">
                                        <option value="Y1S1">Y1S1</option>
                                        <option value="Y1S2">Y1S2</option>
                                        <option value="Y2S1">Y2S1</option>
                                        <option value="Y2S2">Y2S2</option>
                                        <option value="Y3S1">Y3S1</option>
                                        <option value="Y3S2">Y3S2</option>
                                        <option value="Y4S1">Y4S1</option>
                                        <option value="Y4S2">Y4S2</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4" for="">Capacity</label>
                                <div class="col-md-8">
                                    <input required class="form-control" type="number" name="capacity">
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