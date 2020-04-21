<!DOCTYPE html>
<html>
	<head>
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<div align="right" style="margin-bottom:5px;">
				<button type="button" name="add_button" id="add_button" class="btn btn-success btn-xs">Add</button>
			</div>

			<div class="table-responsive">
			<table class="table table-striped table-dark">
					<thead>
						<tr>
							<th>Name</th>
							<th>Phone Number</th>
							<th>Email ID</th>
							<th>Item</th>
							<th>Price</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</body>
</html>

<!-- Modal -->
<div class="modal fade" id="apicrudModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="api_crud_form">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Add Data</h4>
		      	</div>
		      	<div class="modal-body">
		      		<div class="form-group">
			        	<label>Name</label>
			        	<input type="text" name="name" id="name" class="form-control" />
					</div>
					<div class="form-group">
			        	<label>Phone Number</label>
			        	<input type="text" name="phoneNumber" id="phoneNumber" class="form-control" />
					</div>
					<div class="form-group">
			        	<label>Email ID</label>
			        	<input type="text" name="emailID" id="emailID" class="form-control" />
			        </div>
			        <div class="form-group">
			        	<label>Item</label>
			        	<input type="text" name="item" id="item" class="form-control" />
					</div>
					<div class="form-group">
			        	<label>Price</label>
			        	<input type="text" name="price" id="price" class="form-control" />
			        </div>
			    </div>
			    <div class="modal-footer">
			    	<input type="hidden" name="hidden_id" id="hidden_id" />
			    	<input type="hidden" name="action" id="action" value="insert" />
			    	<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert" />
			    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
			</form>
		</div>
  	</div>
</div>


<script type="text/javascript">
$(document).ready(function(){

	fetch_data();

	function fetch_data()
	{
		$.ajax({
			url:"./productRestApi/fetch.php",
			success:function(data)
			{
				$('tbody').html(data);
			}
		})
	}

	$('#add_button').click(function(){
		$('#action').val('insert');
		$('#button_action').val('Insert');
		$('.modal-title').text('Add Data');
		$('#apicrudModal').modal('show');
	});

	$('#api_crud_form').on('submit', function(event){
		event.preventDefault();
		if($('#name').val() == '')
		{
			alert("Enter Name");
		}
		else if($('#phoneNumber').val() == '')
		{
			alert("Enter phoneNumber");
		} 
		else if($('#emailID').val() == '')
		{
			alert("Enter emailID");
		}
		else if($('#item').val() == '')
		{
			alert("Enter item");
		}
		else if($('#price').val() == '')
		{
			alert("Enter price");
		}
		else
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"./productRestApi/action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					fetch_data();
					$('#api_crud_form')[0].reset();
					$('#apicrudModal').modal('hide');
					if(data == 'insert')
					{
						alert("Data Inserted using PHP API");
					}
					if(data == 'update')
					{
						alert("Data Updated using PHP API");
					}
				}
			});
		}
	});

	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"./productRestApi/action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#hidden_id').val(id);
				$('#name').val(data.name);
				$('#phoneNumber').val(data.phoneNumber);
				$('#emailID').val(data.emailID);
				$('#item').val(data.item);
				$('#price').val(data.price);
				$('#action').val('update');
				$('#button_action').val('Update');
				$('.modal-title').text('Edit Data');
				$('#apicrudModal').modal('show');
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		var action = 'delete';
		if(confirm("Are you sure you want to remove this data using PHP API?"))
		{
			$.ajax({
				url:"./productRestApi/action.php",
				method:"POST",
				data:{id:id, action:action},
				success:function(data)
				{
					fetch_data();
					alert("Data Deleted using PHP API");
				}
			});
		}
	});

});
</script>