
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
    
   </div>
   <div class="row">
 <h2 class="title">Contributions</h2>

     <form class="form-horizontal"  method="post" action="{{ route('expenses.update', $expense->id) }}">
      
        {!! method_field('PATCH') !!}
       {!! csrf_field() !!}
     	@include('partials.validation');
						   <div class="form-group">
						  <label for="expenditure" class="col-sm-2 control-label" style="text-align:left" required="">Expenditure Type <i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
							<div class="col-sm-3  col-sm-offset-1">
							  <select class="form-control" id="expenditure" style="border-radius:10px" name="expenditure" required="">
							  <option value="" selected="selected">Please Select</option>
								@foreach($extypes as $ex)
								<option {{$expense->expenditure ==$ex->name ? "selected" : "" }}>{{$ex->name}}</option>
								@endforeach
							   </select>
							 </div>
							 
						</div>
  
  <div class="form-group">
    <label for="transactionID" class="col-sm-2 control-label" style="text-align:left">Transaction ID</label>
    <div class="col-sm-3 col-sm-offset-1">
      <input type="text" class="form-control" style="border-radius: 10px;" id="transaction_id" name="transaction_id" value="{{$expense->transaction_id}}">
    </div>
  </div>
  <div class="form-group">
    <label for="supplier" class="col-sm-2 control-label" style="text-align:left">Supplier Name<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
    <div class="col-sm-3 col-sm-offset-1">
      <input type="text" class="form-control" style="border-radius:10px"  value="{{$expense->supplier_name}}" name="supplier">
    </div>
  </div> 


  <div class="form-group">
    <label for="email" class="col-sm-2 control-label" style="text-align:left">Amount Recieved<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
    <div class="col-sm-3 col-sm-offset-1">
      <input type="text" class="form-control" data-parsley-type="number" style="border-radius:10px"  value="{{$expense->amount}}" name="amount">
    </div>
  </div>
  <div class="form-group">
    <label for="received_from" class="col-sm-2 control-label" style="text-align:left">Received From<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
    <div class="col-sm-3 col-sm-offset-1">
      <input type="text" name="received_from" value="{{$expense->received_from}}" class="form-control" style="border-radius:10px">
    </div>
  </div>

  <div class="form-group">
    <label for="date_recieved" class="col-sm-2 control-label" style="text-align:left">Date<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
    <div class="col-sm-3 col-sm-offset-1">
      <div class="dp_container"></div>
      <input type="date" id="datepicker" style="border-radius:10px" class="form-control hasDatepicker" name="date_added" value="{{$expense->date_added}}">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Save</button>
  
</form>
</div>

</div>
</div>


@endsection

@section('footer')
@parent
@endsection

@section('page-scripts')

@include('partials.flash-swal')
@endsectionedit