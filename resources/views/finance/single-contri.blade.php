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
		<td><b style="font-family:serif;font-size:15px">Denomination</b></td>
		<td>{{$individualcontribution->denomination->name}}</td>
	</tr> 
	<tr>
		<td><b style="font-family:serif;font-size:15px">Recieved From</b></td>
		<td>{{$individualcontribution->received_from}}</td></tr>
		 <tr>
		 	<td><b style="font-family:serif;font-size:15px">Contribution Type</b></td>
		 	<td>{{$individualcontribution->type}}</td>
		</tr>

		<tr><td><b style="font-family:serif;font-size:15px">Amount</b></td><td>{{$individualcontribution->amount}}</td>
		</tr>
		<tr><td><b style="font-family:serif;font-size:15px">Date Income</b></td><td>{{$individualcontribution->date_recieved}}</td>
		</tr>
		<tr>
			<td><b style="font-family:serif;font-size:15px">Captured By</b></td>
			<td>Mashingaidze</td>
		</tr>
		<tr>
			<td><b style="font-family:serif;font-size:15px">Date Captured</b></td>
			<td>{{$individualcontribution->created_at}}</td>
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


@endsection
