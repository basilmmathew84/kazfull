@extends('layouts.app')
  <script src="/js/jquery.croppie.js"></script>
  <script src="/js/croppie.js"></script>

  <link rel="stylesheet" href="/css/croppie.css">
@section('content')

@include('layouts.top')

        <!-- Begin Page Content -->
        <div class="container-fluid">

       
		<h1 class="h3 mb-2 text-gray-800">Edit Brand</h1>
   
     <div class="row">

              <div class="col-lg-6">
                <div class="p-5">
                  
                    <form class="user" method="POST" action="/editCarBrand/{{$editInfo['id'] }}" enctype="multipart/form-data">
				    @csrf
                   
					
					<div class="form-group">
                       Name : 
					   <input id="exampleInputEmail" type="text" required class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ $editInfo['name'] }}" autocomplete="name" autofocus placeholder="Enter Name">

                    </div>
					
                   					
					<div class="form-group">
                       Name (Somali) : 
					  <input id="name_somali" type="text" required class="form-control form-control-user @error('name_somali') is-invalid @enderror" name="name_somali" value="{{ $editInfo['name_somali'] }}" autocomplete="name_somali" placeholder="Name(Somali)"> 

                    </div>
					
					<div>
					<input name="icon" type="hidden" value="" id="icon-value">
					</div>
					
					<div class="form-group">
					  <div class="col-sm-6 mb-3 mb-sm-0">
					  <div id="img-div">
					  Icon
					   @if($editInfo['icon'])
					   <img src="/upload-brand/{{$editInfo['icon']}}" style="width:75px;">
					   @endif
						
					   <a class="edit-flag" href="#">
						<i class="fa fa-edit"></i>
					   </a>
					  </div>
						
					   <!--<input id="class-browse" type="file" name="icon" style="display:none;">-->
					   <input type="hidden" name="flag-old" value="{{$editInfo['icon']}}">
					  </div>
					   
                    </div>
					
					
					 <button type="submit" class="btn btn-primary btn-user">
                                    Submit
				   </button>
				  
                   <a href="/Brand">
						<button type="button" class="btn btn-secondary btn-user">
                                    Cancel
						</button>
				   </a>
					
					
					
					
                    
                    
                  </form>
                  
                </div>
              </div>
            </div>
        
		
		<div id="class-browse" class="panel panel-default class-browse" style="display:none;">
		  <div class="panel-heading">Image Upload</div>
		  <div class="panel-body">


			<div class="row">
				<div class="col-md-4 text-center">
					<div id="upload-demo" style="width:350px"></div>
				</div>
				<div class="col-md-4" style="padding-top:30px;padding-left:30px;">
					<strong>Select Image:</strong>
					<br/>
					<input type="file" id="upload">
					<br/>
					<br/>
					<button class="btn btn-success upload-result">Upload Image</button>
				</div>
				<div class="col-md-4" style="">
					<div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
				</div>
			</div>


		  </div>
		</div>
 

     
        <!-- /.container-fluid -->
        
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
  
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'square'
    },
    boundary: {
        width: 300,
        height: 300
    }
});


$('#upload').on('change', function () { 
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    	
    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-result').on('click', function (ev) {
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {


		$.ajax({
			url: "/ajax/ajaxpro.php",
			type: "POST",
			data: {"image":resp},
			success: function (data) {
				$("#icon-value").val(data);
				html = '<img src="' + resp + '" />';
				$("#upload-demo-i").html(html);
			}
		});
	});
});


</script>
  
@endsection

<!-- Bootstrap core JavaScript
  <script src="/vendor/jquery/jquery.min.js"></script>-->
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/js/demo/datatables-demo.js"></script>
  
  <script>
  
  $(document).ready(function(){
   $(".edit-flag").click(function (){
	   $("#class-browse").show();
	   $("#img-div").hide('slow');
   });
});
  </script>