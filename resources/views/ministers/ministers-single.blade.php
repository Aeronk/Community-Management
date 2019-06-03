@extends('layout')

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
                        <a href="{{ route('minister.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-hand"></i>Back to listing</a>
                   
                </div>
            	<div class="row">
                   
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h2>Organizational Information</h2>
                        </div>
                        <div class="panel-body">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Name of Denomination</td>
                                        <td>{{ $minister->denomination->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ $minister->title }} {{ $minister->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name of the Pastor</td>
                                        <td>{{ $minister->first_name }} {{ $minister->last_name }}</td>
                                    </tr> 
                                    <tr>
                                        <td>Gender</td>
                                        <td>{{ $minister->gender }}</td>
                                    </tr>
                                    <tr>
                                         <td>Email</td>
                                        <td>{{ $minister->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telephone</td>
                                        <td>{{ $minister->home_tel }}</td>  
                                    </tr>
                                    <tr>
                                        <td>Number of members</td>
                                        <td>{{ $minister->number_members }}</td>
                                    </tr>
                                     <tr>
                                          <td>Province</td>
                                        <td>{{ $minister->province }}</td>  
                                    </tr>
                                    <tr>
                                        <td>Zone</td>
                                        <td>{{ $minister->region }}</td>  
                                    </tr>
                                    <tr>
                                          <td>Physical Address</td>
                                        <td>{{ $minister->address }}</td>  
                                    </tr>
                                    <tr>
                                        <td>Branch \ Assembly</td>
                                        <td>{{ $minister->branch }}</td>
                                    </tr>
                                    <tr>
                                        <td>Position</td>
                                        <td>{{ $minister->position }}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ $minister->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Marita status</td>
                                        <td>{{ $minister->marital_status }}</td>
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