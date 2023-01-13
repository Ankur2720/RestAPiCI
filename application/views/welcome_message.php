<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
#loader {
position: fixed;
left: 0px;
top: 0px;
width: 199px;
height: 199px;
z-index: 9999;
opacity: 75;
margin-left: 50%;
margin-top: 5%;
background-color: rgba(255, 255, 255, 0.5);;
/*background: url('pageloader.gif') 50% 50% no-repeat rgb(249,249,249);*/
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- <div class="box-header">
					<h3 class="box-title" style="float: left;"><i class="fa fa-list"></i> <strong> WhatsApp Template Crud </strong></h3>
					<div class="text-right">
										<a href="javascript:void(0);" onclick="showModal()" style="margin:5px 0;" data-toggle="modal" data-target="#addTransaction" class="btn btn-primary btn-xs">
										<i class="fa fa-plus"></i> Add New Entry</a>
					</div>
</div>
-->
<nav class="navbar navbar-light bg-light" style="float:right;">
	<form class="form">
		<button class="btn btn-md btn-outline-success" id="refreshbutton" type="button" style="
		height: 38px;
		width: 66px;
		"><i class="fa fa-refresh" aria-hidden="true"></i></button>
		<button class="btn btn-outline-success float-right" id="addbutton" type="button" style="
		margin-right: 62px;
		margin-top: 3px;
		">Add Data</button>
	</form>
</nav>
<div class="col-md-12 pt-3" id="table">
	<div class="alert alert-success messagealert" style="margin-top: 77px;" id="messagediv" role="alert">
		<h4 class="alert-heading"></h4>
	</div>
	<table class="table table-striped table-bordered table-hover">
		<thead class="bg-blue-gradient">
			<tr>
				<th align="left" valign="top">ID</th>
				<th align="left" valign="top">Longitude</th>
				<th align="left" valign="top">Latitude</th>
				<th align="left" valign="top">Status</th>
				<th align="left" valign="top">Edit</th>
				<th align="left" valign="top">Delete</th>
				<th align="left" valign="top">Select</th>
			</tr>
		</thead>
		<?php
		
		if (!empty($data)) {
		
			foreach ($data as $userData) {
		?>
		
		<tr>
			
			<td><?=$userData->id; ?></td>
			<td><?=$longitude  =  !empty($userData->longitude) ?  $userData->longitude : 'No Data' ;?></td>
			<td><?=$latitude   =  !empty($userData->latitude)  ?  $userData->latitude  : 'No Data' ;?></td>
			<td><?=$status     =  ($userData->status)   	   ? 'Active' 		       : 'Inactive';?></td>
			<td><a href="javascript:void(0);" onclick="editData(<?=$userData->id;?>, <?=$longitude;?>, <?=$latitude;?>);" style="padding:1px 2px;" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true" style="padding-right:5px;"></i>&nbsp;Edit</a></td>
			<td><a href="javascript:void(0);" onclick="deleteDetails(<?=$userData->id;?>);" style="padding:1px 2px;" class="btn btn-default"><i class="fa fa-trash" aria-hidden="true" style="padding-right:5px;"></i>&nbsp;Delete</a>
			<td><a href="javascript:void(0);" onclick="selectDetails(<?=$userData->id;?>, <?=$longitude;?>, <?=$latitude;?>);" style="padding:1px 2px;" class="btn btn-default"><i class="fa fa-check" aria-hidden="true" style="padding-right:5px;"></i>&nbsp;Select</a>
		</td>
	</tr>
	<?php
	}
	} else {
	?>
	<td align="left" valign="top" colspan="10">No Record Found!</td>
	<?php
	}
	?>
