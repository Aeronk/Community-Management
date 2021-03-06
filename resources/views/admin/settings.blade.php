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
                                <div class="tab-pane active cont" id="title"><!-- start Tab panes fade-->
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
                                            <tbody>
                                            @foreach($titles as $pos)
                                                <tr>
                                                    <td>{{$pos->name}}</td>
                                                    <td>

                                                        <button class="btn btn-warning btn-xs open_edit_title_modal"
                                                                value="{{$pos->id}}" data-toggle="modal"
                                                                data-target="#myModalEdit"
                                                        ><i class="icon s7-pen"></i></button>

                                                        <button class="btn btn-danger btn-xs delete_title"
                                                                value="{{$pos->id}}"><i class="icon s7-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

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
                                        <div class="modal fade" id="myModalEdit">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Title</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ route('update.title') }}">
                                                            {!! csrf_field() !!}
                                                            <input id="edit-title-id" type="hidden" class="form-control"
                                                                   name="id" value="">
                                                            <div class="form-group">
                                                                <label for="title">Title</label>
                                                                <input id="edit-title" type="text" class="form-control"
                                                                       name="title" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Update">
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
                                <div class="tab-pane cont" id="province"><!-- start Tab panes fade-->
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
                                            @foreach($provinces as $prov)
                                                <tr>
                                                    <td>{{$prov->name}}</td>
                                                    <td>

                                                        <button class="btn btn-warning btn-xs open_edit_province_modal"
                                                                value="{{$prov->id}}" data-toggle="modal"
                                                                data-target="#myEditProvince"
                                                        ><i class="icon s7-pen"></i></button>

                                                        <button class="btn btn-danger btn-xs delete_province"
                                                                value="{{$prov->id}}"><i class="icon s7-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
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
                                                              action="{{ route('province.store') }}">
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
                                        <div class="modal fade" id="myEditProvince">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Province</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="{{ route('update.province') }}">
                                                            {!! csrf_field() !!}
                                                            <input id="edit-province-id" type="hidden"
                                                                   class="form-control"
                                                                   name="id" value="">
                                                            <div class="form-group">
                                                                <label for="title">Province</label>
                                                                <input id="edit-province" type="text"
                                                                       class="form-control"
                                                                       name="province" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Update">
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
                                <div class="tab-pane cont" id="zone"><!-- start Tab panes fade-->
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
                                                <th>Province</th>
                                                <th>Operations</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($zones as $zone)
                                                <tr>
                                                    <td>{{$zone->name}}</td>
                                                    <td>{{$zone->province->name??""}}</td>
                                                    <td>

                                                        <button class="btn btn-warning btn-xs open_edit_zone_modal"
                                                                value="{{$zone->id}}" data-toggle="modal"
                                                                data-target="#myEditZone"
                                                        ><i class="icon s7-pen"></i></button>

                                                        <button class="btn btn-danger btn-xs delete_zone"
                                                                value="{{$zone->id}}"><i class="icon s7-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

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
                                                              action="{{ route('zone.store') }}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="zone">Zone</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Zone Name"
                                                                       name="zone">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Select Province</label>
                                                                <select class="form-control select_item" name="province_id"
                                                                        required>
                                                                    @foreach($provinces as $pro)
                                                                        <option value="{{$pro->id}}">{{$pro->name}}</option>
                                                                    @endforeach
                                                                </select>
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
                                        <div class="modal fade" id="myEditZone">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Zone</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="{{ route('update.zone') }}">
                                                            {!! csrf_field() !!}
                                                            <input id="edit-zone-id" type="hidden"
                                                                   class="form-control"
                                                                   name="id" value="">
                                                            <div class="form-group">
                                                                <label for="zone">Zone</label>
                                                                <input id="edit-zone" type="text"
                                                                       class="form-control"
                                                                       name="zone" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Select Province</label>
                                                                <select class="form-control select_item" name="province_id"
                                                                        required>
                                                                    @foreach($provinces as $pro)
                                                                        <option value="{{$pro->id}}">{{$pro->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Update">
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
                                <div class="tab-pane cont" id="category"><!-- start Tab panes fade-->
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
                                            <tbody>
                                            @foreach($categories as $category)
                                                <tr>
                                                    <td>{{$category->name}}</td>
                                                    <td>

                                                        <button class="btn btn-warning btn-xs open_edit_category_modal"
                                                                value="{{$category->id}}" data-toggle="modal"
                                                                data-target="#myEditCategory"
                                                        ><i class="icon s7-pen"></i></button>

                                                        <button class="btn btn-danger btn-xs delete_category"
                                                                value="{{$category->id}}"><i class="icon s7-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

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
                                                              action="{{ route('categories.store') }}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="category">Category</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Category Name"
                                                                       name="category">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="category">Votes</label>
                                                                <input type="number" min="0" class="form-control"
                                                                       placeholder="Votes"
                                                                       name="votes">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="category">Subscriptions</label>
                                                                <input type="number" min="0" class="form-control"
                                                                       placeholder="Subscription"
                                                                       name="subscription">
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
                                        <div class="modal fade" id="myEditCategory">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Category</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="{{ route('update.category') }}">
                                                            {!! csrf_field() !!}
                                                            <input id="edit-category-id" type="hidden"
                                                                   class="form-control"
                                                                   name="id" value="">
                                                            <div class="form-group">
                                                                <label for="category">Category</label>
                                                                <input id="edit-category" type="text"
                                                                       class="form-control"
                                                                       name="category" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Update">
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
                                <div class="tab-pane cont" id="country"><!-- start Tab panes fade-->
                                    <h2 align="center" style="color:#68A4C4"></h2>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myCountry"
                                                style="margin-bottom:10px;">
                                            Add Country
                                        </button>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Operations</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($countries as $country)
                                                <tr>
                                                    <td>{{$country->name}}</td>
                                                    <td>

                                                        <button class="btn btn-warning btn-xs open_edit_country_modal"
                                                                value="{{$country->id}}" data-toggle="modal"
                                                                data-target="#myEditCountry"
                                                        ><i class="icon s7-pen"></i></button>

                                                        <button class="btn btn-danger btn-xs delete_country"
                                                                value="{{$country->id}}"><i class="icon s7-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

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
                                                              action="{{ route('country.store') }}">
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
                                        <div class="modal fade" id="myEditCountry">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Country</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="{{ route('update.country') }}">
                                                            {!! csrf_field() !!}
                                                            <input id="edit-country-id" type="hidden"
                                                                   class="form-control"
                                                                   name="id" value="">
                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <input id="edit-country" type="text"
                                                                       class="form-control"
                                                                       name="country" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Update">
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
                                <div class="tab-pane cont" id="marital_status"><!-- start Tab panes fade-->
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
                                            <tbody>
                                            @foreach($marital_statuses as $ms)
                                                <tr>
                                                    <td>{{$ms->name}}</td>
                                                    <td>

                                                        <button class="btn btn-warning btn-xs open_edit_ms_modal"
                                                                value="{{$ms->id}}" data-toggle="modal"
                                                                data-target="#myEditMaritalStatus"
                                                        ><i class="icon s7-pen"></i></button>

                                                        <button class="btn btn-danger btn-xs delete_ms"
                                                                value="{{$ms->id}}"><i class="icon s7-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

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
                                                              action="{{ route('marital_status.store') }}">
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
                                        <div class="modal fade" id="myEditMaritalStatus">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Marital Status</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="{{ route('update.marital_status') }}">
                                                            {!! csrf_field() !!}
                                                            <input id="edit-ms-id" type="hidden"
                                                                   class="form-control"
                                                                   name="id" value="">
                                                            <div class="form-group">
                                                                <label for="marital_status">Country</label>
                                                                <input id="edit-ms" type="text"
                                                                       class="form-control"
                                                                       name="marital_status" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Update">
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
                                <div class="tab-pane cont" id="account"><!-- start Tab panes fade-->
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
                                            <tbody>
                                            @foreach($accounts as $acc)
                                                <tr>
                                                    <td>{{$acc->name}}</td>
                                                    <td>

                                                        <button class="btn btn-warning btn-xs open_edit_account_modal"
                                                                value="{{$acc->id}}" data-toggle="modal"
                                                                data-target="#myEditAccount"
                                                        ><i class="icon s7-pen"></i></button>

                                                        <button class="btn btn-danger btn-xs delete_account"
                                                                value="{{$acc->id}}"><i class="icon s7-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

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
                                                              action="{{ route('account.store') }}">
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
                                        <div class="modal fade" id="myEditAccount">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Account</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="{{ route('update.account') }}">
                                                            {!! csrf_field() !!}
                                                            <input id="edit-account-id" type="hidden"
                                                                   class="form-control"
                                                                   name="id" value="">
                                                            <div class="form-group">
                                                                <label for="account">Account</label>
                                                                <input id="edit-account" type="text"
                                                                       class="form-control"
                                                                       name="account" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Update">
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
                                <div class="tab-pane cont" id="payment_method"><!-- start Tab panes fade-->
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
                                            <tbody>
                                            @foreach($payment_method as $payment)
                                                <tr>
                                                    <td>{{$payment->name}}</td>
                                                    <td>

                                                        <button class="btn btn-warning btn-xs open_edit_pm_modal"
                                                                value="{{$payment->id}}" data-toggle="modal"
                                                                data-target="#myEditPaymentMethod"
                                                        ><i class="icon s7-pen"></i></button>

                                                        <button class="btn btn-danger btn-xs delete_pm"
                                                                value="{{$payment->id}}"><i class="icon s7-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

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
                                                              action="{{ route('payment_method.store') }}">
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
                                        <div class="modal fade" id="myEditPaymentMethod">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Payment Method</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="{{ route('update.payment_method') }}">
                                                            {!! csrf_field() !!}
                                                            <input id="edit-pm-id" type="hidden"
                                                                   class="form-control"
                                                                   name="id" value="">
                                                            <div class="form-group">
                                                                <label for="pm">Payment Method</label>
                                                                <input id="edit-pm" type="text"
                                                                       class="form-control"
                                                                       name="payment_method" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Update">
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
                                <div class="tab-pane cont" id="expenditure_type"><!-- start Tab panes fade-->
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
                                            <tbody>
                                            @foreach($expenditure_types as $expenditure)
                                                <tr>
                                                    <td>{{$expenditure->name}}</td>
                                                    <td>

                                                        <button class="btn btn-warning btn-xs open_edit_et_modal"
                                                                value="{{$expenditure->id}}" data-toggle="modal"
                                                                data-target="#myEditExpenditureType"
                                                        ><i class="icon s7-pen"></i></button>

                                                        <button class="btn btn-danger btn-xs delete_et"
                                                                value="{{$expenditure->id}}"><i class="icon s7-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
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
                                                              action="{{ route('expenditure_type.store') }}">
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
                                        <div class="modal fade" id="myEditExpenditureType">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Expenditure Type</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="{{ route('update.expenditure_type') }}">
                                                            {!! csrf_field() !!}
                                                            <input id="edit-et-id" type="hidden"
                                                                   class="form-control"
                                                                   name="id" value="">
                                                            <div class="form-group">
                                                                <label for="et">Expenditure Type</label>
                                                                <input id="edit-et" type="text"
                                                                       class="form-control"
                                                                       name="expenditure_type" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Update">
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
                                <div class="tab-pane cont" id="contribution_type"><!-- start Tab panes fade-->
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
                                            <tbody>
                                            @foreach($contribution_types as $contribution)
                                                <tr>
                                                    <td>{{$contribution->name}}</td>
                                                    <td>

                                                        <button class="btn btn-warning btn-xs open_edit_ct_modal"
                                                                value="{{$contribution->id}}" data-toggle="modal"
                                                                data-target="#myEditContributionType"
                                                        ><i class="icon s7-pen"></i></button>

                                                        <button class="btn btn-danger btn-xs delete_ct"
                                                                value="{{$contribution->id}}"><i class="icon s7-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

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
                                                              action="{{ route('contribution_type.store') }}">
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
                                        <div class="modal fade" id="myEditContributionType">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Contribution Type</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="{{ route('update.contribution_type') }}">
                                                            {!! csrf_field() !!}
                                                            <input id="edit-ct-id" type="hidden"
                                                                   class="form-control"
                                                                   name="id" value="">
                                                            <div class="form-group">
                                                                <label for="ct">Contribution Type</label>
                                                                <input id="edit-ct" type="text"
                                                                       class="form-control"
                                                                       name="contribution_type" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Update">
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
                                <div class="tab-pane cont" id="activity_type"><!-- start Tab panes fade-->
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
                                                <th>Description</th>
                                                <th>Operations</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($activity_types as $activity)
                                                <tr>
                                                    <td>{{$activity->name}}</td>
                                                    <td>{{$activity->description}}</td>
                                                    <td>

                                                        <button class="btn btn-warning btn-xs open_edit_at_modal"
                                                                value="{{$activity->id}}" data-toggle="modal"
                                                                data-target="#myEditActivityType"
                                                        ><i class="icon s7-pen"></i></button>

                                                        <button class="btn btn-danger btn-xs delete_at"
                                                                value="{{$activity->id}}"><i class="icon s7-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

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
                                                              action="{{ route('activity_type.store') }}">
                                                            {!! csrf_field() !!}
                                                            <div class="form-group">
                                                                <label for="activity_type">Activity Type</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Activity Type"
                                                                       name="activity_type">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="activity_type_description">Description</label>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Description"
                                                                       name="description">
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
                                        <div class="modal fade" id="myEditActivityType">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Activity Type</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="{{ route('update.activity_type') }}">
                                                            {!! csrf_field() !!}
                                                            <input id="edit-at-id" type="hidden"
                                                                   class="form-control"
                                                                   name="id" value="">
                                                            <div class="form-group">
                                                                <label for="at">Activity Type</label>
                                                                <input id="edit-at" type="text"
                                                                       class="form-control"
                                                                       name="activity_type" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="atd">Description</label>
                                                                <input id="edit-atd" type="text"
                                                                       class="form-control"
                                                                       name="description" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-info btn-block"
                                                                       value="Update">
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
    <script>
        var url = "{!! env('APP_URL') !!}";

        // Title
        $('.open_edit_title_modal').on('click', function () {

            var title_id = $(this).val();

            $.get(url + '/title/' + title_id + '/edit', function (data) {
                //success data
                // console.log(data);
                $('#edit-title').val(data.name);
                $('#edit-title-id').val(data.id);
            })
        });

        $('.delete_title').on('click', function () {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this.",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                },
                dangerMode: true,

            })
                .then((willDelete) => {
                    if (willDelete) {

                        var title_id = $(this).val();

                        $.get(url + '/title/delete/' + title_id, function (response) {
                            //success data
                            if (response.answer === 'deleted') {
                                swal("Done!", "Title has been deleted successfully!", {
                                    icon: "success",
                                });
                                location.reload()
                            }
                        })
                    } /*else {
                        swal("Cool!", "Your title is safe!", {
                            icon: "success",
                        });
                    }*/
                });
        })

        // Province
        $('.open_edit_province_modal').on('click', function () {

            var province_id = $(this).val();

            $.get(url + '/province/' + province_id + '/edit', function (data) {
                //success data
                // console.log(data);
                $('#edit-province').val(data.name);
                $('#edit-province-id').val(data.id);
            })
        });

        $('.delete_province').on('click', function () {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this.",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                },
                dangerMode: true,

            })
                .then((willDelete) => {
                    if (willDelete) {

                        var province_id = $(this).val();

                        $.get(url + '/province/delete/' + province_id, function (response) {
                            //success data
                            if (response.answer === 'deleted') {
                                swal("Done!", "Province has been deleted successfully!", {
                                    icon: "success",
                                });
                                location.reload()
                            }
                        })
                    } /*else {
                        swal("Cool!", "Your province is safe!", {
                            icon: "success",
                        });
                    }*/
                });
        })

        // Zone
        $('.open_edit_zone_modal').on('click', function () {

            var zone_id = $(this).val();

            $.get(url + '/zone/' + zone_id + '/edit', function (data) {
                //success data
                console.log(data);
                $('#edit-zone').val(data.name);
                $('#edit-zone-id').val(data.id);
            })
        });

        $('.delete_zone').on('click', function () {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this.",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                },
                dangerMode: true,

            })
                .then((willDelete) => {
                    if (willDelete) {

                        var zone_id = $(this).val();

                        $.get(url + '/zone/delete/' + zone_id, function (response) {
                            //success data
                            if (response.answer === 'deleted') {
                                swal("Done!", "Zone has been deleted successfully!", {
                                    icon: "success",
                                });
                                location.reload()
                            }
                        })
                    } /*else {
                        swal("Cool!", "Your zone is safe!", {
                            icon: "success",
                        });
                    }*/
                });
        })

        // Category
        $('.open_edit_category_modal').on('click', function () {

            var category_id = $(this).val();

            $.get(url + '/categories/' + category_id + '/edit', function (data) {
                //success data
                console.log(data);
                $('#edit-category').val(data.name);
                $('#edit-category-id').val(data.id);
            })
        });

        $('.delete_category').on('click', function () {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this.",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                },
                dangerMode: true,

            })
                .then((willDelete) => {
                    if (willDelete) {

                        var category_id = $(this).val();

                        $.get(url + '/category/delete/' + category_id, function (response) {
                            //success data
                            if (response.answer === 'deleted') {
                                swal("Done!", "Category has been deleted successfully!", {
                                    icon: "success",
                                });
                                location.reload()
                            }
                        })
                    } /*else {
                        swal("Cool!", "Your zone is safe!", {
                            icon: "success",
                        });
                    }*/
                });
        })

        // Country
        $('.open_edit_country_modal').on('click', function () {

            var country_id = $(this).val();

            $.get(url + '/country/' + country_id + '/edit', function (data) {
                //success data
                console.log(data);
                $('#edit-country').val(data.name);
                $('#edit-country-id').val(data.id);
            })
        });

        $('.delete_country').on('click', function () {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this.",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                },
                dangerMode: true,

            })
                .then((willDelete) => {
                    if (willDelete) {

                        var country_id = $(this).val();

                        $.get(url + '/country/delete/' + country_id, function (response) {
                            //success data
                            if (response.answer === 'deleted') {
                                swal("Done!", "Country has been deleted successfully!", {
                                    icon: "success",
                                });
                                location.reload()
                            }
                        })
                    } /*else {
                        swal("Cool!", "Your zone is safe!", {
                            icon: "success",
                        });
                    }*/
                });
        })

        // Marital Status
        $('.open_edit_ms_modal').on('click', function () {

            var ms_id = $(this).val();

            $.get(url + '/marital_status/' + ms_id + '/edit', function (data) {
                //success data
                //console.log(data);
                $('#edit-ms').val(data.name);
                $('#edit-ms-id').val(data.id);
            })
        });

        $('.delete_ms').on('click', function () {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this.",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                },
                dangerMode: true,

            })
                .then((willDelete) => {
                    if (willDelete) {

                        var ms_id = $(this).val();

                        $.get(url + '/marital_status/delete/' + ms_id, function (response) {
                            //success data
                            if (response.answer === 'deleted') {
                                swal("Done!", "Marital status has been deleted successfully!", {
                                    icon: "success",
                                });
                                location.reload()
                            }
                        })
                    } /*else {
                        swal("Cool!", "Your zone is safe!", {
                            icon: "success",
                        });
                    }*/
                });
        })

        // Marital Status
        $('.open_edit_account_modal').on('click', function () {

            var account_id = $(this).val();

            $.get(url + '/account/' + account_id + '/edit', function (data) {
                //success data
                //console.log(data);
                $('#edit-account').val(data.name);
                $('#edit-account-id').val(data.id);
            })
        });

        $('.delete_account').on('click', function () {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this.",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                },
                dangerMode: true,

            })
                .then((willDelete) => {
                    if (willDelete) {

                        var account_id = $(this).val();

                        $.get(url + '/account/delete/' + account_id, function (response) {
                            //success data
                            if (response.answer === 'deleted') {
                                swal("Done!", "Account has been deleted successfully!", {
                                    icon: "success",
                                });
                                location.reload()
                            }
                        })
                    } /*else {
                        swal("Cool!", "Your zone is safe!", {
                            icon: "success",
                        });
                    }*/
                });
        })

        // Payment Method
        $('.open_edit_pm_modal').on('click', function () {

            var pm_id = $(this).val();

            $.get(url + '/payment_method/' + pm_id + '/edit', function (data) {
                //success data
                //console.log(data);
                $('#edit-pm').val(data.name);
                $('#edit-pm-id').val(data.id);
            })
        });

        $('.delete_pm').on('click', function () {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this.",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                },
                dangerMode: true,

            })
                .then((willDelete) => {
                    if (willDelete) {

                        var pm_id = $(this).val();

                        $.get(url + '/payment_method/delete/' + pm_id, function (response) {
                            //success data
                            if (response.answer === 'deleted') {
                                swal("Done!", "Payment method has been deleted successfully!", {
                                    icon: "success",
                                });
                                location.reload()
                            }
                        })
                    } /*else {
                        swal("Cool!", "Your zone is safe!", {
                            icon: "success",
                        });
                    }*/
                });
        })

        // Expenditure Type
        $('.open_edit_et_modal').on('click', function () {

            var et_id = $(this).val();

            $.get(url + '/expenditure_type/' + et_id + '/edit', function (data) {
                //success data
                //console.log(data);
                $('#edit-et').val(data.name);
                $('#edit-et-id').val(data.id);
            })
        });

        $('.delete_et').on('click', function () {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this.",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                },
                dangerMode: true,

            })
                .then((willDelete) => {
                    if (willDelete) {

                        var et_id = $(this).val();

                        $.get(url + '/expenditure_type/delete/' + et_id, function (response) {
                            //success data
                            if (response.answer === 'deleted') {
                                swal("Done!", "Expenditure type has been deleted successfully!", {
                                    icon: "success",
                                });
                                location.reload()
                            }
                        })
                    } /*else {
                        swal("Cool!", "Your zone is safe!", {
                            icon: "success",
                        });
                    }*/
                });
        })

        // Contribution Type
        $('.open_edit_ct_modal').on('click', function () {

            var ct_id = $(this).val();

            $.get(url + '/contribution_type/' + ct_id + '/edit', function (data) {
                //success data
                //console.log(data);
                $('#edit-ct').val(data.name);
                $('#edit-ct-id').val(data.id);
            })
        });

        $('.delete_ct').on('click', function () {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this.",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                },
                dangerMode: true,

            })
                .then((willDelete) => {
                    if (willDelete) {

                        var ct_id = $(this).val();

                        $.get(url + '/contribution_type/delete/' + ct_id, function (response) {
                            //success data
                            if (response.answer === 'deleted') {
                                swal("Done!", "Contribution type has been deleted successfully!", {
                                    icon: "success",
                                });
                                location.reload()
                            }
                        })
                    } /*else {
                        swal("Cool!", "Your zone is safe!", {
                            icon: "success",
                        });
                    }*/
                });
        })

        // Contribution Type
        $('.open_edit_at_modal').on('click', function () {

            var at_id = $(this).val();

            $.get(url + '/activity_type/' + at_id + '/edit', function (data) {
                //success data
                //console.log(data);
                $('#edit-at').val(data.name);
                $('#edit-atd').val(data.description);
                $('#edit-at-id').val(data.id);
            })
        });

        $('.delete_at').on('click', function () {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this.",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                },
                dangerMode: true,

            })
                .then((willDelete) => {
                    if (willDelete) {

                        var at_id = $(this).val();

                        $.get(url + '/activity_type/delete/' + at_id, function (response) {
                            //success data
                            if (response.answer === 'deleted') {
                                swal("Done!", "Activity type has been deleted successfully!", {
                                    icon: "success",
                                });
                                location.reload()
                            }
                        })
                    } /*else {
                        swal("Cool!", "Your zone is safe!", {
                            icon: "success",
                        });
                    }*/
                });
        })

    </script>
@endsection