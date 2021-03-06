@extends('layout')
@section('title')
{{$paraChurch->name}}
@endsection
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

                    <a href="{{ route('parachurch.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-hand"></i>Back to listing</a><br>
               
                
            </div>
        	<div class="row">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2>Organizational Information</h2>
                    </div>
                    <div class="panel-body">
                       <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{$paraChurch->name}}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>>{{$paraChurch->address}}</td>
                            </tr>
                            <tr>
                                <td>Mobile</td>
                                <td>{{$paraChurch->mobile}}</td>
                            </tr>
                            <tr>
                                <td>Contact Person</td>
                                <td>{{$paraChurch->contact_person}}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{$paraChurch->status}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$paraChurch->email}}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{$paraChurch->category}}</td>
                            </tr>
                            <tr>
                                <td>Year</td>
                                <td>{{$paraChurch->year??""}}</td>
                            </tr>
                            <tr>
                                <td>Number of branches</td>
                                <td>{{$paraChurch->number_of_branches??"0"}}</td>
                            </tr>
                            <tr>
                                <td>Number of members</td>
                                <td>{{$paraChurch->number_of_members??"0"}}</td>
                            </tr>
                            <tr>
                                <td>Sub balance</td>
                                <td>{{$paraChurch->sub_balance}}</td>
                            </tr>
                        </tbody>

                        </table>
                    </div>
                </div>     
                </div>                    

        	</div>
        </div>
    </div>
</div>
@endsection
@section('footer')
@parent

@endsection