</table>
</div>
<div class="modal editmodal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Edit Modal</h5>
			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" method="POST" id="editform" role="form">
				<input type="hidden" id="tableid" name="" value=""/>
				<div class="form-group">
					<label class="control-label"><b><span style="color:red;">*</span> Latitude </b></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="editlatitude"
						name="latitude" placeholder="latitude" />
					</div>
				</div>
				<div class="form-group  mt-sm-3">
					<label class="control-label"><b><span style="color:red;">*</span> Longitude </b></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="editlongitude"
						name="longitude" placeholder="longitude" />
					</div>
				</div>
				<div class="d-flex flex-row  mt-sm-3">
					<div class="radio col-md-3">
						<label ><input type="radio"  value="1" style="margin-right: 10px;" name="status" checked >Active</label>
					</div>
					<div class="radio">
						<label><input type="radio" value="0" style="margin-right: 10px;" name="status">Inactive</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="saveeditdetails" class="btn btn-primary">Update</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<!-- add details modal start-->
<div class="modal addmodal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Add Modal</h5>
			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<input type="hidden" id="tableid" name="" value=""/>
			<form class="form-horizontal" method="POST" id="addform" role="form">
				<div class="form-group">
					<label class="control-label"><b><span style="color:red;">*</span> Latitude </b></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="addlatitude"
						name="latitude" placeholder="latitude" />
					</div>
				</div>
				<div class="form-group  mt-sm-3">
					<label class="control-label"><b><span style="color:red;">*</span> Longitude </b></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="addlongitude"
						name="longitude" placeholder="longitude" />
					</div>
				</div>
				<div class="d-flex flex-row  mt-sm-3">
					<div class="radio col-md-3">
						<label ><input type="radio"  value="1" style="margin-right: 10px;" name="status" checked >Active</label>
					</div>
					<div class="radio">
						<label><input type="radio" value="0" style="margin-right: 10px;" name="status">Inactive</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="savedetails" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

<!-- for calculate the 2 latitude AND longitude we are making two hidden input field .. -->
<input type="hidden" id="id1">
<!-- for calculate the 2 latitude AND longitude we are making two hidden input field .. -->


<form id="calculateform">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">1</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="latitude1">
      <input type="text"  class="form-control" id="longitude1">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">2</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="latitude2">
      <input type="text"  class="form-control" id="longitude2">
    </div>
  </div>
  	<div class="modal-footer">
		<button type="button" id="calculate" class="btn btn-primary">Calculate</button>
	</div>
</form>


<div id='loader' class="loader" style='display: none;'>
<img src="application/images/loader.gif" width="100%" height="100%">
</div>
<!-- add details modal end -->
<!-- script here start -->
<script>

function editData( id, longitude, latitude) {
	$("#tableid").val(id);
	$("#editlongitude").val(longitude);
	$("#editlatitude").val(latitude);
	$(".editmodal").modal('show');
}
function deleteDetails( id) {
	if(confirm("Are you sure you want to delete this entry !.")) {
		$.ajax({
		url: '<?= site_url()?>' + "welcome/deleteEntry",
		data: {
			"id": id
		},
		type: "POST",
		dataType: 'json',
		beforeSend: function() {
			$("#loader").show();
		},
		success: function(resp) {
				if(!resp.status) {
					$("#messagediv").addClass('alert-danger').removeClass('alert-success');
					$("#loader").hide();
				} else  {
					$("#loader").hide();
					$("#messagediv").addClass('alert-success').removeClass('alert-danger');
				}
				console.log(resp);
				$(".alert-heading").html(resp.message);
				$('.messagealert').show();
				setTimeout(function() {
				$('.messagealert').fadeOut('fast');
				}, 5000);
				location.reload();
			}
		});
	}
}

$("#addbutton").click(function () {
	$(".addmodal").modal("show");
	$(".modal-backdrop").remove();
});

