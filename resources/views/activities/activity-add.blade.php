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

            <a href="{{ route('activities.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-hand"></i>Go to listing</a><br>


        </div><br>
      <div class="row">
        <form class="form-horizontal group-border-dashed" method="post" action="{{ route('activities.store') }}" >
            <div class="panel-group" id="accordion">
           
            
            <div class="panel panel-danger">
                            <div class="panel-heading" style="padding:10px">
                    <h4 class="panel-title" style="text-align:left">
                        <a href="#basic" id="BasicInfor" style="font-family:serif;font-size:17px" data-toggle="collapse" data-parent="accordion">Activity Information</a>
                    </h4>
                </div>
                    
                    <div id="basic" class="collapse in">
                        <div class="panel-body">

                           {!! csrf_field() !!}

                 @include('partials.validation')
                        <div class="form-group">
                  <label for="date" class="col-sm-2 control-label" style="text-align:left">Date<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                    <div class="col-sm-6">
                      <div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker col-md-5 col-xs-7">
                        <input size="16" type="date" name="date" value="" class="form-control"><span class="input-group-addon btn btn-primary" ><i class="icon-th s7-date"></i></span>
                      </div>

                    </div>
                  </div>
                        <div class="form-group">
                          <label for="contType" class="col-sm-2 control-label" style="text-align:left">Activity Type<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                            <div class="col-sm-3 col-sm-offset-1">
                              <select class="form-control" id="type" style="border-radius:10px" name="type" required="" data-parsley-id="6">
                              <option value="" selected="selected">Please Select</option><option>AGM</option>
                             
                              </select>
                             </div>
                           
                        </div>
                        <div class="form-group">
                          <label for="actTypeDescription" class="col-sm-2 control-label" style="text-align:left">Activity Description<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                            <div class="col-sm-3 col-sm-offset-1">
                              <select class="form-control" id="actTypeDescription" style="border-radius:10px" name="description" required="" data-parsley-id="8">
                              <option value="" selected="selected">Please Select</option>
                              <option>Description</option>
                              </select>
                             </div>
                           
                        </div>

                        <div class="form-group">
                          <label for="contType" class="col-sm-2 control-label" style="text-align:left">Organiser<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                            <div class="col-sm-3 col-sm-offset-1">
                              <input type="text" name="organiser" class="form-control" style="border-radius:10px">
                             </div>
                           
                           </div>
                           <div class="form-group">
                            <label for="email" class="col-sm-2 control-label" style="text-align:left">Attendance <i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
                            <div class="col-sm-3 col-sm-offset-1">
                              <input type="text" class="form-control" data-parsley-type="number" style="border-radius:10px" id="actTotalMembers" name="total_members" placeholder="Attendance" required="" data-parsley-id="12">
                            </div>
                          </div>
                            <div class="panel panel-danger">
                                <div class="panel-heading" style="padding:10px">
                                    <h4 class="panel-title" style="text-align:left">
                                        <a href="#basic" id="BasicInfor" style="font-family:serif;font-size:17px" data-toggle="collapse" data-parent="accordion">Attendance  Description</a>
                                    </h4>
                                </div>
                            </div>
                           <div class="form-group">
                            <label for="email" class="col-sm-2 control-label" style="text-align:left">Men</label>
                            <div class="col-sm-3 col-sm-offset-1">
                              <input type="text" class="form-control" style="border-radius:10px" id="men" name="men" placeholder="Number of Men">
                            </div>
                           </div>
                           <div class="form-group">
                            <label for="women" class="col-sm-2 control-label" style="text-align:left">Women</label>
                            <div class="col-sm-3 col-sm-offset-1">
                              <input type="text" class="form-control" data-parsley-type="number" style="border-radius:10px" id="actWomen" name="women" placeholder="Number of Women" data-parsley-id="16">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="hod" class="col-sm-2 control-label" style="text-align:left">Head of Denominations</label>
                            <div class="col-sm-3 col-sm-offset-1">
                              <input type="text" class="form-control" data-parsley-type="number" style="border-radius:10px" id="hod" name="hod" placeholder="Number of HOD's" data-parsley-id="16">
                            </div>
                          </div>  

                          <div class="form-group">
                            <label for="pastors" class="col-sm-2 control-label" style="text-align:left">Pastors</label>
                            <div class="col-sm-3 col-sm-offset-1">
                              <input type="text" class="form-control" data-parsley-type="number" style="border-radius:10px" id="pastors" name="pastors" placeholder="Number of Ministers" data-parsley-id="16">
                            </div>
                          </div>
                        
                            <div class="panel panel-danger">
                                <div class="panel-heading" style="padding:10px">
                                    <h4 class="panel-title" style="text-align:left">
                                        <a href="#basic" id="BasicInfor" style="font-family:serif;font-size:17px" data-toggle="collapse" data-parent="accordion">Attendance Register</a>
                                    </h4>
                                </div>
                            </div>

                           <div class="form-group">
                            <label for="email" class="col-sm-2 control-label" style="text-align:left">Attended By</label>
                            <div class="col-sm-3 col-sm-offset-1">
                            <div id="addSuccessfull"></div>
                             <a href="#addAttendance" class="btn btn-default" style="border-radius:10px" data-toggle="modal">Add Member</a>
                            </div>
                            
                          </div>

                        <div class="form-group">
                            <label for="notes" class="col-sm-2 control-label" style="text-align:left">Comment</label>
                            <div class="col-sm-3 col-sm-offset-1">
                         <div class="dp_container"></div>
                         <textarea class="form-control" name="comment" style="border-radius:10px" id="actComment" rows="2" data-parsley-id="22"></textarea>
                            </div>
                        </div>                                      
    
                        </div>
                        
                        </div>
                </div>
                </div>

      <div class="form-group">
                <div class="col-sm-3">
                  <button type="submit" data-loading-text="S..." id="saveactivity" name="saveactivity" class="btn btn-danger " style="text-align:left">Save</button>
                  </div>
              </div>
        </form>
    </div>

  <div class="modal fade in" id="addAttendance" tabindex="-1" role="dialog" aria-labelledby="econLabel"  padding-right: 21px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="econLabel">Add Member</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" novalidate="">
      <div class="form-group">
       <label for="marital" class="col-sm-3 control-label" style="text-align:left">Member Name</label>
      <div class="col-sm-4 ">
        <select class="form-control" id="memberID" name="memberID" required="" data-parsley-id="36"> 
          <option value="" selected="selected">Please Select</option>
            <option value="50">Shyiel Ali     </option>
            <option value="110">Joshua Mutya      </option>
            <option value="111">Edson Mutya     </option>
            <option value="112">Aaron Katema      </option>
            <option value="115">preciousm mvumirah      </option>
            <option value="116">Aaron Katema      </option>
            <option value="117">gibson Katemaa      </option>
              </select> 
       </div>
      </div>
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" id="addActivityMember">Add</button>
      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
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