@extends('layout')
@section('title')
{{ $bible->name }}
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

                <a href="{{ route('bible.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-hand"></i>Back to listing</a><br>


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
                                    <td>{{$bible->name}}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{$bible->address}}</td>
                                </tr>
                                <tr>
                                    <td>Mobile</td>
                                    <td>{{$bible->mobile}}</td>
                                </tr>
                                <tr>
                                    <td>Contact Person</td>
                                    <td>{{$bible->contact_person}}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{$bible->status}}</td>
                                </tr>
                                <tr>
                                    <td>Year of Founding</td>
                                    <td>{{$bible->year}}</td>
                                </tr>
                                <tr>
                                    <td>Founder</td>
                                    <td>{{$bible->founder}}</td>
                                </tr>
                                <tr>
                                    <td>Enrolment</td>
                                    <td>{{$bible->enrollment}}</td>
                                </tr>
                                <tr>
                                    <td>Branches</td>
                                    <td>{{$bible->number_of_branches}}</td>
                                </tr>
                                <tr>
                                    <td>Subscription Balance</td>
                                    <td>{{$bible->sub_balance}}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{$bible->category}}</td>
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
@section('page-scripts')

  @include('partials.flash-swal')
@endsection