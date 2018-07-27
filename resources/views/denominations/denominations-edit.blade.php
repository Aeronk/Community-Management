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
    <div class="container">
    	<div class="row">
        
        <form class="form-horizontal" method="post" action="{{ route('denomination.update', $denomination->id) }}">

          <div class="panel-group" id="accordion">
             {!! method_field('PATCH') !!}
            {!! csrf_field() !!}

            @include('partials.validation')
            

            <div class="panel panel-danger">
              <div class="panel-heading" style= 'padding:10px'>
                <h4 class="panel-title"  style="text-align:left">
                  <a href="#basicinfo" id="BasicInfor" style = 'font-family:serif;font-size:17px' data-toggle="collapse" data-parent="accordion">Denomination Information</a>
                </h4>
              </div>
            </div>

            <div id="basicinfo" class="collapse in">
              <div class="panel-body" >

                <div class="form-group">
                  <label for="dname" class="col-sm-2 control-label" style="text-align:left"><strong>Denomination Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" id="name" style="border-radius:10px " name="name" placeholder="Denomination Name" value="{{$denomination->name}}">

                    @if ($errors->has('name'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('name') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>  

                <div class="form-group">
                  <label for="year" class="col-sm-2 control-label" style="text-align:left"><strong>Year of Founding</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" id="year" style="border-radius:10px " name="year" placeholder="Year of Founding" value="{{ $denomination->year_found }}">

                    @if ($errors->has('year'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('year') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="number_of_branches" class="col-sm-2 control-label" style="text-align:left"><strong>Number of Branches</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="number_of_branches" placeholder="Number of Branches" value="{{ $denomination->number_of_branches }}">
                    @if ($errors->has('number_of_branches'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('number_of_branches') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="number_of_members" class="col-sm-2 control-label" style="text-align:left"><strong>Number of Members</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="number_of_members" placeholder="Number of Members" value="{{ $denomination->number_of_members }}">
                    @if ($errors->has('number_of_members'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('number_of_members') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="countries_spread" class="col-sm-2 control-label" style="text-align:left"><strong>Other Countries</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <select name="countries_spread[]" class="form-control" value="{{ old('countries_spread[]') }}" multiple="">
                      <option>Please Select</option>
                       @foreach($countries as $country)

                        <option>{{$country->name}}</option>
                    @endforeach
                      
                    </select>
                    
                    @if ($errors->has('countries_spread'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('countries_spread') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="hq_address" class="col-sm-2 control-label" style="text-align:left"><strong>Headquarters</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" id="hq" style="border-radius:10px " name="hq_address" placeholder="HQ Physical Address" value="{{ $denomination->hq_address}}">
                    @if ($errors->has('year'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('hq_address') }}</strong>
                    
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="sub_balance" class="col-sm-2 control-label" style="text-align:left"><strong>Subscription Balance</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="sub_balance" placeholder="Subscription Balance" value="{{ $denomination->sub_balance}}">
                    @if ($errors->has('sub_balance'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('sub_balance') }}</strong>
                    
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="sub_balance" class="col-sm-2 control-label" style="text-align:left"><strong>Category</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                   <select class="form-control" style="border-radius:10px " name="category">
                    <option>Please select</option>
                    @foreach($categories as $category)

                        <option {{$denomination->category == $category->name ? "selected" : "" }}>{{$category->name}}</option>
                    @endforeach
                     
                   </select>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <!-- Hod Information -->
          <div class="panel-group" id="accordion">

            <div class="panel panel-danger">
              <div class="panel-heading" style= 'padding:10px'>
                <h4 class="panel-title"  style="text-align:left">
                  <a href="#hod" id="HodInfo" style = 'font-family:serif;font-size:17px' data-toggle="collapse" data-parent="accordion">HOD Information</a>
                </h4>
              </div>
            </div>

            <div id="hod" class="panel-collapse collapse in">
              <div class="panel-body" >

                <div class="form-group">
                  <label for="tie'" class="col-sm-2 control-label" style="text-align:left"><strong>Title</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">

                    <select class="form-control" name="title" style="border-radius:10px " value="{{ $denomination->hod->title}}">

                      <option>Please Select</option>
                      <option {{$denomination->hod->title =='Mr' ? "selected" : "" }}>Mr</option>
                      <option {{$denomination->hod->title =='Mrs' ? "selected" : "" }}>Mrs</option>
                     <option {{$denomination->hod->title =='Miss' ? "selected" : "" }}>Miss</option>
                    </select>
                    @if ($errors->has('title'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('title') }}</strong>
                    </label>
                    @endif

                  </div>
                </div>  

                <div class="form-group">
                  <label for="first_name" class="col-sm-2 control-label" style="text-align:left"><strong>First Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="first_name" placeholder="First Name" value="{{ $denomination->hod->first_name}}">
                    @if ($errors->has('first_name'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('first_name') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="last_name" class="col-sm-2 control-label" style="text-align:left"><strong>Last Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="last_name" placeholder="Last Name" value="{{ $denomination->hod->last_name}}">
                  </div>
                  @if ($errors->has('last_name'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('last_name') }}</strong>
                  </label>
                  @endif
                </div>

                <div class="form-group">
                  <label for="home_tel" class="col-sm-2 control-label" style="text-align:left"><strong>Home Tel</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control"  style="border-radius:10px " name="home_tel" placeholder=" Home Tel" value="{{ $denomination->hod->home_tel}}">
                    @if ($errors->has('home_tel'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('home_tel') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label" style="text-align:left"><strong>Email</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="email" class="form-control" id="email" style="border-radius:10px " name="email" placeholder="Email" value="{{ $denomination->hod->email}}">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="marital_status" class="col-sm-2 control-label" style="text-align:left"><strong>Marital Status</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <label class="radio-inline"><input type="radio"  value="Single" name="marital_status" {{$denomination->hod->marital_status =='Single' ? "checked" : "" }}>Single</label>
                    <label class="radio-inline"><input type="radio"  value="Married" name="marital_status" {{$denomination->hod->marital_status =='Married' ? "checked" : "" }}>Married</label>
                    <label class="radio-inline"><input type="radio"  value="Divorced" name="marital_status" {{$denomination->hod->marital_status =='Divorced' ? "checked" : "" }}>Divorced</label> 
                    <label class="radio-inline"><input type="radio"  value="Single Parent" name="marital_status" {{$denomination->hod->marital_status =='Single Parent' ? "checked" : "" }}>Single Parent</label>
                    @if ($errors->has('marital_status'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('marital_status') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="gender" class="col-sm-2 control-label" style="text-align:left"><strong>Gender</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <label class="radio-inline"><input type="radio"  value="Male" name="gender" {{$denomination->hod->gender =='Male' ? "checked" : "" }}>Male</label>
                    <label class="radio-inline"><input type="radio"  value="Female" name="gender" {{$denomination->hod->gender =="Female" ? "checked" : "" }}>Female</label>
                    @if ($errors->has('gender'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('gender') }}</strong>
                    </label>
                    @endif

                  </div>
                </div>
                <div class="form-group">
                  <label for="home_tel" class="col-sm-2 control-label" style="text-align:left"><strong>Are you the HOD or Representative</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <label class="radio-inline"><input type="radio"  value="Yes" name="hod_or_rep" {{$denomination->hod->hod_or_rep == 'Yes' ? 'checked' : '' }}>Yes</label>
                    <label class="radio-inline"><input type="radio"  value="No" name="hod_or_rep" {{ $denomination->hod->hod_or_rep == 'No' ? 'checked' : '' }}>No</label>
                    @if ($errors->has('hod_or_rep'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('hod_or_rep') }}</strong>
                    </label>
                    @endif

                  </div>
                </div>

              </div>
            </div>

          </div>

          <!-- Key Contact Information -->
          <div class="panel-group" id="accordion">

            <div class="panel panel-danger">
              <div class="panel-heading" style= 'padding:10px'>
                <h4 class="panel-title"  style="text-align:left">
                  <a href="#KeyContact" id="KeyContactInfor" style = 'font-family:serif;font-size:17px' data-toggle="collapse" data-parent="accordion">Key Contact Information</a>
                </h4>
              </div>
            </div>

            <div id="KeyContact" class="panel-collapse collapse in">
              <div class="panel-body" >


                <h5 tyle="text-align:left">Finance and Adminstration</h5>



                <div class="form-group">
                  <label for="fafullname" class="col-sm-2 control-label" style="text-align:left"><strong>Full Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="fafullname" placeholder=" Full Name" value="{{ $denomination->contact->fafullname}}">
                    @if ($errors->has('fafullname'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('fafullname') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="facontact_number" class="col-sm-2 control-label" style="text-align:left"><strong>Contact Number</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control"  style="border-radius:10px " name="facontact_number" placeholder=" Contact Number" value="{{ $denomination->contact->facontact_number}}">
                    @if ($errors->has('facontact_number'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('facontact_number') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="faemail" class="col-sm-2 control-label" style="text-align:left"><strong>Email</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="email" class="form-control" id="email" style="border-radius:10px " name="faemail" placeholder="Email" value="{{ $denomination->contact->faemail}}">
                    @if ($errors->has('faemail'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('faemail') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>

                <h5 style="text-align:left">Women</h5>



                <div class="form-group">
                  <label for="wfullname" class="col-sm-2 control-label" style="text-align:left"><strong>Full Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " value="{{ $denomination->contact->wfullname}}" name="wfullname" placeholder=" Full Name">
                    @if ($errors->has('wfullname'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('wfullname') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="wcontact_number" class="col-sm-2 control-label" style="text-align:left"><strong>Contact Number</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" value="{{ $denomination->contact->wcontact_number}}" style="border-radius:10px " name="wcontact_number" placeholder=" Contact Number">
                    @if ($errors->has('wcontact_number'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('wcontact_number') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="wemail" class="col-sm-2 control-label" style="text-align:left"><strong>Email</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="email" class="form-control" id="email" value="{{ $denomination->contact->wemail}}" style="border-radius:10px " name="wemail" placeholder="Email">
                    @if ($errors->has('wemail'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('wemail') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>
                <h5 style="text-align:left">Youth</h5>



                <div class="form-group">
                  <label for="yfullname" class="col-sm-2 control-label" style="text-align:left"><strong>Full Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="yfullname" placeholder=" Full Name">
                    @if ($errors->has('yfullname'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('yfullname') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="ycontact_number" class="col-sm-2 control-label" style="text-align:left"><strong>Contact Number</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control"  style="border-radius:10px " value="{{ $denomination->contact->ycontact_number}}" name="ycontact_number" placeholder=" Contact Number">
                    @if ($errors->has('ycontact_number'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('ycontact_number') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="yemail" class="col-sm-2 control-label" style="text-align:left"><strong>Email</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="email" class="form-control" style="border-radius:10px " {{ $denomination->contact->yemail}} name="yemail" placeholder="Email">
                    @if ($errors->has('yemail'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('yemail') }}</strong>
                    </label>
                    @endif
                  </div>
                </div>


              </div>
            </div>

          </div>

          <!-- Commissions -->
          <div class="panel-group" id="accordion">

            <div class="panel panel-danger">
              <div class="panel-heading" style= 'padding:10px'>
                <h4 class="panel-title"  style="text-align:left">
                  <a href="#comm" id="commInfo" style = 'font-family:serif;font-size:17px' data-toggle="collapse" data-parent="accordion">Commissions</a>
                </h4>
              </div>
            </div>

            <div id="comm" class="panel-collapse collapse in">
              <div class="panel-body" >




               <div class="form-group">
                <label for="research_and_dev" class="col-sm-3 control-label" style="text-align:left"><strong>1. Reseach and Development Commission (RDC), Departments</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                <div class="col-sm-6 col-sm-offset-1">
                  <label class="checkbox"><input type="checkbox" class="form-check-input" value="Monitoring & Evaluation" name="research_and_dev[]"  @if(in_array('Monitoring & Evaluation', $rd) ) checked="1" @endif >Monitoring & Evaluation</label>

                  <label class="checkbox"><input type="checkbox" class="form-check-input" value="Research and Documentation" name="research_and_dev[]"  @if(in_array('Research and Documentation', $rd) ) checked="1" @endif>Research and Documentation</label>

                  <label class="checkbox" ><input type="checkbox" class="form-check-input" value="Information & Social Marketing" name="research_and_dev[]" @if(in_array('Information & Social Marketing', $rd) ) checked="1" @endif>Information & Social Marketing</label>

                  <label class="checkbox"><input type="checkbox" class="form-check-input" value="Resource Centres" name="research_and_dev[]"  @if(in_array('Resource Centres', $rd) ) checked="1" @endif>Resource Centres</label>
                </div>
                  @if ($errors->has('research_and_dev'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('research_and_dev') }}</strong>
                 
                  @endif
              </div>

              <div class="form-group">
                <label for="other_countries" class="col-sm-3 control-label" style="text-align:left"><strong>2. Gender Development Commission (GDC), Departments</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                <div class="col-sm-6 col-sm-offset-1">

                  <label class="checkbox"><input type="checkbox"  value="Gender Mainstreaming & Leadership" name="gender_dev[]" @if(in_array('Gender Mainstreaming & Leadership', $gd) ) checked="1" @endif>Gender Mainstreaming & Leadership</label>

                  <label class="checkbox" ><input type="checkbox"  value="Advocacy & Governance" name="gender_dev[]"  @if(in_array('Advocacy & Governance', $gd) ) checked="1" @endif>Advocacy & Governance</label>

                  <label class="checkbox"><input type="checkbox"  value="Women's Social Development" name="gender_dev[]" @if(in_array("Women's Social Development", $gd) ) checked="1" @endif>Women's Social Development</label>

                  <label class="checkbox"><input type="checkbox"  value="Political & Economic Development" name="gender_dev[]" @if(in_array('Political & Economic Development', $gd) ) checked="1" @endif>Political & Economic Development</label>

                  @if ($errors->has('gender_dev'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('gender_dev') }}</strong>
                  
                  @endif
                </div>
              </div>





              <div class="form-group">
                <label for="other_countries" class="col-sm-3 control-label" style="text-align:left"><strong>3. Humanitarian Relief Development (HRD), Departments</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                <div class="col-sm-6 col-sm-offset-1">
                  <label class="checkbox"><input type="checkbox"  value="Child Protection & HIV/AIDS" name="humanitarian[]" @if(in_array('Child Protection & HIV/AIDS', $hu) ) checked="1" @endif>Child Protection & HIV/AIDS</label>

                  <label class="checkbox"><input type="checkbox"  value="Shelter, Water & Sanitation" name="humanitarian[]" @if(in_array('Shelter, Water & Sanitation', $hu) ) checked="1" @endif>Shelter, Water & Sanitation</label>

                  <label class="checkbox"><input type="checkbox"  value="Livelihoods & Development" name="humanitarian[]" @if(in_array('Livelihoods & Development', $hu) ) checked="1" @endif>Livelihoods & Development</label>

                  <label class="checkbox"><input type="checkbox"  value="Emergency & Disaster Preparedness" name="humanitarian[]" @if(in_array('Emergency & Disaster Preparedness', $hu) ) checked="1" @endif>Emergency & Disaster Preparedness</label>

                  @if ($errors->has('humanitarian'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('humanitarian') }}</strong>
                 
                  @endif
                </div>
              </div>

              <div class="form-group">
                <label for="other_countries" class="col-sm-3 control-label" style="text-align:left"><strong>4. Peace and Justice Commission (PJC), Departments</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>

                <div class="col-sm-6 col-sm-offset-1">
                  <label class="checkbox"><input type="checkbox"  value="Peace BuildingGender Mainstreaming & Leadership" name="peace_justice[]"  @if(in_array('Peace BuildingGender Mainstreaming & Leadership', $pj) ) checked="1" @endif>Peace Building</label>


                  <label class="checkbox"><input type="checkbox"  value="Conflict Resolution & Management" name="peace_justice[]" @if(in_array('Conflict Resolution & Management', $pj) ) checked="1" @endif>Conflict Resolution & Management</label>

                  <label class="checkbox"><input type="checkbox"  value="Democratic Governance & Social Integration" name="peace_justice[]"  @if(in_array('Democratic Governance & Social Integration', $pj) ) checked="1" @endif>Democratic Governance & Social Integration</label>

                  <label class="checkbox"><input type="checkbox"  value="Election Observations & Monitoring" name="peace_justice[]" @if(in_array('Election Observations & Monitoring', $pj) ) checked="1" @endif>Election Observations & Monitoring</label> 


                  <label class="checkbox"><input type="checkbox"  value="Media & Communication" name="peace_justice[]" @if(in_array('Media & Communication', $pj) ) checked="1" @endif>Media & Communication</label>
                </div>
                @if ($errors->has('peace_justice'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('peace_justice') }}</strong>
              
                @endif
              </div>


              <div class="form-group">
                <label for="other_countries" class="col-sm-3 control-label" style="text-align:left"><strong>5. Commission for Ministry Development (CMD), Departments</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                <div class="col-sm-6 col-sm-offset-1">

                  <label class="checkbox"><input type="checkbox"  value="Evangelism, Church Plating & Prayer" name="comm_for_min[]"  @if(in_array('Evangelism, Church Plating & Prayer', $cm) ) checked="1" @endif>Evangelism, Church Plating & Prayer</label>
                  <label class="checkbox"><input type="checkbox"  value="Institutional & Leadership Development" name="comm_for_min[]" @if(in_array('Institutional & Leadership Development', $cm) ) checked="1" @endif>Institutional & Leadership Development</label>
                  <label class="checkbox"><input type="checkbox"  value="Theological Reflection" name="comm_for_min[]" @if(in_array('Theological Reflection', $cm) ) checked="1" @endif>Theological Reflection</label>
                  <label class="checkbox"><input type="checkbox"  value="Youth, Sport & Child Ministry" name="comm_for_min[]" @if(in_array('Youth, Sport & Child Ministry', $cm) ) checked="1" @endif>Youth, Sport & Child Ministry</label>
                  <label class="checkbox"><input type="checkbox"  value="Integral Missions" name="comm_for_min[]">Integral Missions</label>

                  <label class="checkbox"><input type="checkbox"  value="Islamic Sensitisation" name="comm_for_min[]" @if(in_array('Islamic Sensitisation', $cm) ) checked="1" @endif>Islamic Sensitisation</label>
                </div>

                @if ($errors->has('comm_for_min'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('comm_for_min') }}</strong>
               
                @endif
              </div>





            </div>
          </div>

       
        {{-- //programs --}}

        <div class="panel-group" id="accordion">

          <div class="panel panel-danger">
            <div class="panel-heading" style= 'padding:10px'>
              <h4 class="panel-title"  style="text-align:left">
                <a href="#programs" id="programsInfo" style = 'font-family:serif;font-size:17px' data-toggle="collapse" data-parent="accordion">Programs</a>
              </h4>
            </div>
          </div>

          <div id="programs" class="panel-collapse collapse in">
            <div class="panel-body" >




             <div class="form-group">
          
              <div class="col-sm-6 col-sm-offset-1">
                @foreach($programs as $program)
                <label class="checkbox"><input type="checkbox" class="form-check-input" value="{{$program->name}}" @if(in_array($program->name, $mprograms) ) checked="1" @endif name="programs[]" >{{$program->name}}</label>
          

                @endforeach
              </div>
              @if ($errors->has('programs'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('programs') }}</strong>
              </label>
              @endif
            </div>


          </div>
        </div>

      </div>



      <div class="form-group">
        <input type="submit" value="save" name="subimt" class="btn btn-primary">

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