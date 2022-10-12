@extends('layouts.app')

@section('content')

@include('layouts.top')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<script>
    function validatePassword() {
        var validator = $("#loginForm").validate({
            rules: {
                password: "required",
                confirm_password: {
                    equalTo: "#password"
                }
            },
            messages: {
                password: " Enter Password",
                confirm_password: " Enter Confirm Password Same as Password"
            }
        });
        if (validator.form()) {
            $("#loginForm").submit();
        }
    }
 
</script>
      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">New Passangers</h1>
		  <div class="col-md-2 mb-8 mb-sm-2 float-right">
			    <span class="pull-right">
						<a href="/Customers">
						<button type="submit" class="btn btn-primary">
                            View Passangers
						</button>
						</a>
				</span>
			  </div>
			<div class="row">
			<div class="col-lg-6">
			  <div class="p-5">
                  <form id="loginForm" class="user" method="POST" action="/addCustomers"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                       Name : 
					   <input name="name" required type="text" class="form-control-2 form-control-user" id="" aria-describedby="emailHelp">
				    </div>
				    <div class="form-group">
                       Gender<select required class="form-control-2 form-control-user" id="gender" name="gender">
					   <option value="">Select</option>
					   <option value="1">Male</option>
					   <option value="0">Female</option>
						</select>
                    </div>
					<div class="form-group">
                       Mobile Number : 
					   <input name="mobile" required type="text" class="form-control-2 form-control-user" id="mobile">
					</div>
                    <div class="form-group">
                       Email : <input required name="email" type="email" class="form-control-2 form-control-user">
                    </div>

					<div class="form-group">
                       Country<select required class="form-control-2 form-control-user" id="country_id" name="country_id">
					   <option value="">Select Country</option>
					   @foreach($country as $key =>  $input)
                        <option value="{{$input['id']}}">{{$input['name']}}</option>
						@endforeach
                      </select>
                    </div>
					<div class="form-group">
                       Password : <input id="password" required name="password"  type="password" class="form-control-2 form-control-user">
                    </div>
					<div class="form-group">
                       Confirm Password : <input id="confirm_password" required name="confirm_password"  type="password" class="form-control-2 form-control-user">
                    </div>
					
					<div class="form-group">
                       Profile Picture : <input type="file" name="profile_picture">
                    </div>
				   <button type="button" class="btn btn-primary btn-user" onClick="validatePassword();">
							Submit
				   </button>
				   <a href="/Customers">
						<button type="button" class="btn btn-secondary btn-user">
							Cancel
						</button>
				   </a>
                  </form>
                </div>
              </div>
            </div>
        </div>  
      <!-- End of Main Content -->

      <!-- Footer -->
   	  @include('layouts.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <script type="text/javascript">
					$(document).ready(function () {
					
					$("#mobile").change(function(e){
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
									$("#mobile").after('<label id="email-error" class="error" for="email">'+data.phone+' is already choosen.</label>');
							   }
							   $("#mobile").on('keyup',function (){
										$("#mobile").next(".error").remove();
									});
							}
						});
					});
				});	
    </script>
  
  
@endsection

<!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>