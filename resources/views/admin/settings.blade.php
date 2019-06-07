
@extends('layout')
@section('title','All Users')

@section('header')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')

    <div class="am-content">
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tab-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#title" data-toggle="tab">Title</a></li>
                                <li><a href="#province" data-toggle="tab">Province</a></li>
                                <li><a href="#zone" data-toggle="tab">Zones</a></li>
                                <li><a href="#category" data-toggle="tab">Categories</a></li>
                                <li><a href="#country" data-toggle="tab">Other<br>Countries</a></li>
                                <li><a href="#marital_status" data-toggle="tab">Marital<br>Status</a></li>
                                <li><a href="#account" data-toggle="tab">Accounts</a></li>
                                <li><a href="#payment_method" data-toggle="tab">Payment<br>Methods</a></li>
                                <li><a href="#expenditure_type" data-toggle="tab">Expenditure<br>Type</a></li>
                                <li><a href="#contribution_type" data-toggle="tab">Contribution<br>Type</a></li>
                                <li><a href="#activity_type" data-toggle="tab">Activity<br>Type</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active" id="title"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"
                                                style="margin-bottom:10px;">
                                            Add Title
                                        </button>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Operations</th>
                                            </tr>
                                            </thead>
                                            {{--<tbody>
                                            @foreach($positions as $pos)
                                                <tr>
                                                    <td>{{$pos->title}}</td>
                                                    @if($pos->trackable==1)
                                                        <td>
                                                            <button class="btn btn-info">Trackable</button>
                                                        </td>
                                                    @endif
                                                    @if($pos->trackable==2 OR $pos->trackable==NULL)
                                                        <td>
                                                            <button class="btn btn-danger">Not Trackable</button>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ route('position-edit', $pos->id) }}"
                                                           class="btn btn-danger btn-xs" data-toggle="modal"
                                                           data-target="#"
                                                           data-id="{{$pos->id}}"><i class="icon s7-pen"></i></a>

                                                        <a href="{{ route('positions.destroy', $pos->id) }}"
                                                           data-method="DELETE"
                                                           data-id="{{ $pos->id }}" class="btn btn-danger btn-xs"><i
                                                                    class="icon s7-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>--}}

                                        </table>
                                        <!-- The Modal -->
                                        <div class="modal fade" id="myModal1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add Title</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post" action="#{{--{{ route('positions.store') }}--}}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="title">Title</label>
                                                                <input type="text" class="form-control" placeholder="Title Name"
                                                                       name="title">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block" value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- end Tab panes fade-->
                                <div class="tab-pane fade active" id="province"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myProvince"
                                                style="margin-bottom:10px;">
                                            Add Province
                                        </button>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Operations</th>
                                            </tr>
                                            </thead>
                                            {{--<tbody>
                                            @foreach($positions as $pos)
                                                <tr>
                                                    <td>{{$pos->title}}</td>
                                                    @if($pos->trackable==1)
                                                        <td>
                                                            <button class="btn btn-info">Trackable</button>
                                                        </td>
                                                    @endif
                                                    @if($pos->trackable==2 OR $pos->trackable==NULL)
                                                        <td>
                                                            <button class="btn btn-danger">Not Trackable</button>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ route('position-edit', $pos->id) }}"
                                                           class="btn btn-danger btn-xs" data-toggle="modal"
                                                           data-target="#"
                                                           data-id="{{$pos->id}}"><i class="icon s7-pen"></i></a>

                                                        <a href="{{ route('positions.destroy', $pos->id) }}"
                                                           data-method="DELETE"
                                                           data-id="{{ $pos->id }}" class="btn btn-danger btn-xs"><i
                                                                    class="icon s7-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>--}}

                                        </table>
                                        <!-- The Modal -->
                                        <div class="modal fade" id="myProvince">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add Province</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post" action="#{{--{{ route('positions.store') }}--}}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="province">Province</label>
                                                                <input type="text" class="form-control" placeholder="Province Name"
                                                                       name="province">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block" value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- end Tab panes fade-->
                                <div class="tab-pane fade active" id="zone"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myZone"
                                                style="margin-bottom:10px;">
                                            Add Zone
                                        </button>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Operations</th>
                                            </tr>
                                            </thead>
                                            {{--<tbody>
                                            @foreach($positions as $pos)
                                                <tr>
                                                    <td>{{$pos->title}}</td>
                                                    @if($pos->trackable==1)
                                                        <td>
                                                            <button class="btn btn-info">Trackable</button>
                                                        </td>
                                                    @endif
                                                    @if($pos->trackable==2 OR $pos->trackable==NULL)
                                                        <td>
                                                            <button class="btn btn-danger">Not Trackable</button>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ route('position-edit', $pos->id) }}"
                                                           class="btn btn-danger btn-xs" data-toggle="modal"
                                                           data-target="#"
                                                           data-id="{{$pos->id}}"><i class="icon s7-pen"></i></a>

                                                        <a href="{{ route('positions.destroy', $pos->id) }}"
                                                           data-method="DELETE"
                                                           data-id="{{ $pos->id }}" class="btn btn-danger btn-xs"><i
                                                                    class="icon s7-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>--}}

                                        </table>
                                        <!-- The Modal -->
                                        <div class="modal fade" id="myZone">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add Zone</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post" action="#{{--{{ route('positions.store') }}--}}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="zone">Zone</label>
                                                                <input type="text" class="form-control" placeholder="Zone Name"
                                                                       name="zone">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block" value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- end Tab panes fade-->
                                <div class="tab-pane fade active" id="category"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myZone"
                                                style="margin-bottom:10px;">
                                            Add Zone
                                        </button>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Operations</th>
                                            </tr>
                                            </thead>
                                            {{--<tbody>
                                            @foreach($positions as $pos)
                                                <tr>
                                                    <td>{{$pos->title}}</td>
                                                    @if($pos->trackable==1)
                                                        <td>
                                                            <button class="btn btn-info">Trackable</button>
                                                        </td>
                                                    @endif
                                                    @if($pos->trackable==2 OR $pos->trackable==NULL)
                                                        <td>
                                                            <button class="btn btn-danger">Not Trackable</button>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ route('position-edit', $pos->id) }}"
                                                           class="btn btn-danger btn-xs" data-toggle="modal"
                                                           data-target="#"
                                                           data-id="{{$pos->id}}"><i class="icon s7-pen"></i></a>

                                                        <a href="{{ route('positions.destroy', $pos->id) }}"
                                                           data-method="DELETE"
                                                           data-id="{{ $pos->id }}" class="btn btn-danger btn-xs"><i
                                                                    class="icon s7-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>--}}

                                        </table>
                                        <!-- The Modal -->
                                        <div class="modal fade" id="myZone">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add Zone</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post" action="#{{--{{ route('positions.store') }}--}}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="zone">Zone</label>
                                                                <input type="text" class="form-control" placeholder="Zone Name"
                                                                       name="zone">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block" value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- end Tab panes fade-->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
