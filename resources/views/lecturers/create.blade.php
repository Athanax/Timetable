@extends('layouts.inc')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="container-fluid">
                    <form action="{{ route('lecturers.store') }}" method="POST">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4" for="">Academic year</label>
                                <div class="col-md-8">
                                    <select class="select2 form-control" name="lecturer_id" id="">
                                        @foreach ($lecturers as $lecturer)
                                            <option selected disabled>Select a lecturer</option>
                                            <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                                        @endforeach
                                        
                                        
                                    </select>
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
                            <li><a href="/lecturers">All Lecturers</a></li>
                            <li><a href="/lecturers/create">Create Lecturer</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection