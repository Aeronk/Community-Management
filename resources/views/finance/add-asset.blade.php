<form class="form-horizontal group-border-dashed" name="assetsForm" id="assetsForm" method="post" action="assetsJoin.php" enctype="multipart/form-data" novalidate=""><!--start of form---->
			<div class="panel-group" id="accordion">
			<a name="showother"></a>
				
			<div class="panel panel-danger" style="padding:0px">
							<div class="panel-heading" style="padding:8px">
					<h4 class="panel-title" style="text-align:left">
						<a href="#basic" id="BasicInfor" data-toggle="collapse" data-parent="accordion">Asset Capture</a>
					</h4>
				</div>
					
					<div id="basic" class="collapse in">
						<div class="panel-body">
						
						 
						   <div class="form-group">
						  <label for="branch" class="col-sm-2 control-label" style="text-align:left" required="">Branch<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
							<div class="col-sm-3  col-sm-offset-1">
							  <select class="form-control" style="border-radius:10px" id="branch" name="branch" required="" data-parsley-id="4">
							<!--option values from the database-->
														<option value="126" selected="selected">Mutare City UFIC Assembly</option>
														  </select>
							 </div>
						</div>
						
						<div class="form-group">
						  <label for="assetgroup" class="col-sm-2 control-label" style="text-align:left" required="">Asset Group<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
							<div class="col-sm-3  col-sm-offset-1">
							  <select class="form-control" id="assetgroup" style="border-radius:10px" name="assetgroup" required="" data-parsley-id="6">
							  <option value="" selected="selected">Please Select</option>
							<!--option values from the database-->
														  </select>
							 </div>
							  <label for="addAssetGroup" class="col-sm-2 control-label" style="text-align:left">
							  <a href="#addAssetGroup" data-toggle="modal" style="text-decoration:none">Add Asset Group</a></label>
						</div>
										
						
							<div class="form-group"> 
							<label for="description" class="col-sm-2 control-label" style="text-align:left">Asset Description</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <input type="text" class="form-control" id="description" style="border-radius: 10px; background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR4nGP6zwAAAgcBApocMXEAAAAASUVORK5CYII=&quot;); cursor: pointer;" name="description" placeholder="" data-parsley-id="8"> 
							</div>
						  </div>
						  
						  <div class="form-group"> 
							<label for="serialnumber" class="col-sm-2 control-label" style="text-align:left">Serial Number<i style="color:red" class="iglyphicon glyphicon-asterisk"></i></label>
							<div class="col-sm-3 col-sm-offset-1">
							  <input type="text" class="form-control" id="serialnumber" style="border-radius:10px" name="serialnumber" placeholder="" required="" data-parsley-id="10"> 
							</div>
						  </div>
						  
						  	<div class="form-group">
						  <label for="manufacturer" class="col-sm-2 control-label" style="text-align:left">Manufacturer</label>
							<div class="col-sm-3  col-sm-offset-1">
							  <select class="form-control" id="manufacturer" style="border-radius:10px" name="manufacturer" data-parsley-id="12">
							  <option value="" selected="selected">Please Select</option>
							<!--option values from the database-->
														  </select>
							 </div>
							  <label for="addManufacturer" class="col-sm-2 control-label" style="text-align:left">
							  <a href="#addManufacturer" data-toggle="modal" style="text-decoration:none">  Add Manufacturer</a></label>
						</div>
						
						 <div class="form-group"> 
							<label for="invoice" class="col-sm-2 control-label" style="text-align:left">Invoice Number</label>
							<div class="col-sm-3 col-sm-offset-1">
							  <input type="text" class="form-control" id="invoice" style="border-radius:10px" name="invoice" placeholder="" data-parsley-id="14"> 
							</div>
						  </div>
						  
						   <div class="form-group"> 
							<label for="quantity" class="col-sm-2 control-label" style="text-align:left">Quantity </label>
							<div class="col-sm-3 col-sm-offset-1">
							  <input type="text" class="form-control" id="quantity" style="border-radius:10px" name="quantity" placeholder="" data-parsley-id="16"> 
							</div>
						  </div>
						  
						   <div class="form-group"> 
							<label for="amount" class="col-sm-2 control-label" style="text-align:left">Amount </label>
							<div class="col-sm-3 col-sm-offset-1">
							  <input type="text" class="form-control" id="amount" data-parsley-type="number" style="border-radius:10px" name="amount" placeholder="" data-parsley-id="18"> 
							</div>
						  </div>
						  
						  	<div class="form-group">
							<label for="comment" class="col-sm-2 control-label" style="text-align:left">Comment</label>
							<div class="col-sm-6 col-sm-offset-1">
						 
						 <textarea name="comment" id="comment" class="form-control" style="border-radius:10px" data-parsley-id="20">							</textarea>
						</div>					
						</div>
						 
						 <div class="form-group">
						    <label for="profpic" class="col-sm-2 control-label" style="text-align:left">Asset Picture</label>
						   <div class="col-sm-3 col-sm-offset-1">
							<input id="profpic" type="file" name="profpic" class="form-control" data-parsley-id="22"> 
						   </div>
						</div>
						
						<div class="form-group">
							<label for="purchase" class="col-sm-2 control-label" style="text-align:left">Purchase Date</label>
							<div class="col-sm-3 col-sm-offset-1">
						 <div class="dp_container"></div>
						 <input type="text" id="datepicker" style="border-radius:10px" class="form-control hasDatepicker" name="purchase" placeholder="dd/mm/yyyy" data-parsley-id="24">
							</div>
						</div>
								  
						  

					
					   						
					
						
						</div>
			</div>

		</div>
		     
		<div>  <!--start of save button---->
			  <div class="form-group">
				<div class="col-sm-3">
				  <button type="submit" data-loading-text="S..." id="saveassets" name="saveassets" class="btn btn-danger" style="text-align:left">Save</button>
				  </div>
			  </div>
		</div> <!--end of save button---->
		<!--end of form---->

</div></form>