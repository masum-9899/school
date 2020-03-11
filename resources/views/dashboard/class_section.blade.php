@include('dashboard.header')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class = "row">
		<div class="col-md-12 ">

			<!-- general form elements -->

			<div class="box box-primary" >
				<div class="box-header with-border">
					<h3 class="box-title">Add Class and Section</h3>
					<br>
					<br>

					<div class ="row">
						<form method="post" action="">
							<div class = "col-md-4 col-lg-3 col-sm-4">

							  <input type="text" class="form-control" id="class_name"  name ="class_name"  placeholder="Enter Class Name">
                            
							</div>

							

							

							
							<div class ="col-md-2">
								<button type="button" class="btn btn-primary" id = "show">Apply</button>
							</div>





						</div>
					</div>


					<!-- /.box-header -->
					<!-- form start -->
					<div  id="myDiv">

						<div class="box-body">
                          <div class="row">
                            
                            <div class="col-md-4 col-lg-4">

							<table  class="table table-bordered table-striped" id="tb">
								<tr>
									<th>Section</th>

									<th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th>
								</tr>	


									<tr>
										
										<td><input type="text" name="section[]" class="form-control"></td>
										
										<td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
									</tr>
								</table>
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
								<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
								<script>
									$(function(){
										$('#addMore').on('click', function() {
											var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
											data.find("input").val('');
										});
										$(document).on('click', '.remove', function() {
											var trIndex = $(this).closest("tr").index();
											if(trIndex>1) {
												$(this).closest("tr").remove();
											} else {
												alert("Sorry!! Can't remove first row!");
											}
										});
									});      
								</script>
							</div>

                              </div>
							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="button" name="student_entry" id= "submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>

				</div>
				<!-- /.box -->


				<!-- /.box -->

				<!-- Input addon -->

				<!-- /.box -->

			</div>
		</div>

	</div>




	<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
	immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>




@include('dashboard.footer')


<script>

	

    

	

$(function () {

	$.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $('#submit').click(function(){

    	 var section = [];            
        $('input[name^=section]').each(function(){
            section.push($(this).val());
        });
      

var class_name = $("#class_name").val();




var formData= new FormData();
formData.append('class',class_name);
formData.append('section',section);


 


          $.ajax({
	processData: false,
	contentType: false,
	type:'POST',
	url:"{{url('class_section')}}",
	
	data: formData,
	
	success:function(data, status){

		alert("Student Record Added Successfully");

	  location.reload();

	},

});

    });

	$("#myDiv").hide();
	$("#show").click(function(){
        
        var class_name = $("#class_name").val();
        if(!class_name)
        {
        	alert("Please enter a class name");
        }

        else{
             $("#myDiv").show();
        }

		//
	});
	$('#datepicker').datepicker({
		autoclose: true,
		todayHighlight: true
	}).datepicker('update', new Date())

	$('#example1').DataTable()
	$('#example2').DataTable({
		'paging' : true,
		'lengthChange': false,
		'searching' : false,
		'ordering' : true,
		'info' : true,
		'autoWidth' : false
	})
})
</script>