
@extends('layout')
@section('title')
Expenses
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


<h2>Expenses</h2>
<table class="table table-striped" id="tableE">
	<thead>
		<tr>
			<th>Date</th>
			<th>Expense type</th>
			<th>Transaction Id</th>
			<th>Amount</th>
			<th>Operations</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach($expenses as $expense)
		<tr>
			<td>{{$expense->date_added}}</td>
			<td>{{$expense->expenditure}}</td>
			<td>{{$expense->transaction_id}}</td>
			<td>{{$expense->amount}}</td>
		
			<td>
			<a class="btn btn-danger btn-xs" href="{{ route('expenses.show', $expense->id) }}"><i class="icon s7-search icon-sm"></i> 
			</a> 
			<a  class="btn btn-danger btn-xs" href="{{ route('expenses.edit', $expense->id) }}"><i class="icon s7-pen"></i></a>

			<a  class="btn btn-danger btn-xs" href="{{ route('expenses.destroy', $expense->id) }}"><i class="icon s7-trash"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>
	
</table>
</div>
		</div>
		@endsection

@section('footer')
@parent



@endsection
@section('page-scripts')
  <script type="text/javascript">
    $(document).ready(function(){

    $('#tableE').DataTable({
                            dom: 'Bfrtip',
		buttons: [
			{
				extend: 'excel',
				text: 'Excel',
				className: 'btn btn-default',

			},

			{
				extend: 'pdf',
				text: 'Pdf',
				className: 'btn btn-default',

			},

			{
				extend: 'copy',
				text: 'Copy',
				className: 'btn btn-default',

			},

			{
				extend: 'csv',
				text: 'CSV',
				className: 'btn btn-default',

			},
			{
				extend: 'print',
				text: 'Print',
				className: 'btn btn-primary',

			},
		],


                        })
 
    });
    
  </script>


@endsection
@section('page-scripts')

  @include('partials.flash-swal')
@endsection