@extends('layout')
@section('title','General Settings')

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
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myModal1"
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
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ route('title.store') }}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="title">Title</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Title Name"
                                                                       name="title">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- end Tab panes fade-->
                                <div class="tab-pane fade" id="province"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myProvince"
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
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="#{{--{{ route('positions.store') }}--}}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="province">Province</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Province Name"
                                                                       name="province">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- end Tab panes fade-->
                                <div class="tab-pane fade" id="zone"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myZone"
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
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="#{{--{{ route('positions.store') }}--}}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="zone">Zone</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Zone Name"
                                                                       name="zone">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- end Tab panes fade-->
                                <div class="tab-pane fade" id="category"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myCategory"
                                                style="margin-bottom:10px;">
                                            Add Category
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
                                        <div class="modal fade" id="myCategory">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add Category</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="#{{--{{ route('positions.store') }}--}}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="category">Category</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Category Name"
                                                                       name="category">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- end Tab panes fade-->
                                <div class="tab-pane fade" id="country"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myCountry"
                                                style="margin-bottom:10px;">
                                            Add Other Country
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
                                        <div class="modal fade" id="myCountry">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add Other Country</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="#{{--{{ route('positions.store') }}--}}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Country Name"
                                                                       name="country">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- end Tab panes fade-->
                                <div class="tab-pane fade" id="marital_status"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myMaritalStatus"
                                                style="margin-bottom:10px;">
                                            Add Marital Status
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
                                        <div class="modal fade" id="myMaritalStatus">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add Marital Status</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="#{{--{{ route('positions.store') }}--}}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="marital_status">Marital Status</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Marital Status"
                                                                       name="marital_status">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- end Tab panes fade-->
                                <div class="tab-pane fade" id="account"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myAccount"
                                                style="margin-bottom:10px;">
                                            Add Accounts
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
                                        <div class="modal fade" id="myAccount">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add Accounts</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="#{{--{{ route('positions.store') }}--}}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="account">Account</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Account Name"
                                                                       name="account">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- end Tab panes fade-->
                                <div class="tab-pane fade" id="payment_method"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myPaymentMethod"
                                                style="margin-bottom:10px;">
                                            Add Payment Method
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
                                        <div class="modal fade" id="myPaymentMethod">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add Payment Method</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="#{{--{{ route('positions.store') }}--}}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="payment_method">Payment method</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Payment Method"
                                                                       name="payment_method">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- end Tab panes fade-->
                                <div class="tab-pane fade" id="expenditure_type"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myExpenditureType"
                                                style="margin-bottom:10px;">
                                            Add Expenditure Type
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
                                        <div class="modal fade" id="myExpenditureType">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add Expenditure Type</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="#{{--{{ route('positions.store') }}--}}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="expenditure_type">Expenditure Type</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Expenditure Type"
                                                                       name="expenditure_type">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- end Tab panes fade-->
                                <div class="tab-pane fade" id="contribution_type"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myContributionType"
                                                style="margin-bottom:10px;">
                                            Add Contribution Type
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
                                        <div class="modal fade" id="myContributionType">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add Contribution Type</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="#{{--{{ route('positions.store') }}--}}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="contribution_type">Contribution Type</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Contribution Type"
                                                                       name="contribution_type">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- end Tab panes fade-->
                                <div class="tab-pane fade" id="activity_type"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myActivityType"
                                                style="margin-bottom:10px;">
                                            Add Activity Type
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
                                        <div class="modal fade" id="myActivityType">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add Activity Type</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="#{{--{{ route('positions.store') }}--}}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="activity_type">Activity Type</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Activity Type"
                                                                       name="activity_type">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Save">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
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
    </div>
@endsection
@section('page-scripts')
    @include('partials.flash-swal')
@endsection