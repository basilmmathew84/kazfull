@extends('layouts.app')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
  <script>
   $(function() {
    $("#tabs").tabs();
	$("#general-next").click(function(){
			$("#form-general").validate();
			if ($('#form-general').valid()) // check if form is valid
			{
				$( "#tabs" ).tabs({ active: 1 });
			}
			
		});
	  $("#vehicle-next").click(function(){
		  $("#form-vehicle-general").validate();
		  if ($('#form-vehicle-general').valid()) // check if form is valid
			{
				$( "#tabs" ).tabs({ active: 2 });
			}
		});
	  
	  $("#vehicle-back").click(function(){
			$( "#tabs" ).tabs({ active: 0 }); 
	  });
	  
	  $("#last-back").click(function(){
			$( "#tabs" ).tabs({ active: 1 }); 
	  });
			
	});
  

	$(document).ready(function () {
		
						
		$("#whole-submit").click(function(e){
			
			$("#whole_name").val($("#name").val());
			$("#whole_gender").val($("#gender").val());
			$("#whole_name_somali").val($("#name_somali").val());			
			$("#whole_email").val($("#email").val());
			$("#whole_phone").val($("#phone").val());
			$("#whole_gender").val($("#gender").val());
			$("#whole_address").val($("#address").val());
			$("#whole_country_id").val($("#country_id").val());
			$("#whole_city_id").val($("#city_id").val());
			$("#whole_cbt").val($("#cbt").val());
			$("#whole_cb").val($("#cb").val());
			$("#whole_cc").val($("#cc").val());
			$("#whole_cf").val($("#cf").val());
			$("#whole_vehicle_number").val($("#vehicle_number").val());
			$("#whole_vehicle_name").val($("#vehicle_name").val());
			
			$("#form-docs").submit();
		});
		
	});
  </script>
  <script type="text/javascript">
		$( function() {
			$(".datepicker" ).datepicker();
		} );
  </script>
