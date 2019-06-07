
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


    <form class="form-horizontal group-border-dashed" method="post" action="{{ route('individualcontribution.store') }}">

        <div class="panel-group" id="accordion">
            <a name="showother"></a>
            <!--<a href="#" class="btn btn-success btn-xs">Add New Member</a>-->    
            <div class="panel panel-danger">
                <div class="panel-heading" style="padding:10px">
                    <h4 class="panel-title" style="text-align:left">
                        <a href="#basic" id="BasicInfor" style="font-family:serif;font-size:17px" data-toggle="collapse" data-parent="accordion">Add Subscription</a>
                    </h4>
                </div>

                <div id="basic" class="collapse in">
                    {!! csrf_field() !!}
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="denomination_id" class="col-sm-2 control-label" style="text-align:left" required="">Member<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                            <div class="col-sm-3  col-sm-offset-1">
                                <select class="form-control" name="denomination_id" id="denomination_id" style="border-radius:10px">
                                  <option>Please Select</option>
                                  @foreach($denominations as $denomination)

                                          <option value="{{$denomination->id}}">{{$denomination->name}}</option>
                                          

                                    @endforeach

                                     @if ($errors->has('denomination_id'))
                                    <span class="invalid-feedback">
                                      <strong>{{ $errors->first('denomination_id') }}</strong>
                                      </span>
                                    @endif
                            </select>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-sm-3 col-sm-offset-1">

                                <input type="hidden" name="type" class="form-control" value="subscription">
                
                            </div>

                        </div>
                           <div class="form-group">
                            <label for="transactionID" class="col-sm-2 control-label" style="text-align:left">Reciept Number</label>
                            <div class="col-sm-3 col-sm-offset-1">
                                <input type="text" class="form-control" style="border-radius: 10px;" id="transaction_id" name="transaction_id" placeholder="Reciept Number">
                                 @if ($errors->has('transaction_id'))
                                    <span class="invalid-feedback">
                                      <strong>{{ $errors->first('transaction_id') }}</strong>
                                      </span>
                                    @endif
                            </div>
                        </div>
                        



                        <div class="form-group">
                            <label for="transactionID" class="col-sm-2 control-label" style="text-align:left">Subscription Balance</label>
                            <div class="col-sm-3 col-sm-offset-1" id="sub_balance">
                                 <input type="text" id="sub" name="" readonly="" class="form-control">
                                
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="amount" class="col-sm-2 control-label" style="text-align:left">Quarterly Amount<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                            <div class="col-sm-3 col-sm-offset-1" id="amount">
                                <input type="text" id="qamount" name="" readonly="" class="form-control">
                                
                            </div>
                        </div>
                           <div class="form-group">
                            <label for="received_from" class="col-sm-2 control-label" style="text-align:left">Total Due<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                            <div class="col-sm-3 col-sm-offset-1" id="subscription">
                                <input type="text" id="tamount" name="" readonly="" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="amount_received" class="col-sm-2 control-label" style="text-align:left">Amount Received<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                            <div class="col-sm-3 col-sm-offset-1">
                                <input type="text" class="form-control" data-parsley-type="number" style="border-radius:10px" id="amount_received" name="amount_received" placeholder="Amount Received">
                            </div>
                             @if ($errors->has('amount_received'))
                                    <span class="invalid-feedback">
                                      <strong>{{ $errors->first('amount_received') }}</strong>
                                      </span>
                                    @endif
                        </div>

                        <div class="form-group">
                            <label for="received_from" class="col-sm-2 control-label" style="text-align:left">Received From<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                            <div class="col-sm-3 col-sm-offset-1">
                                <input type="text" name="received_from" class="form-control" style="border-radius:10px">
                            </div>

                             @if ($errors->has('received_from'))
                                    <span class="invalid-feedback">
                                      <strong>{{ $errors->first('received_from') }}</strong>
                                      </span>
                                    @endif
                        </div>

                        <div class="form-group">
                            <label for="payment_method" class="col-sm-2 control-label" style="text-align:left">Payment Method<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                            <div class="col-sm-3 col-sm-offset-1">
                                <input type="text" name="payment_method" class="form-control" style="border-radius:10px">
                            </div>

                            @if ($errors->has('payment_method'))
                                <span class="invalid-feedback">
                                      <strong>{{ $errors->first('payment_method') }}</strong>
                                      </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="accounts" class="col-sm-2 control-label" style="text-align:left">Accounts<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                            <div class="col-sm-3 col-sm-offset-1">
                                <input type="text" name="accounts" class="form-control" style="border-radius:10px">
                            </div>

                            @if ($errors->has('accounts'))
                                <span class="invalid-feedback">
                                      <strong>{{ $errors->first('accounts') }}</strong>
                                      </span>
                            @endif
                        </div>

                        <div class="form-group">
                            
                            <div class="col-sm-3 col-sm-offset-1">
                                <input type="hidden" name="captured_by" class="form-control" style="border-radius:10px" value="{{Auth::user()->name}}">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="date_recieved" class="col-sm-2 control-label" style="text-align:left">Date<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                            <div class="col-sm-3 col-sm-offset-1">
                                <div class="dp_container"></div>
                                <input type="date" id="datepicker" style="border-radius:10px" class="form-control hasDatepicker" name="date_recieved">

                                 @if ($errors->has('date_recieved'))
                                    <span class="invalid-feedback">
                                      <strong>{{ $errors->first('date_recieved') }}</strong>
                                      </span>
                                    @endif
                            </div>
                        </div>

                                              

                    </div>

                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-3">
                <button type="submit" data-loading-text="S..." id="save" name="save" class="btn btn-danger " style="text-align:left">Save</button>
            </div>
        </div>
    </form>
</div>

</div>
</div>


@endsection

@section('footer')
@parent
@endsection

@section('page-scripts')

<script type="text/javascript">
    
    $(document).ready(function(){
      $('#denomination_id').on('change',function(e)
      {
         e.preventDefault();

        console.log(e);
        var denomination=e.target.value;

        console.log(denomination);
        // ajax call
        
  
             $.ajax({
            type:'get',
            url:"{{URL::route('category')}}",
            data:{'denomination':denomination},
            datatype:'html',
            cache: false,
            success:function(data){
                // console.log('success');
                // console.log(data);
                // $('#amount').empty();   
                 $.each(JSON.parse(data), function(index,denominationObj)
                {

                    $('#qamount').val(denominationObj.subscription);
                    

                     $('#sub').val(denominationObj.sub_balance);

                     var total= parseInt(denominationObj.subscription)+ parseInt(denominationObj.sub_balance); 

                     $('#tamount').val(total);
                });
                },
            error:function(){
            }
            });
           });
    });

</script>
  @include('partials.flash-swal')
@endsection