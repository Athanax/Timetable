@extends('layouts.inc')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue">
                    
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-desc">Rooms</h3>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        @if (count($rooms)>0)
        
                            <div class="container-fluid table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#id</th>
                                            <th>Room name</th>
                                            <th>Block name</th>
                                            {{-- <th>Joined</th> --}}
                                        </tr>
                                    </thead>
            
                                    <tbody>
                                        @foreach ($rooms as $room)
                                        <tr>
                                            <td>{{ $room->id }}</td>
                                            <td><a href="/rooms/{{ $room->id }}">{{ $room->name }}</a></td>
                                            <td>{{ $room->block_name }}</td>
                                            {{-- <td>{{ $room->created_at }}</td> --}}
                                            <td>
                                                <li>
                                                   
                                                    <a class="btn btn-danger"   
                                                    href="#"
                                                        onclick="
                                                        var result = confirm('Are you sure you wish to delete {{ $room->name }}?');
                                                            if( result ){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form').submit();
                                                            }
                                                                ">Delete</a>
                                      
                                                    <form id="delete-form" action="{{ route('rooms.destroy',[$room->id]) }}" 
                                                      method="POST" style="display: none;">
                                                        <input type="hidden" name="_method" value="delete">
                                                        {{ csrf_field() }}
                                                    <input type="hidden" class="form-control" name="id" value="{{ $room->id }}">
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
                                <strong>Currently no Rooms <a class="btn btn-warning pull-right" href="/rooms/create">Create</a> </strong>
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
                            <li><a href="/rooms">All Rooms</a></li>
                            <li><a href="/rooms/create">Create Room</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
@endsection