@section('content')
@include('layouts.top')
<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
  
      <!-- Begin Page Content -->
	  <div class="container-fluid">
		  
		  <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit Driver</h1>
		  <div class="col-md-2 mb-8 mb-sm-2 float-right">
			    <span class="pull-right">
						<a href="/Driver">
						<button type="submit" class="btn btn-primary">
                            View Drivers
						</button>
						</a>
				</span>
			  </div>
			<div class="row">
			@if($editInfo['status'] == "1")
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
				  <div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
					  <div class="row no-gutters align-items-center">
						<div class="col mr-2">
						  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings </div>
						  <div class="h5 mb-0 font-weight-bold text-gray-800">${{$drvCostInput}}</div>
						</div>
						<div class="col-auto">
						  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					  </div>
					</div>
				  </div>
				</div>
				
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
				  <div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
					  <div class="row no-gutters align-items-center">
						<div class="col mr-2">
						  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Trips</div>
						  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countInput}}</div>
						</div>
						<div class="col-auto">
						  <i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					  </div>
					</div>
				  </div>
				</div>



				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
				  <div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
					  <div class="row no-gutters align-items-center">
						<div class="col mr-2">
						  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Completed Trips</div>
						  <div class="row no-gutters align-items-center">
							<div class="col-auto">
							  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$drvCountAttdInput}}</div>
							</div>
							<div class="col">
							  <div class="progress progress-sm mr-2">
								<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							  </div>
							</div>
						  </div>
						</div>
						<div class="col-auto">
						  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					  </div>
					</div>
				  </div>
				</div>

				<!-- Pending Requests Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
				  <div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
					  <div class="row no-gutters align-items-center">
						<div class="col mr-2">
						  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Canceled Trips</div>
						  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$drvTotCanceledInput}}</div>
						</div>
						<div class="col-auto">
						  <i class="fas fa-comments fa-2x text-gray-300"></i>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  
			@endif
			<div id="tabs" style="width:900px;">
			  <ul>
				<li><a href="#tabs-1">General</a></li>
				<li><a href="#tabs-2">Vehicle Details</a></li>
				<li><a href="#tabs-3">Documents</a></li>
			  </ul>
			  <div id="tabs-1">
				<form id="form-general" class="user" method="POST" action="">
				@csrf
                <div class="col-lg-6">
                <div class="p-5">
                    <div class="form-group">
                       Name : 
					   <input name="name" required type="text" class="form-control-user form-control-2 form-control-user" id="name" aria-describedby="emailHelp" value="{{$editInfo['name']}}">
					</div>
                    <div class="form-group">
                       Name (Somali) : <input required name="name_somali"  type="text" class="form-control-2 form-control-user" id="name_somali" value="{{$editInfo['name_somali']}}">
                    </div>
					
					<div class="form-group">
                       Gender<select required class="form-control-2 form-control-user" id="gender" name="gender">
					   <option value="">Select</option>
					   <option value="1" @if($editInfo['gender'] == '1') selected @endif>Male</option>
					   <option value="0" @if($editInfo['gender'] == '0') selected @endif>Female</option>
						</select>
                    </div>
					
					<div class="form-group">
                       Email : <input required id="email" name="email"  type="email" class="form-control-2 form-control-user" value="{{$editInfo['email']}}">
                    </div>
					
					<div class="form-group">
                       Phone : <input id="phone" name="phone"  type="text" class="form-control-2 form-control-user" value="{{$editInfo['phone']}}">
                    </div>
					
					<div class="form-group"> 
					Address : <textarea name="address" class="form-control-2 form-control-user" id="address">{{$editInfo['address']}}</textarea>
                    </div>
					
					<div class="form-group">
                       Country : <select id="country_id" required class="form-control-2 form-control-user" name="country_id" >
					   <option value="">Select Country</option>
					   @foreach($country as $key =>  $input)
                        <option @if($input['id'] == $editInfo['country_id']) selected @endif value="{{$input['id']}}">{{$input['name']}}</option>
						@endforeach
                      </select>
                    </div>
					
					<div id="city-response" class="form-group">
                       City : <select id="city_id" required class="form-control-2 form-control-user" name="city_id">
					   <option value="">Select City</option>
					   @foreach($city as $key =>  $input)
                        <option @if($input['id'] == $editInfo['city_id']) selected @endif value="{{$input['id']}}">{{$input['name']}}</option>
						@endforeach
                      </select>
                    </div>
				<a href="/Driver">
					<button type="button" class="btn btn-secondary btn-user">
                        Cancel
					</button>
				</a>		
				<button id="general-next" type="button" class="btn btn-primary btn-user">
                        Next
				</button>
				
				</div>
				</div>
				</form>
			</div>
			 <div id="tabs-2">
			  <div class="container">
				<form id="form-vehicle-general" class="user" method="POST" action="">
				<div class="col-lg-6">
                <div class="p-5">
				<div class="form-group">
                       Vehicle Number : 
					   <input id="vehicle_number" required class="form-control-2 form-control-user" type="text" name="vehicle_number" value="{{$editVehicleInfo['vehicle_number']}}">
				</div>
					
				<div class="form-group">
                       Vehicle Name : 
					   <input id="vehicle_name" required class="form-control-2 form-control-user" type="text" name="vehicle_name"  value="{{$editVehicleInfo['vehicle_name']}}">
				</div>
				<div class="form-group"> 
                       Car Body Type : <select id="cbt" required class="form-control-2 form-control-user" name="cbt">
					   <option value="">Select</option>
					   @foreach($cbt as $key =>  $input)
                        <option @if($input['id'] == $editVehicleInfo['car_body_type']) selected @endif value="{{$input['id']}}">{{$input['name']}}</option>
						@endforeach
                      </select>
                </div>
					
				<div class="form-group">
                       Brand : <select id="cb" required class="form-control-2 form-control-user" name="cb">
					   <option value="">Select</option>
					   @foreach($cb as $key =>  $input)
                        <option @if($input['id'] == $editVehicleInfo['car_brand']) selected @endif value="{{$input['id']}}">{{$input['name']}}</option>
						@endforeach
                      </select>
                </div>
					
					
				<div class="form-group">
                       Color : <select id="cc" required class="form-control-2 form-control-user" name="cc">
					   <option value="">Select</option>
					   @foreach($cc as $key =>  $input)
                        <option @if($input['id'] == $editVehicleInfo['car_color']) selected @endif value="{{$input['id']}}">{{$input['name']}}</option>
						@endforeach
                      </select>
                </div>
					
					
				<div class="form-group">
                       Fuel Type : <select id="cf" required class="form-control-2 form-control-user" name="cf">
					   <option value="">Select Country</option>
					   @foreach($cf as $key =>  $input)
                        <option  @if($input['id'] == $editVehicleInfo['car_fuel']) selected @endif value="{{$input['id']}}">{{$input['name']}}</option>
						@endforeach
                      </select>
                </div>
				<a href="/Driver">
					<button type="button" class="btn btn-secondary btn-user">
                        Cancel
					</button>
				</a>
				<button id="vehicle-back" type="button" class="btn btn-secondary btn-user">
                        Back
				</button>
				<button id="vehicle-next" type="button" class="btn btn-primary btn-user">
                        Next
				</button>
				
				</div>
				</div>
				</form>
				</div>
			 </div>
			  
			  <div id="tabs-3">
				
				<form id="form-docs" class="user" method="POST" action="/editDriverDocs/{{$editInfo['id'] }}"  enctype="multipart/form-data">
				@csrf
                <div class="col-lg-12">
					<div class="p-5">
					<input type="hidden" id="whole_name" name="whole_name" value=""/>
					<input type="hidden" id="whole_name_somali" name="whole_name_somali" value=""/>
					<input type="hidden" id="whole_gender" name="whole_gender" value=""/>
					<input type="hidden" id="whole_email" name="whole_email" value=""/>
					<input type="hidden" id="whole_phone" name="whole_phone" value=""/>
					<input type="hidden" id="whole_address" name="whole_address" value=""/>
					<input type="hidden" id="whole_country_id" name="whole_country_id" value=""/>
					<input type="hidden" id="whole_city_id" name="whole_city_id" value=""/>
					<input type="hidden" id="whole_cbt" name="whole_cbt" value=""/>
					<input type="hidden" id="whole_cb" name="whole_cb" value=""/>
					<input type="hidden" id="whole_cc" name="whole_cc" value=""/>
					<input type="hidden" id="whole_cf" name="whole_cf" value=""/>
					<input type="hidden" id="whole_vehicle_number" name="whole_vehicle_number" value=""/>
					<input type="hidden" id="whole_vehicle_name" name="whole_vehicle_name" value=""/>
					
					<div class="form-group">
                       Profile Picture : 
					   <br/>
					   <input id="profile_picture" type="file" name="profile_picture">
                    </div>
					<div class="form-group row">
                      <div class="col-sm-4 mb-3 mb-sm-0">
						   <label> Driving Licence :</label>
						   <input id="driving_licence" required type="file" name="driving_licence">
					   </div>
					   <div class="col-sm-4">
						   <label> Issue Date :</label>
						   <input value={{date("m/d/Y",strtotime($editVehicleInfo['driving_issue']))}} required class="form-control-2 form-control-user datepicker" type="text" name="driving_issue">&nbsp;&nbsp;
					   </div>
					   <div class="col-sm-4">
						   <label> Expiry Date :</label>
						   <input value={{date("m/d/Y",strtotime($editVehicleInfo['driving_expiry']))}} required class="form-control-2 form-control-user datepicker"type="text" name="driving_expiry">
						</div>
					</div>
									
					  
					   
					<div class="form-group row">
						<div class="col-sm-4 mb-3 mb-sm-0">
						   <label> Vehicle Paper : </label>
						   <input type="file" name="vehicle_number">
						</div>
						<div class="col-sm-4">
						   <label> Issue Date :</label>
						   <input value={{date("m/d/Y",strtotime($editVehicleInfo['vehicle_issue']))}} required class="form-control-2 form-control-user datepicker" type="text" name="vehicle_issue">&nbsp;&nbsp;
						</div>
						<div class="col-sm-4">
						   <label> Expiry Date :</label>
						   <input value={{date("m/d/Y",strtotime($editVehicleInfo['vehicle_expiry']))}} required class="form-control-2 form-control-user datepicker"type="text" name="vehicle_expiry">
						</div>
					</div>
					
					
					<div class="form-group row">
						<div class="col-sm-4 mb-3 mb-sm-0">
						   <label> Insurance : </label>
						   <input type="file" name="insurance">
						</div>
						<div class="col-sm-4">
						   <label> Issue Date :</label>
						   <input value={{date("m/d/Y",strtotime($editVehicleInfo['insurance_issue']))}} required class="form-control-2 form-control-user datepicker" type="text" name="insurance_issue">&nbsp;&nbsp;
						</div>
						<div class="col-sm-4">
						   <label> Expiry Date :</label>
						   <input value={{date("m/d/Y",strtotime($editVehicleInfo['insurance_expiry']))}} required class="form-control-2 form-control-user datepicker"type="text" name="insurance_expiry">
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-sm-4 mb-3 mb-sm-0">
						   <label> Id Proof : </label>
						   <input type="file" name="id_proof">
						</div>
						<div class="col-sm-4">
						   <label> Issue Date :</label>
						   <input value={{date("m/d/Y",strtotime($editVehicleInfo['id_issue']))}} required class="form-control-2 form-control-user datepicker" type="text" name="id_issue">&nbsp;&nbsp;
					    </div>
						<div class="col-sm-4">
						   <label> Expiry Date :</label>
						   <input value={{date("m/d/Y",strtotime($editVehicleInfo['id_expiry']))}} required class="form-control-2 form-control-user datepicker"type="text" name="id_expiry">
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-sm-4 mb-3 mb-sm-0">
						   <label> Address Proof : </label>
						   <input type="file" name="address_proof">
						</div>
						<div class="col-sm-4">
						   <label> Issue Date :</label>
						   <input value={{date("m/d/Y",strtotime($editVehicleInfo['address_issue']))}} required class="form-control-2 form-control-user datepicker" type="text" name="address_issue">&nbsp;&nbsp;
						</div>
						<div class="col-sm-4">
						   <label> Expiry Date :</label>
						   <input value={{date("m/d/Y",strtotime($editVehicleInfo['address_expiry']))}} required class="form-control-2 form-control-user datepicker"type="text" name="address_expiry">
						</div>
					</div>	
					
					<div class="form-group">
					   Others :
					   <br/>
                       <input type="file" name="photo">
                    </div>
									
					<button id="last-back" type="button" class="btn btn-secondary btn-user">
							Back
					</button>
					
					<a href="/Driver">
						<button type="button" class="btn btn-secondary btn-user">
							Cancel
						</button>
					</a>
					
					<button  id="whole-submit" type="button" class="btn btn-primary btn-user">
							Submit
					</button>
					
					</div>
					
				</div>
				</form>
				
				
			  </div>
			  
			</div>
             
             
         
            </div>
	    </div>  
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    
    <!-- End of Content Wrapper -->

  
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 
@endsection
  
   <script type="text/javascript">
  
                $(document).ready(function () {
                    //$("select#services").select2({ placeholder: "Select services", width: "100%" });
                    //$("select#brands").select2({ placeholder: "Select brands", width: "100%"});
					
					$("#phone").change(function(e){
						e.preventDefault();
						var phone = $(this).val();
						$.ajax({
						   type:'POST',
						   url:'/ajaxPhoneValidate',
						   dataType:'json',
						   data:{"_token": "{{ csrf_token() }}",
							   phone:phone
							   },
						   success:function(data){
							   if(data.phone != null)
							   {
									$("#phone").after('<label id="email-error" class="error" for="email">'+data.phone+' is already choosen.</label>');
							   }
							   $("#phone").on('keyup',function (){
										$("#phone").next(".error").remove();
									});
							}
						});
					});
					
					$("#country_id").change(function(e){
						e.preventDefault();
						
						var id = $(this).val();
						
						$.ajax({
						   type:'POST',
						   url:'/ajaxCountryCity',
						   data:{"_token": "{{ csrf_token() }}",
							   id:id
							   },
						   success:function(data){
								$("#city-response").html(data);
							}
						});
					});
					
				});
    </script>
	
 <!--Bootstrap core JavaScript
  <script src="vendor/jquery/jquery.min.js"></script>-->
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <!--Page level custom scripts -->
  <script src="/js/demo/datatables-demo.js"></script>

 
  