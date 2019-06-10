
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


     <form class="form-horizontal"  method="post" action="{{ route('contribution.store') }}">
       <h2 class="title">Contributions</h2>

       {!! csrf_field() !!}
       <div class="form-group row">
        <label for="denominations" class="col-md-2 col-form-label col-form-control-md">Ministers</label>
        <div class="col-sm-3  col-sm-offset-1">
          <select class="form-control" name="denomination_id" id="denomination_id" style="border-radius:10px">
            <option>Please Select</option>
            @foreach($ministers as $min)

            <option value="{{$min->id}}">{{$min->first_name}}    {{$min->last_name}}</option>
            

            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="contribution_type" class="col-md-2 col-form-label col-form-control-md">Contribution Type</label>
        <div class="col-sm-3 col-sm-offset-1">
         <select class="form-control" name="type" id="type" style="border-radius: 10px;">
           @foreach($contributions as $contri)

           <option>{{$contri->name}}</option>
           

           @endforeach
         </select>
       </div>
     </div>
     <div class="form-group row">
      <label for="ministry" class="col-md-2 col-form-label col-form-control-md">Province</label>
      <div class="col-sm-3 col-sm-offset-1">
        <select class="form-control" name="province">
          <option>please select</option>
          @foreach($provinces as $province)
          <option>{{$province->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="district" class="col-md-2 col-form-label col-form-control-md">Zone</label>
      <div class="col-sm-3 col-sm-offset-1">
       
        <option></option>
       <select  class="form-control form-control-md" name="zone" id="zone">
          <option>please select</option>
          @foreach($zones as $zone)
          <option>{{$zone->name}}</option>
          @endforeach
        </select>
     
      
    </div>
  </div>
  <div class="form-group">
    <label for="transactionID" class="col-sm-2 control-label" style="text-align:left">Reciept Number</label>
    <div class="col-sm-3 col-sm-offset-1">
      <input type="text" class="form-control" style="border-radius: 10px;" id="transaction_id" name="transaction_id" placeholder="Transaction Id">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label" style="text-align:left">Amount Recieved<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
    <div class="col-sm-3 col-sm-offset-1">
      <input type="text" class="form-control" data-parsley-type="number" style="border-radius:10px" id="amount_recieved" name="amount_recieved" placeholder="Amount Received">
    </div>
  </div>
  <div class="form-group">
    <label for="received_from" class="col-sm-2 control-label" style="text-align:left">Received From<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
    <div class="col-sm-3 col-sm-offset-1">
      <input type="text" name="received_from" class="form-control" style="border-radius:10px">
    </div>
  </div>

  <div class="form-group">
    <label for="date_recieved" class="col-sm-2 control-label" style="text-align:left">Date<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
    <div class="col-sm-3 col-sm-offset-1">
      <div class="dp_container"></div>
      <input type="date" id="datepicker" style="border-radius:10px" class="form-control hasDatepicker" name="date_recieved">
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
@endsection