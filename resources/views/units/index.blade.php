@extends('layouts.inc')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">

            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div><div class="row">
        <div class="col-md-9">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue">
                    
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-desc">Units</h3>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        @if (count($units)>0)
        
                            <div class="container-fluid table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#id</th>
                                            <th>Name</th>
                                            <th>Unit code</th>
                                            
                                        </tr>
                                    </thead>
            
                                    <tbody>
                                        @foreach ($units as $unit)
                                        <tr>
                                            <td>{{ $unit->id }}</td>
                                            <td>{{ $unit->name }}</td>
                                            <td>{{ $unit->unit_code }}</td>
                                            
                                            <td>
                                                <li>
                                                   
                                                    <a class="btn btn-danger"   
                                                    href="#"
                                                        onclick="
                                                        var result = confirm('Are you sure you wish to delete {{ $unit->name .' Unit code: '. $unit->unit_code }} ?');
                                                            if( result ){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form').submit();
                                                            }
                                                                "
                                                                >Delete</a>
                                      
                                                    <form id="delete-form" action="{{ route('units.destroy',[$unit->id]) }}" 
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
                                <strong>Currently no Units <a class="btn btn-warning pull-right" href="/units/create">Create</a> </strong>
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
                            <li><a href="/units">All Units</a></li>
                            <li><a href="/units/create">Create Unit</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection