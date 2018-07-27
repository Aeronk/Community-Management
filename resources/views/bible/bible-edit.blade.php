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
   
        <form class="form-horizontal" method="post" action="{{ route('bible.update',$bible->id) }}">

          <div class="panel-group" id="accordion">
            {!! method_field('PATCH') !!}
            {!! csrf_field() !!}

            @include('partials.validation')
            

            <div class="panel panel-danger">
              <div class="panel-heading" style= 'padding:10px'>
                <h4 class="panel-title"  style="text-align:left">
                  <a href="#basicinfo" id="BasicInfor" style = 'font-family:serif;font-size:17px' data-toggle="collapse" data-parent="accordion">Bible School Information</a>
                </h4>
              </div>
            </div>

            <div id="basicinfo" class="collapse in">
              <div class="panel-body" >

                <div class="form-group">
                  <label for="dname" class="col-sm-2 control-label" style="text-align:left"><strong>Name of the school</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" id="name" style="border-radius:10px " name="name" value="{{$bible->name}}">

                    @if ($errors->has('name'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>  

                <div class="form-group">
                  <label for="year" class="col-sm-2 control-label" style="text-align:left"><strong>Year of Founding</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" id="year" style="border-radius:10px " name="year"  value="{{$bible->year}}">

                    @if ($errors->has('year'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('year') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="number_of_branches" class="col-sm-2 control-label" style="text-align:left"><strong>Number of Branches</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="number_of_branches" value="{{$bible->number_of_branches}}">
                    @if ($errors->has('number_of_branches'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('number_of_branches') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="countries_spread" class="col-sm-2 control-label" style="text-align:left"><strong>Email</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="email" class="form-control"  style="border-radius:10px " name="email" placeholder="Email" value="{{$bible->email}}">
                    @if ($errors->has('countries_spread'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>


                <div class="form-group">
                  <label for="address" class="col-sm-2 control-label" style="text-align:left"><strong>Address</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    
                    <textarea class="form-control" name="address">{{$bible->address}}</textarea>


                    @if ($errors->has('address'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('address') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>   
              <div class="form-group">
                  <label for="contact_person" class="col-sm-2 control-label" style="text-align:left"><strong>Principal/Founder</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    
                     <input type="text" class="form-control" style="border-radius:10px " name="principal" id="principal" placeholder="Founder" value="{{$bible->founder}}">


                    @if ($errors->has('address'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('principal') }}</strong>
                    </span>
                    @endif
                  </div>
                </div> 
          <div class="form-group">
                  <label for="contact_person" class="col-sm-2 control-label" style="text-align:left"><strong>Contact Person</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    
                     <input type="text" class="form-control" style="border-radius:10px " name="contact_person" id="mobile" placeholder="Contact Person" value="{{$bible->contact_person}}"">


                    @if ($errors->has('address'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('contact_person') }}</strong>
                    </span>
                    @endif
                  </div>
                </div> 

                <div class="form-group">
                  <label for="mobile" class="col-sm-2 control-label" style="text-align:left"><strong>Phone Number</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    
                     <input type="text" class="form-control" style="border-radius:10px " name="mobile" id="mobile" placeholder="Mobile" value="{{$bible->mobile}}">


                    @if ($errors->has('mobile'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('mobile') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="sub_balance" class="col-sm-2 control-label" style="text-align:left"><strong>Subscription Balance</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="sub_balance" id="sub_balance" placeholder="Subscription Balance" value="{{$bible->sub_balance}}">
                    @if ($errors->has('sub_balance'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('sub_balance') }}</strong>
                    </span>
                    @endif
                  </div>
                </div> 

                 <div class="form-group row">
                     <label for="courses" class="col-sm-2 control-label" style="text-align:left"><strong>Courses Offered</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                    <div class="col-sm-6 col-sm-offset-1">
                      <select class="form-control" name="courses" multiple="">
                        <option>please select</option>
                        @foreach($courses as $course)
                         <option>{{$course->title}}</option>
                         @endforeach
                       </select>
                     
                    </div>
                     @if ($errors->has('courses'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('courses') }}</strong>
                    </span>
                    @endif
                  </div>

                <div class="form-group row">
                     <label for="category" class="col-sm-2 control-label" style="text-align:left"><strong>Subscription</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                    <div class="col-sm-6 col-sm-offset-1">
                      <input type="text" name="subscription" class="form-control" value="56" readonly="">
                    </div>
                     @if ($errors->has('subscription'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('subscription') }}</strong>
                    </span>
                    @endif
                  </div> 

                  <div class="form-group row">
                      <label for="enrollment" class="col-sm-2 control-label" style="text-align:left"><strong>Enrolment</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                    <div class="col-sm-6 col-sm-offset-1">
                      <input type="text" class="form-control" name="enrollment" id="enrollment" value="{{$bible->enrollment}}">
                       @if ($errors->has('enrollment'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('enrollment') }}</strong>
                    </span>
                    @endif
                    </div>
                  </div> 

                  

              </div>
            </div>
     


      <div class="form-group">
        <input type="submit" value="Save" name="subimt" class="btn btn-primary">

      </div>

    </form>
 
  </div>
</div>

@endsection

@section('footer')
@parent

@endsection


@section('page-scripts')

  @include('partials.flash-swal')
@endsection