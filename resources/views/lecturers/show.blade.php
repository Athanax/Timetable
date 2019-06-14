@extends('layouts.inc')

@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
            
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username">{{ $lecturer->name }}</h3>
            <h5 class="widget-user-desc">{{ $lecturer->email }} </h5>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <h4 class="col-md-offset-1">Units taught</h4>
                    @if (count($my_units)>0)
                        <div class="container-fluid table-responsive">
                            <table class="table">
                                <tr>
                                    <th>#id</th>
                                    <th>Unit name</th>
                                    <th>Unit code</th>
                                    
                                </tr>
                                <tbody>
                                    @foreach ($my_units as $unit)
                                        <tr>
                                            <td>{{ $unit->id }}</td>
                                            <td>{{ $unit->unit_name }}</td>
                                            <td>{{ $unit->unit_code }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                        
                    @else
                        <div class="alert alert-warning">
                            <strong>Zero units</strong>
                        </div>
                    @endif
                </ul>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header">
                <h4 class="col-md-offset-1">Add unit</h4>
            </div>
            <div class="box-body">
                <div class="comtainer-fluid">
                    <form action="{{ route('lecturers.add_unit') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" required readonly name="lecturer_id" value="{{ $lecturer->id }}">
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