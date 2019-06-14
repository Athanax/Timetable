@extends('layouts.inc')

@section('content')

<div class="row">
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-heading">
                <h4 class="col-md-offset-1">Assign Lecturer</h4>
            </div>
            <div class="box-body">
                <form action="{{ route('courses.assign_save') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="unit_id" value="{{ $lecture->unit_id }}">
                    <input type="hidden" name="course_id" value="{{ $lecture->course_id }}">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4" for="">Select a lecturer</label>
                            <div  class="col-md-8">
                                <select class="form-control" name="lecturer_id" id="">
                                    <option disabled selected >Select a lecturer</option>
                                    @foreach ($lecturers as $lecturer)
                                       <option value="{{ $lecturer->lecturer_id }}">{{ $lecturer->lecturer_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success pull-right">
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3">

    </div>
</div>
    
@endsection