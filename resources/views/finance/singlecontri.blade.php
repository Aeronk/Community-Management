@extends('layout')
@section('title')
Denominations
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

<table class="table table-striped table-bordered">
	<thead>
		<tr class="">
<!--th width="40%"><h2></h2></th>
	<th width="60%"><h2></h2></th-->
	</tr>
</thead>  
<tbody>   
	<tr>
		<td><b style="font-family:serif;font-size:15px">Ministry</b></td>
		<td>{{$individualContribution->denomination_id}}</td>
	</tr> 
	<tr>
		<td><b style="font-family:serif;font-size:15px">Received From</b></td>
		<td>Singazivi Vengesayi</td></tr> <tr><td><b style="font-family:serif;font-size:15px">Contribution Type</b></td><td>Offering</td>
		</tr>

		<tr><td><b style="font-family:serif;font-size:15px">Amount</b></td><td>200.00</td>
		</tr>
		<tr><td><b style="font-family:serif;font-size:15px">Date Income</b></td><td>2018-04-15</td>
		</tr>
		<tr>
			<td><b style="font-family:serif;font-size:15px">Captured By</b></td><td>Mashingaidze</td>
		</tr>
		<tr>
			<td><b style="font-family:serif;font-size:15px">Date Captured</b></td>
			<td>2018-04-16 03:49:20</td></tr> <tr><td><b style="font-family:serif;font-size:15px">Administrator</b></td>
				<td>Mashingaidze</td>
			</tr>
		<tr>
			<td><b style="font-family:serif;font-size:15px">Comment</b></td>
			<td></td>
		</tr>                     


		</tbody>                 


	</table>

	 </div>
    	
    	
    </div>
@endsection
@section('footer')
	@parent
 
@endsection

@section('page-scripts')

  @include('partials.flash-swal')
@endsection