function deleteDetails( id) {
	if(confirm("Are you sure you want to delete this entry !.")) {
		$.ajax({
		url: '<?= site_url()?>' + "welcome/deleteEntry",
		data: {
			"id": id
		},
		type: "POST",
		dataType: 'json',
		beforeSend: function() {
		$("#loader").show();
		},
		success: function(resp) {
				if(!resp.status) {
					$("#messagediv").addClass('alert-danger').removeClass('alert-success');
					$("#loader").hide();
				} else  {
					$("#loader").hide();
					$("#messagediv").addClass('alert-success').removeClass('alert-danger');
				}
				console.log(resp);
				$(".alert-heading").html(resp.message);
				$('.messagealert').show();
				setTimeout(function() {
				$('.messagealert').fadeOut('fast');
				}, 5000);
				location.reload();
			}
		});
	}
}
$("#savedetails").click(function(){
	if( $("#addlatitide").val() == '') {
	alert("Latitude can't be empty.");
	return false;
	}
	if( $("#addlongitude").val() == '') {
	alert("Longitude can't be empty.");
	return false;
	}
	$.ajax({
	url: '<?= site_url()?>' + "welcome/saveEntry",
	data: $("#addform").serializeArray(),
	type: "POST",
	dataType: 'json',
	beforeSend: function() {
		$("#loader").show();
	},
	success: function(resp) {
			if(!resp.status) {
				$("#messagediv").addClass('alert-danger').removeClass('alert-success');
				$("#loader").hide();
			} else  {
				$("#loader").hide();
				$("#messagediv").addClass('alert-success').removeClass('alert-danger');
				$(".editmodal").modal("hide");
				location.reload();
			}

			$(".alert-heading").html(resp.message);
			$('.messagealert').show();
			setTimeout(function() {
			$('.messagealert').fadeOut('fast');
			}, 5000);
		}
	});
});
$( document).ready(function() {
	$(".messagealert").hide();
	$("#calculateform").hide();
});
$("#saveeditdetails").click(function(){
	if( $("#editlatitide").val() == '') {
		alert("Latitude can't be empty.");
		return false;
	}
	if( $("#editlongitude").val() == '') {
		alert("Longitude can't be empty.");
		return false;
	}
	var id  =  $("#tableid").val();
	$.ajax({
	url: '<?= site_url()?>' + "welcome/updateEntry",
	data: $("#editform").serialize()+'&id=' +id,
	type: "POST",
	dataType: 'json',
	beforeSend: function() {
		$("#loader").show();
	},
	success: function(resp) {
			if(!resp.status) {
				$("#messagediv").addClass('alert-danger').removeClass('alert-success');
				$("#loader").hide();
			} else  {
				$("#loader").hide();
				$("#messagediv").addClass('alert-success').removeClass('alert-danger');
				$(".addmodal").modal("hide");
				location.reload();
			}
			$( 'body' ).find( "loader" ).css( "display", "none" );
			$(".alert-heading").html(resp.message);
			$('.messagealert').show();
			$("#loader").hide();
			setTimeout(function() {
			$('.messagealert').fadeOut('fast');
			}, 5000);
		}
	});
});
$("#refreshbutton").click(function() {
	$("#loader").show();
	location.reload();
});

function  selectDetails( id, longitude, latitude) {

	if(longitude == ''  || latitude == '') {
		return false;
	}
	$("#calculateform").show();
	
	if( $("#longitude1").val() == '') {
		$("#longitude1").val(longitude);
		$("#latitude1").val(latitude); 
	} else {
		$("#longitude2").val(longitude);
		$("#latitude2").val(latitude);
	}
}

$("#calculate").click(function(){

	$.ajax({
	url: '<?= site_url()?>' + "welcome/calculateDistance",
	data: {
		"latitude1"		: 	$("#latitude1").val(),
		"longitude1"	: 	$("#longitude1").val(),
		"latitude2"		: 	$("#latitude2").val(),
		"longitude2"	: 	$("#longitude2").val(),
	},
	type: "POST",
	dataType: 'json',
	beforeSend: function() {
		$("#loader").show();
	},
	success: function(resp) {

				if(resp.status) {
				$( 'body' ).find( "loader" ).css( "display", "none" );
				$(".alert-heading").html("Total distance is : " + resp.distance);
				$('.messagealert').show();
				$("#loader").hide();
				setTimeout(function() {
				$('.messagealert').fadeOut('fast');
				}, 5000);
			}
		}
	});

});
</script>
<!-- script here  end -->