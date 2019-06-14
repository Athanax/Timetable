@extends('layouts.inc')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="container-fluid">
                    <div class="box box-primary">
                        <div class="box-heading">
                            <h4 class="col-md-offset-1">Create a new room</h4>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('rooms.store') }}" method="POST">
                                {{ csrf_field() }}
                                
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4" for="">Room name</label>
                                        <div class="col-md-8">
                                            <input required type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4" for="">Block name</label>
                                        <div class="col-md-8">
                                            <input required type="text" class="form-control" name="block_name">
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4" for="">Capacity</label>
                                        <div class="col-md-8">
                                            <input required type="text" class="form-control" name="capacity">
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <input  type="submit" class="btn btn-primary pull-right">
        
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-widget widget-user-2">
                    
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a href="/rooms">All Lecturers</a></li>
                            <li><a href="/rooms/create">Create Lecturer</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection