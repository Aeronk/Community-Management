
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
      	<div class="row">

<form class="form-horizontal group-border-dashed" name="expenseForm" id="expenseForm" method="post" action="{{route('expenses.store') }}"><!--start of form---->
			<div class="panel-group" id="accordion">
			<a name="showother"></a>
				
			<div class="panel panel-danger" style="padding:0px">
							<div class="panel-heading" style="padding:8px">
					<h4 class="panel-title" style="text-align:left">
						<a href="#basic" id="BasicInfor" data-toggle="collapse" data-parent="accordion">Add an Expense</a>
					</h4>
				</div>
					
					<div id="basic" class="collapse in">
						<div class="panel-body">
										
						 {!! csrf_field() !!}

        				@include('partials.validation')
						   <div class="form-group">
						  <label for="expenditure" class="col-sm-2 control-label" style="text-align:left" required="">Expenditure Type <i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
							<div class="col-sm-3  col-sm-offset-1">
							  <select class="form-control" id="expenditure" style="border-radius:10px" name="expenditure" required="">
							  <option value="" selected="selected">Please Select</option>
								@foreach($extypes as $ex)
								<option>{{$ex->name}}</option>
								@endforeach
							   </select>
							 </div>
							 
						</div>
	
							<div class="form-group"> 
							<label for="transactionID" class="col-sm-2 control-label" style="text-align:left">Transaction ID</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <input type="text" class="form-control" id="transactionID" style="border-radius: 10px;" name="transaction_id" placeholder="Transaction Id"> 
							</div>
						  </div>					
						<div class="form-group">
						  <label for="supplierName" class="col-sm-2 control-label" style="text-align:left" required="">Supplier Name<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
							<div class="col-sm-3  col-sm-offset-1">
								<input type="text" name=""  class="form-control" id="supplierName" style="border-radius:10px" name="supplier_name">
							 </div>
						</div>
						  
						 
					  <div class="form-group">
							<label for="date" class="col-sm-2 control-label" style="text-align:left">Date </label>
							<div class="col-sm-3 col-sm-offset-1">  
						 <div class="dp_container"></div>
						 <input type="date" id="datepicker" class="form-control hasDatepicker" style="border-radius:10px" name="date_added" required="">
							</div>
						</div>
						
						
							<div class="form-group"> 
							<label for="amount" class="col-sm-2 control-label" style="text-align:left">Amount<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
							<div class="col-sm-3 col-sm-offset-1">
							  <input type="text" class="form-control" id="amount" style="border-radius:10px" name="amount" placeholder="Enter Cost Here" required=""> 
							</div>
						  </div>
				
						</div>
			</div>

		</div>
		<div>  <!--start of save button---->
			  <div class="form-group">
				<div class="col-sm-3">
				  <button type="submit" data-loading-text="S..." id="saveexpense" name="saveexpense" class="btn btn-danger" style="text-align:left">Save</button>
				  </div>
			  </div>
		</div> <!--end of save button---->
		<!--end of form---->

</div></form>


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