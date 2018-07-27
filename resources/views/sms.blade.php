
@extends('layout')
@section('title')
SMS Communication
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

            <div class="col-md-12">
<form class="form-horizontal group-border-dashed" id="form_register" method="post" action="send_sms_save.php" enctype="multipart/form-data" novalidate="">
			<div class="panel-group" id="accordion">
			<a name="showother"></a>
			<!--<a href="#" class="btn btn-success btn-xs">Add New Member</a>-->	
			<div class="panel panel-danger">
							<div class="panel-heading" style="padding:10px">
					<h4 class="panel-title" style="text-align:left">
						<a href="#basic" id="BasicInfor" style="font-family:serif;font-size:17px" data-toggle="collapse" data-parent="accordion">New SMS</a>
					</h4>
				</div>
					
					<div id="basic" class="collapse in">
						<div class="panel-body">
					   
         					<div class="form-group">
						  <label for="contType" class="col-sm-2 control-label" style="text-align:left">Message Type<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
							<div class="col-sm-3 col-sm-offset-1">
							  <select class="form-control" id="emailType" style="border-radius:10px" name="emailType" required="" data-parsley-id="4">
							  <option value="" selected="selected">Please Select</option>
							 							<option value="1">Individual							</option>
														<option value="2">Denomination							</option>
														<option value="3">Province							</option>
														<option value="4">Zone							</option>
														<option value="5">Ministers							</option>
														
							
							  </select>
							 </div>
							 <!--label for="marital" class="col-sm-2 control-label" style="text-align:left" ><a href="#addEmailType" data-toggle="modal"
							  style="text-decoration:none">Add Message Type</a></label-->
						</div>
						<div id="branchEmail" style="display: none;">
						<div class="form-group">
						  <label for="marital" class="col-sm-2 control-label" style="text-align:left">Branch</label>
							<div class="col-sm-3  col-sm-offset-1">
							<select class="form-control" id="emailBranch" style="border-radius:10px" name="emailBranch" data-parsley-id="6">
							<option value="" selected="selected">Please Select</option>
														<option value="119">Mountain of Hope							</option>
														<option value="120">Retreat Park							</option>
														<option value="121">8 Miles							</option>
														<option value="122">Southlea Park							</option>
														<option value="123">SMS Test Branch							</option>
							
							</select>
							 </div>
			
						</div>
						</div>
						<div id="individualEmail" style="display: none;">
						<div class="form-group">
						  <label for="marital" class="col-sm-2 control-label" style="text-align:left">Phone Number<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
							 <div class="col-sm-2 col-sm-offset-1">
							 <select class="form-control" id="countryCode" style="border-radius:10px" name="countryCode" required="" data-parsley-id="8">
							 <option value="+263" selected="selected">+263</option>
							 <option value="+27">+27</option>
							 </select>
							 </div>
							 <div class="col-sm-3">
							 <input type="text" class="form-control" style="border-radius:10px" id="emailAddress" name="emailAddress" data-parsley-pattern="(?:0?\s?)\d{3}\s?\d{3}\s?\d{3}" data-parsley-maxlength="10" placeholder="xxx xxx xxx" data-parsley-id="10">
							 </div>
						</div>
						</div>
						
						<div id="addressGroupEmail" style="display: none;">
						<div class="form-group">
						  <label for="emailAddressGroup" class="col-sm-2 control-label" style="text-align:left">SMS Address Group</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <select class="form-control" id="emailAddressGroup" style="border-radius:10px" name="emailAddressGroup" data-parsley-id="12">
							  <option value="" selected="selected">Please Select</option>
							 
							  </select>
							 </div>
						</div>
						</div>
						
						<div id="groupEmail" style="display: none;">
						<div class="form-group">
						  <label for="emailGroup" class="col-sm-2 control-label" style="text-align:left">Stakeholder Group</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <select class="form-control" id="emailGroup" style="border-radius:10px" name="emailGroup" data-parsley-id="14">
							  <option value="" selected="selected">Please Select</option>
							  </select>
							 </div>
						</div>
						</div>
						
						<div id="cellGroupEmail" style="display: none;">
						<div class="form-group">
						  <label for="emailAddressGroup" class="col-sm-2 control-label" style="text-align:left">Cell Group</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <select class="form-control" id="emailCellGroup" style="border-radius:10px" name="emailCellGroup" data-parsley-id="16">
							  <option value="" selected="selected">Please Select</option>
								  </select>
							 </div>
						</div>
						</div>
						
						<div id="positionEmail" style="display: none;">
						<div class="form-group">
						  <label for="emailCellGroup" class="col-sm-2 control-label" style="text-align:left">Position</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <select class="form-control" id="emailPosition" style="border-radius:10px" name="emailPosition" data-parsley-id="18">
							  <option value="" selected="selected">Please Select</option>
							  </select>
							 </div>
						</div>
						</div>
						
						<div id="genderEmail" style="display: none;">
						<div class="form-group">
						  <label for="emailGender" class="col-sm-2 control-label" style="text-align:left">Gender</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <select class="form-control" id="emailGender" style="border-radius:10px" name="emailGender" data-parsley-id="20">
							  <option value="" selected="selected">Please Select</option>
							 							<option value="1">Male							</option><option value="2">Female							</option>
							
							  </select>
							 </div>
						</div>
						</div>
						
						<div id="maritalEmail" style="display: none;">
						<div class="form-group">
						  <label for="emailMarital" class="col-sm-2 control-label" style="text-align:left">Marital Status</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <select class="form-control" id="emailMarital" style="border-radius:10px" name="emailMarital" data-parsley-id="22">
							  <option value="" selected="selected">Please Select</option>
							 							<option value="1">Single							</option>
														<option value="2">Married							</option>
														<option value="3">Divorced							</option>
														<option value="7">Child (0-18yrs)							</option>
														<option value="5">Widow							</option>
														<option value="6">Widower							</option>
							
							  </select>
							 </div>
						</div>
						</div>
						
						<div id="statusEmail" style="display: none;">
						<div class="form-group">
						  <label for="emailStatus" class="col-sm-2 control-label" style="text-align:left">Status</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <select class="form-control" id="emailStatus" style="border-radius:10px" name="emailStatus" data-parsley-id="24">
							  <option value="" selected="selected">Please Select</option>
							  </select>
							 </div>
						</div>
						</div>
						<div id="departmentEmail" style="display: none;">
						<div class="form-group">
						  <label for="emailDepartment" class="col-sm-2 control-label" style="text-align:left">Departments</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <select class="form-control" id="emailDepartment" style="border-radius:10px" name="emailDepartment" data-parsley-id="26">
							  <option value="" selected="selected">Please Select</option>
          				    </select>
							 </div>
						</div>
						</div>
						
						<div id="giftEmail" style="display: none;">
						<div class="form-group">
						  <label for="emailGift" class="col-sm-2 control-label" style="text-align:left">Gift</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <select class="form-control" id="emailGift" style="border-radius:10px" name="emailGift" data-parsley-id="28">
							  <option value="" selected="selected">Please Select</option>
							  </select>
							 </div>
						</div>
						</div>
						
						<div id="economicEmail" style="display: none;">
						<div class="form-group">
						  <label for="emailEconomic" class="col-sm-2 control-label" style="text-align:left">Economic Status</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <select class="form-control" id="emailEconomic" style="border-radius:10px" name="emailEconomic" data-parsley-id="30">
							  <option value="" selected="selected">Please Select</option>
							  </select>
							 </div>
						</div>
						</div>
						
						<div id="professionEmail" style="display: none;">
						<div class="form-group">
						  <label for="emailProfession" class="col-sm-2 control-label" style="text-align:left">Profession</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <select class="form-control" id="emailProfession" style="border-radius:10px" name="emailProfession" data-parsley-id="32">
							  <option value="" selected="selected">Please Select</option>
							  </select>
							 </div>
						</div>
						</div>
						
						<div id="wayForwardEmail" style="display: none;">
						<div class="form-group">
						  <label for="emailAddressGroup" class="col-sm-2 control-label" style="text-align:left">Way Forward</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <select class="form-control" id="emailWayForward" style="border-radius:10px" name="emailWayForward" data-parsley-id="34">
							  <option value="" selected="selected">Please Select</option>
							  </select>
							 </div>
						</div>
						</div>
						
						<div class="form-group">
							<label for="notes" class="col-sm-2 control-label" style="text-align:left">Message<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
							<div class="col-sm-6 col-sm-offset-1">
						 <div class="dp_container"></div>
						 <textarea class="form-control" name="emailMessage" id="emailMessage" style="border-radius:10px" placeholder="SMS Message" rows="2" required="" data-parsley-id="36"></textarea>
						         <p id="textcount_feedback" class="form-text  text-muted" style="color: #ff0000">118/1</p>
							</div>
						</div>	
							
						</div>
						
						</div>
			    </div>
				</div>
				
          <div class="form-group">
				<div class="col-sm-3">
				  <button type="submit" data-loading-text="S..." id="savemember" name="savemember" class="btn btn-danger " style="text-align:left">Send</button>
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
      //initialize the javascript
      App.init();
      App.dashboard();

    });
  </script>

  @endsection