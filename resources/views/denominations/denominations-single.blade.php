@extends('layout')
@section('title')
{{ $denomination->name }}
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

                        <a href="{{ route('denomination.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-hand"></i>Back to listing</a><br>
                   
                    
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
                                        <td>Name of denomination</td>
                                        <td>{{ $denomination->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Year of founding</td>
                                        <td>{{ $denomination->year_found }}</td>
                                    </tr>
                                    <tr>
                                         <td>Number of branches</td>
                                        <td>{{ $denomination->number_of_branches }}</td>
                                    </tr>
                                    <tr>
                                        <td>Number of members</td>
                                        <td>{{ $denomination->number_of_members }}</td>
                                    </tr>

                                    <tr>
                                        <td>Category(Number of Members)</td>
                                        <td>{{ $denomination->category }}</td>
                                    </tr> 
                                    <tr>
                                        <td>Subscription Balance</td>
                                        <td>{{ $denomination->sub_balance }}</td>
                                    </tr>

                                    <tr>
                                        <td>Other countries you're in</td>
                                        <td>{{ $denomination->countries_spread }}</td>  
                                    </tr>
                                    <tr>
                                          <td>HQ Physical Address</td>
                                        <td>{{ $denomination->hq_address }}</td>  
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                         <div class="panel-heading">
                            <h2>HOD INFORMATION</h2>
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
                                        <td>Title</td>
                                        <td>{{ $denomination->hod->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td>{{ $denomination->hod->first_name }}</td>
                                    </tr>
                                    <tr>
                                         <td>Home Telephone</td>
                                        <td>{{ $denomination->hod->home_tel }}</td>
                                    </tr>
                                    <tr>
                                        <td>Marital Status</td>
                                        <td>{{ $denomination->hod->marital_status }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>{{ $denomination->hod->gender }}</td>  
                                    </tr>
                                    <tr>
                                          <td>Are you the HOD or Representative</td>
                                        <td>{{ $denomination->hod->hod_or_rep }}</td>  
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                          <div class="panel-heading">
                            <h2>Key Contact INFORMATION</h2>
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
                                        <td><h3>Finance and Administration</h3></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Full Name</td>
                                        <td>{{ $denomination->contact->fafullname }}</td>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td>{{ $denomination->contact->facontact_number }}</td>
                                    </tr>
                                    <tr>
                                         <td>Email</td>
                                        <td>{{ $denomination->contact->faemail }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><h3>Women</h3></td>
                                        <td></td>
                                    </tr>
                                     <tr>
                                        <td>Full Name</td>
                                        <td>{{ $denomination->contact->wfullname }}</td>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td>{{ $denomination->contact->wcontact_number }}</td>
                                    </tr>
                                    <tr>
                                         <td>Email</td>
                                        <td>{{ $denomination->contact->wemail }}</td>
                                    </tr>
                                    <tr>
                                        <td><h3>Youth</h3></td>
                                        <td></td>
                                    </tr>
                                     <tr>
                                        <td>Full Name</td>
                                        <td>{{ $denomination->contact->yfullname }}</td>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td>{{ $denomination->contact->ycontact_number }}</td>
                                    </tr>
                                    <tr>
                                         <td>Email</td>
                                        <td>{{ $denomination->contact->yemail }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                          <div class="panel-heading">
                            <h2>Commissions</h2>
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
                                        <th>Reseach and Development Commission (RDC)</th>
                                       
                                        <td> @foreach($denomination->commissions()->research_and_dev as $item)
                                                <span class="label label-default">{{ $item }}</span>
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <th>Gender Development Commission (GDC)</th>
                                        <td>
                                            @foreach($denomination->commissions()->gender_dev as $item)
                                                <span class="label label-default">{{ $item }}</span>
                                            @endforeach

                                        </td>
                                    </tr>
                                    <tr>
                                         <th>Humanitarian Relief Development (HRD)</th>
                                        <td> @foreach($denomination->commissions()->humanitarian as $item)
                                                <span class="label label-default">{{ $item }}</span>
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <th>Peace and Justice Commission (PJC)</th>
                                        <td> @foreach($denomination->commissions()->peace_justice as $item)
                                                <span class="label label-default">{{ $item }}</span>
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <th>Commission for Ministry Development (CMD)s</th>
                                        <td> @foreach($denomination->commissions()->comm_for_min as $item)
                                                <span class="label label-default">{{ $item }}</span>
                                            @endforeach</td>  
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-heading">
                            <h2>Programs</h2>
                        </div>
                        <div class="panel-body">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Programs</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($denomination->programs as $program)

                                        <td>{{$program->programs}}</td>
                                            
                                        @endforeach
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