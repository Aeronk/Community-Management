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
   
        <form class="form-horizontal" method="post" action="{{ route('denomination.store') }}">

          <div class="panel-group" id="accordion">

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
                    <input type="text" class="form-control" id="name" style="border-radius:10px " name="name" placeholder="Denomination Name" value="{{ old('name') }}">

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
                    <input type="text" class="form-control" id="year" style="border-radius:10px " name="year" placeholder="Year of Founding" value="{{ old('year') }}">

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
                    <input type="text" class="form-control" style="border-radius:10px " name="number_of_branches" placeholder="Number of Branches" value="{{ old('number_of_branches') }}">
                    @if ($errors->has('number_of_branches'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('number_of_branches') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="number_of_members" class="col-sm-2 control-label" style="text-align:left"><strong>Number of Members</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="number_of_members" placeholder="Number of Members" value="{{ old('number_of_members') }}">
                    @if ($errors->has('number_of_members'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('number_of_members') }}</strong>
                    </span>
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
                    
                    @if ($errors->has('countries_spread[]'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('countries_spread[]') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="hq_address" class="col-sm-2 control-label" style="text-align:left"><strong>Headquarters</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" id="hq" style="border-radius:10px " name="hq_address" placeholder="HQ Physical Address" value="{{ old('hq_address') }}">
                    @if ($errors->has('year'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('hq_address') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="sub_balance" class="col-sm-2 control-label" style="text-align:left"><strong>Subscription Balance</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="sub_balance" id="sub_balance" placeholder="Subscription Balance" value="{{ old('sub_balance') }}">
                    @if ($errors->has('sub_balance'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('sub_balance') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>   

                <div class="form-group">
                  <label for="sub_balance" class="col-sm-2 control-label" style="text-align:left"><strong>Category<small>(Members)</small></strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                   <select class="form-control" style="border-radius:10px" name="category">
                    <option>Please select</option>
                    @foreach($categories as $category)

                        <option>{{$category->name}}</option>
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

                    <select class="form-control" name="title" style="border-radius:10px " value="{{ old('title') }}">

                      <option>Please Select</option>
                      <option>Mr</option>
                      <option>Mrs</option>
                     <option>Dr</option>
                     <option>Bishop</option>
                    </select>
                    @if ($errors->has('title'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif

                  </div>
                </div>  

                <div class="form-group">
                  <label for="first_name" class="col-sm-2 control-label" style="text-align:left"><strong>First Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="first_name" placeholder="First Name">
                    @if ($errors->has('first_name'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="last_name" class="col-sm-2 control-label" style="text-align:left"><strong>Last Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="last_name" placeholder="Last Name">
                  </div>
                  @if ($errors->has('last_name'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('last_name') }}</strong>
                 </span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="home_tel" class="col-sm-2 control-label" style="text-align:left"><strong>Contact Number</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control"  style="border-radius:10px " name="home_tel" placeholder=" Home Tel">
                    @if ($errors->has('home_tel'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('home_tel') }}</strong>
                   </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label" style="text-align:left"><strong>Email</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="email" class="form-control" id="email" style="border-radius:10px " name="email" placeholder="Email">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="marital_status" class="col-sm-2 control-label" style="text-align:left"><strong>Marital Status</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <label class="radio-inline"><input type="radio"  value="Single" name="marital_status">Single</label>
                    <label class="radio-inline"><input type="radio"  value="Married" name="marital_status">Married</label>
                    <label class="radio-inline"><input type="radio"  value="Divorced" name="marital_status">Divorced</label> 
                    <label class="radio-inline"><input type="radio"  value="Single Parent" name="marital_status">Single Parent</label>
                    @if ($errors->has('marital_status'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('marital_status') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="gender" class="col-sm-2 control-label" style="text-align:left"><strong>Gender</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <label class="radio-inline"><input type="radio"  value="Male" name="gender">Male</label>
                    <label class="radio-inline"><input type="radio"  value="Female" name="gender">Female</label>
                    @if ($errors->has('gender'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('gender') }}</strong>
                  </span>
                    @endif

                  </div>
                </div>
                <div class="form-group">
                  <label for="home_tel" class="col-sm-2 control-label" style="text-align:left"><strong>Are you the HOD or Representative</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <label class="radio-inline"><input type="radio"  value="Yes" name="hod_or_rep">Yes</label>
                    <label class="radio-inline"><input type="radio"  value="No" name="hod_or_rep">No</label>
                    @if ($errors->has('hod_or_rep'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('hod_or_rep') }}</strong>
                    </span>
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


                <h3 tyle="text-align:left">Finance and Adminstration</h3>

                <div class="form-group">
                  <label for="fafullname" class="col-sm-2 control-label" style="text-align:left"><strong>Full Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="fafullname" placeholder=" Full Name">
                    @if ($errors->has('fafullname'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('fafullname') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="facontact_number" class="col-sm-2 control-label" style="text-align:left"><strong>Contact Number</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control"  style="border-radius:10px " name="facontact_number" placeholder=" Contact Number">
                    @if ($errors->has('facontact_number'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('facontact_number') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="faemail" class="col-sm-2 control-label" style="text-align:left"><strong>Email</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="email" class="form-control" id="email" style="border-radius:10px " name="faemail" placeholder="Email">
                    @if ($errors->has('faemail'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('faemail') }}</strong>
                   </span>
                    @endif
                  </div>
                </div>
               

                <h3 style="text-align:left">Women Contact Information</h3>



                <div class="form-group">
                  <label for="wfullname" class="col-sm-2 control-label" style="text-align:left"><strong>Full Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="wfullname" placeholder=" Full Name">
                    @if ($errors->has('wfullname'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('wfullname') }}</strong>
                   </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="wcontact_number" class="col-sm-2 control-label" style="text-align:left"><strong>Contact Number</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control"  style="border-radius:10px " name="wcontact_number" placeholder=" Contact Number">
                    @if ($errors->has('wcontact_number'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('wcontact_number') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="wemail" class="col-sm-2 control-label" style="text-align:left"><strong>Email</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="email" class="form-control" id="email" style="border-radius:10px " name="wemail" placeholder="Email">
                    @if ($errors->has('wemail'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('wemail') }}</strong>
                  </span>
                    @endif
                  </div>
                </div>
                
                <h3 style="text-align:left">Youth Contact Information</h3>



                <div class="form-group">
                  <label for="yfullname" class="col-sm-2 control-label" style="text-align:left"><strong>Full Name</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control" style="border-radius:10px " name="yfullname" placeholder=" Full Name">
                    @if ($errors->has('yfullname'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('yfullname') }}</strong>
                   </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  
                  <label for="ycontact_number" class="col-sm-2 control-label" style="text-align:left"><strong>Contact Number</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="text" class="form-control"  style="border-radius:10px " name="ycontact_number" placeholder=" Contact Number">
                    @if ($errors->has('ycontact_number'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('ycontact_number') }}</strong>
                   </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="yemail" class="col-sm-2 control-label" style="text-align:left"><strong>Email</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                  <div class="col-sm-6 col-sm-offset-1">
                    <input type="email" class="form-control" style="border-radius:10px " name="yemail" placeholder="Email">
                    @if ($errors->has('yemail'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('yemail') }}</strong>
                    </span>
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
                  <label class="checkbox"><input type="checkbox" class="form-check-input" value="Monitoring & Evaluation" name="research_and_dev[]">Monitoring & Evaluation</label>
                  <label class="checkbox"><input type="checkbox" class="form-check-input" value="Research and Documentation" name="research_and_dev[]">Research and Documentation</label>

                  <label class="checkbox" ><input type="checkbox" class="form-check-input" value="Information & Social Marketing" name="research_and_dev[]">Information & Social Marketing</label>
                  <label class="checkbox"><input type="checkbox" class="form-check-input" value="Resource Centres" name="research_and_dev[]">Resource Centres</label>
                </div>
                  @if ($errors->has('research_and_dev'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('research_and_dev') }}</strong>
                  </span>
                  @endif
              </div>

              <div class="form-group">
                <label for="other_countries" class="col-sm-3 control-label" style="text-align:left"><strong>2. Gender Development Commission (GDC), Departments</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                <div class="col-sm-6 col-sm-offset-1">
                  <label class="checkbox"><input type="checkbox"  value="Gender Mainstreaming & Leadership" name="gender_dev[]">Gender Mainstreaming & Leadership</label>
                  <label class="checkbox"><input type="checkbox"  value="Advocacy & Governance" name="gender_dev[]">Advocacy & Governance</label>
                  <label class="checkbox"><input type="checkbox"  value="Women's Social Development" name="gender_dev[]">Women's Social Development</label>
                  <label class="checkbox"><input type="checkbox"  value="Political & Economic Development" name="gender_dev[]">Political & Economic Development</label>
                  @if ($errors->has('gender_dev'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('gender_dev') }}</strong>
                  </span>
                  @endif
                </div>
              </div>





              <div class="form-group">
                <label for="other_countries" class="col-sm-3 control-label" style="text-align:left"><strong>3. Humanitarian Relief Development (HRD), Departments</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                <div class="col-sm-6 col-sm-offset-1">
                  <label class="checkbox"><input type="checkbox"  value="Child Protection & HIV/AIDS" name="humanitarian[]">Child Protection & HIV/AIDS</label>

                  <label class="checkbox"><input type="checkbox"  value="Shelter, Water & Sanitatione" name="humanitarian[]">Shelter, Water & Sanitation</label>

                  <label class="checkbox"><input type="checkbox"  value="Livelihoods & Development" name="humanitarian[]">Livelihoods & Development</label>

                  <label class="checkbox"><input type="checkbox"  value="Emergency & Disaster Preparedness" name="humanitarian[]">Emergency & Disaster Preparedness</label>

                  @if ($errors->has('humanitarian'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('humanitarian') }}</strong>
                 </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <label for="other_countries" class="col-sm-3 control-label" style="text-align:left"><strong>4. Peace and Justice Commission (PJC), Departments</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>

                <div class="col-sm-6 col-sm-offset-1">
                  <label class="checkbox"><input type="checkbox"  value="Peace BuildingGender Mainstreaming & Leadership" name="peace_justice[]">Peace Building</label>
                  <label class="checkbox"><input type="checkbox"  value="Conflict Resolution & Management" name="peace_justice[]">Conflict Resolution & Management</label>
                  <label class="checkbox"><input type="checkbox"  value="Democratic Governance & Social Integration" name="peace_justice[]">Democratic Governance & Social Integration</label>
                  <label class="checkbox"><input type="checkbox"  value="Election Observations & Monitoring" name="peace_justice[]">Election Observations & Monitoring</label> 
                  <label class="checkbox"><input type="checkbox"  value="Media & Communication" name="peace_justice[]">Media & Communication</label>
               @if ($errors->has('peace_justice[]'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('peace_justice[]') }}</strong>
                </span>
                @endif
                </div>
               
              </div>


              <div class="form-group">
                <label for="other_countries" class="col-sm-3 control-label" style="text-align:left"><strong>5. Commission for Ministry Development (CMD), Departments</strong><i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                <div class="col-sm-6 col-sm-offset-1">

                  <label class="checkbox"><input type="checkbox"  value="Evangelism, Church Plating & Prayer" name="comm_for_min[]">Evangelism, Church Plating & Prayer</label>
                  <label class="checkbox"><input type="checkbox"  value="Institutional & Leadership Development" name="comm_for_min[]">Institutional & Leadership Development</label>
                  <label class="checkbox"><input type="checkbox"  value="Theological Reflection" name="comm_for_min[]">Theological Reflection</label>
                  <label class="checkbox"><input type="checkbox"  value="Youth, Sport & Child Ministry" name="comm_for_min[]">Youth, Sport & Child Ministry</label>
                  <label class="checkbox"><input type="checkbox"  value="Integral Missions" name="comm_for_min[]">Integral Missions</label>

                  <label class="checkbox"><input type="checkbox"  value="Islamic Sensitisation" name="comm_for_min[]">Islamic Sensitisation</label>
                </div>

                @if ($errors->has('comm_for_min'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('comm_for_min') }}</strong>
               </span>
                @endif
              </div>





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
                <label class="checkbox"><input type="checkbox" class="form-check-input" value="{{$program->name}}" name="programs[]">{{$program->name}}</label>
          

                @endforeach
              </div>
              @if ($errors->has('programs'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('programs') }}</strong>
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