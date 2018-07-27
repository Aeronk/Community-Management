@extends('layout')
@section('title')
Ministers
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
       <form class="form-horizontal" method="post" action="{{ route('minister.store') }}">



        <div class="panel panel-danger">
          <div class="panel-heading" style= 'padding:10px'>
            <h4 class="panel-title"  style="text-align:left">
              <a id="BasicInfor" style = 'font-family:serif;font-size:17px' ">MINISTERS REGISTRATION</a>
            </h4>
          </div>
        </div>

        {!! csrf_field() !!}

        @include('partials.validation')

        <div class="form-group">
          <label for="dname" class="col-sm-2 control-label" style="text-align:left"><strong>Denomination Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
          <div class="col-sm-6 col-sm-offset-1">
           {{--  <input type="text" class="form-control" id="dname" style="border-radius:10px " name="dname" placeholder="Denomination Name" value="{{ old('dname') }}"> --}}
             <select class="form-control" name="dname" style="border-radius:10px " value="{{ old('dname') }}">
              <option>Please Select</option>
              @foreach($denominations as $denomination)

                      <option value="{{$denomination->id}}">{{$denomination->name}}</option>
                      

                @endforeach
                    </select>
             @if ($errors->has('dname'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('dname') }}</strong>
                    </span>
               @endif

          </div>
        </div>  

        <div class="form-group">
          <label for="year" class="col-sm-2 control-label" style="text-align:left"><strong>Branch/Assembly Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
          <div class="col-sm-6 col-sm-offset-1">
            <input type="text" class="form-control" style="border-radius:10px " name="branch" placeholder="Branch/Assembly Name" value="{{ old('branch') }}">
             @if ($errors->has('branch'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('branch') }}</strong>
                    </span>
               @endif
          </div>
          
        </div>

        <div class="form-group">
          <label for="position" class="col-sm-2 control-label" style="text-align:left"><strong>Position in Organisation</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
          <div class="col-sm-6 col-sm-offset-1">
            <input type="text" class="form-control" style="border-radius:10px " name="position" placeholder="Position in Organisation" value="{{ old('position') }}">
             @if ($errors->has('position'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('position') }}</strong>
                    </span>
               @endif
          </div>
        </div>

        <div class="form-group">
          <label for="number_members" class="col-sm-2 control-label" style="text-align:left"><strong>Number of Members</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
          <div class="col-sm-6 col-sm-offset-1">
            <label class="radio-inline"><input type="radio" class="form-check-item" value="1-50" name="number_members">1-50</label>
            <label class="radio-inline"> <input type="radio"  value="51-100" name="number_members">51-100</label>
            <label class="radio-inline"><input type="radio"  value="101-250" name="number_members">101-250</label>
            <label class="radio-inline"><input type="radio"  value="500+" name="number_members">500+</label>
            
          </div>
        </div>
      
      <div class="form-group">
        <label for="dname" class="col-sm-2 control-label" style="text-align:left"><strong>Title</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
        <div class="col-sm-6 col-sm-offset-1">

           <select class="form-control" name="title" style="border-radius:10px " value="{{ old('title') }}">
              <option>Please Select</option>
              @foreach($titles as $title)

                      <option >{{$title->name}}</option>
                      

                @endforeach
                    </select>

        </div>
      </div>  
      <div class="form-group">
        <label for="number_branches" class="col-sm-2 control-label" style="text-align:left"><strong>First Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
        <div class="col-sm-6 col-sm-offset-1">
          <input type="text" class="form-control" style="border-radius:10px " name="first_name" placeholder="Number of Branches">
        </div>
      </div>

      <div class="form-group">
        <label for="number_branches" class="col-sm-2 control-label" style="text-align:left"><strong>Last Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
        <div class="col-sm-6 col-sm-offset-1">
          <input type="text" class="form-control" style="border-radius:10px " name="last_name" placeholder="Last Name" >
        </div>
      </div>

      <div class="form-group">
        <label for="number_members" class="col-sm-2 control-label" style="text-align:left"><strong>Phone</strong></label>
        <div class="col-sm-6 col-sm-offset-1">
          <input type="text" class="form-control"  style="border-radius:10px " name="home_tel" placeholder="Phone" >
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="col-sm-2 control-label" style="text-align:left"><strong>Email</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
        <div class="col-sm-6 col-sm-offset-1">
          <input type="email" class="form-control" id="email" style="border-radius:10px " name="email" placeholder="Email" >
        </div>
      </div>

      <div class="form-group">
        <label for="other_countries" class="col-sm-2 control-label" style="text-align:left"><strong>Marital Status</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
        <div class="col-sm-6 col-sm-offset-1">
          <label class="radio-inline"><input type="radio" class="form-check-item" value="Single" name="marital_status">Single</label>
          <label class="radio-inline"><input type="radio" class="form" value="Married" name="marital_status">Married</label>
          <label class="radio-inline"><input type="radio"  value="Divorced" name="marital_status">Divorced</label>
          <label class="radio-inline"><input type="radio"  value="Single Parent" name="marital_status">Single Parent</label>
        </div>
      </div>
      <div class="form-group">
        <label for="gender" class="col-sm-2 control-label" style="text-align:left"><strong>Gender</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
        <div class="col-sm-6 col-sm-offset-1">
          <span>Male</span><input type="radio"  value="Male" name="gender">
          <span>Female</span><input type="radio"  value="Female" name="gender">

        </div>
      </div>

      <div class="form-group">
        <label for="email" class="col-sm-2 control-label" style="text-align:left"><strong>Physical Address</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
        <div class="col-sm-6 col-sm-offset-1">
         <textarea name="address" class="form-control">

         </textarea>
       </div>
     </div>
       <div class="form-group">
                  <label for="province" class="col-sm-2 control-label" style="text-align:left"><strong>Province</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">

                    <select class="form-control" name="province" style="border-radius:10px " value="{{ old('province') }}">

                       

                      <option>Please Select Province</option>
                    @foreach($provinces as $province)
                      <option>{{$province->name}}</option>
                   {{--    <option>Bulawayo</option> --}}

                      @endforeach
                    </select>
                    @if ($errors->has('province'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('province') }}</strong>
                    </span>
                    @endif

                  </div>
                </div> 
                  <div class="form-group">
                  <label for="region" class="col-sm-2 control-label" style="text-align:left"><strong>Zone/District</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">

                    <select class="form-control" name="region" style="border-radius:10px " value="{{ old('region') }}">
                  
                      <option>Please Select Zone/District</option>
                      @foreach($regions as $region)
                      <option>{{$region->name}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('region'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('region') }}</strong>
                    </span>
                    @endif

                  </div>
                </div> 



     <div class="form-group">
      <input type="submit" value="Save" name="submit" class="btn btn-primary">

    </div>

  </form>

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