@extends('layout')
@section('title')
Expense
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

				<a href="{{ route('expenses.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-hand"></i>Back
					to listing</a><br>


			</div>
			<div class="row">

<table class="table table-striped table-bordered">
	<thead>
		<tr class="">
<!--th width="40%"><h2></h2></th>
	<th width="60%"><h2></h2></th-->
	</tr>
</thead>  
<tbody>   
	{{-- <tr>
		<td><b style="font-family:serif;font-size:15px">Denomination</b></td>
		<td>{{$expense->dname}}</td>
	</tr> --}} 
	<tr>
		<td><b style="font-family:serif;font-size:15px">Expenditure</b></td>
		<td>{{$expense->expenditure}}</td></tr>
		 <tr>
		 	<td><b style="font-family:serif;font-size:15px">Transaction ID</b></td>
		 	<td>{{$expense->transaction_id}}</td>
		</tr>

		<tr><td><b style="font-family:serif;font-size:15px">Amount</b></td><td>{{$expense->amount}}</td>
		</tr>
		<tr><td><b style="font-family:serif;font-size:15px">Date Added</b></td><td>{{$expense->date_added}}</td>
		</tr>
	
		<tr>
			<td><b style="font-family:serif;font-size:15px">Date Captured</b></td>
			<td>{{$expense->created_at}}</td>
		</tr>

	

		</tbody>                 


	</table>
			</div>
	 </div>
    	
    	
    </div>
@endsection
@section('footer')
	@parent
 
@endsection

@section('page-scripts')


@endsection
