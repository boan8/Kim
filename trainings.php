<?php 
	include('parts/header.php');
	$id = "";
	$title = "";
	$venue = "";
	$ref = "";
	$t_code = "";
	$edit = false;
	$req = "required";
	$hour = 0;
	if(isset($_GET['id'],$_GET['title'],$_GET['venue'],$_GET['ref'],$_GET['t_code'],$_GET['hour'])){
		$id = $_GET['id'];
		$title = $_GET['title'];
		$venue = $_GET['venue'];
		$ref = $_GET['ref'];
		$t_code = $_GET['t_code'];
		$hour = $_GET['hour'];
		$edit = true;
		$req = "";
	}
	//id=25&&title=dsadas&&venue=dsadas&&ref=1000
?>
<script src="js/date.js"></script>
<script src="js/training.js"></script>
<script>
	function dateXFunction() {
		var x = document.getElementById("datex").value;
		document.getElementById("date_From").value = x;
	}
	function dateYFunction() {
		var x = document.getElementById("datey").value;
		document.getElementById("date_To").value = x;
	}
	
	function disableX(){
		document.getElementById("datex").disabled=false;
		document.getElementById("date_From").disabled=false;
		document.getElementById("datey").disabled=false;
		document.getElementById("date_To").disabled=false;
		
		document.getElementById("datez").disabled=true;
		document.getElementById("date_From").disabled=true;
		document.getElementById("selectedDatesbut").disabled=true;
	}
	function disableY(){
		
		document.getElementById("datex").disabled=true;
		document.getElementById("date_From").disabled=true;
		document.getElementById("datey").disabled=true;
		document.getElementById("date_To").disabled=true;
		
		document.getElementById("datez").disabled=false;
		document.getElementById("date_From").disabled=false;
		document.getElementById("selectedDatesbut").disabled=false;
		
		//document.getElementById("date_specific").disabled=false;
	}
	<?php 
		include('lib/database.php');
		$res = mysql_query("SELECT date FROM training_schedule;");
		$i = 0;
		
		$dates = array();
		while ($row = mysql_fetch_assoc($res)) {
			 $dates[$i] = $row['date']; 
			 $i++;
		}

		$js_array = json_encode($dates);
		echo "var disabled_dates = ".$js_array . ";\n";
	?> 
		
		
	$(document).ready(function(){
	// disable choosen date
		var disabled_format_Dates = new Array();
		for (i = 0; i < disabled_dates.length; i++) {
			var splitted_string = disabled_dates[i].split("-");
			 disabled_format_Dates[i] =  splitted_string[1]+"/"+splitted_string[2]+"/"+splitted_string[0]
		}
		
		var date3 = new Date();
		date3.setDate(date3.getDate());
	
		$("input[name~='date']").datepicker({ 
			 todayHighlight: true,
			 datesDisabled: disabled_format_Dates
		});
	});
</script>
<link href="tables/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<link href="tables/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">


        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
						<div class="col-lg-8">     
							<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-heading"><h2>Trainings</h2></div>
										<div class="panel-body">
											<div class="dataTable_wrapper">
												<table class="table table-bordered table-hover table-striped" id="dataTables-example" >
													<thead>
														<tr>
															 <th>Training Code</th>
															 <th>Title</th>
															 <th>SO Ref. No.</th>
															 <th>Participants</th>
															 <th>Status</th>    
															 <th>Action</th>    
														</tr>
													</thead>
													<tbody>
														<?php
															include('lib/trainings.php');
														?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						<!-- </div> -->
						</div>
						<div class="col-lg-4">
                     <div class="well well-lg">
								<form method="post" action="lib/addTraining.php" enctype='multipart/form-data' >
                            <h3>Add Training</h3>
                            <div class="form-group">
                                <input name="training_code" type="text" class="form-control" placeholder="Training Code" required>
                            </div>

                            <div class="form-group">
                                <input name="title" class="form-control" rows="3" placeholder="Title" required>
                            </div>

                            <div class="form-group">
                                <input name="venue"  type="text" class="form-control" placeholder="Venue" >
                            </div>
									
									<div class="form-group">
                                <input name="noh"  type="text" class="form-control" placeholder="Number Of Hours" required>
                            </div>
                          <h4><input type="radio" onclick="disableX()" id="consecutive" name="sched" value="1" checked> Training Schedule <small>(Consecutive)</small></h4>
									 <div id="alert" class="alert alert-error" style="display:none;"> </div>
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </span>
                                  <input class="form-control" id="datex" name="date" placeholder="From" type="text" onchange="dateXFunction()" required/>
											 <input name="date_From" id="date_From" type="hidden"  />
                                </div><!-- /input-group -->
                              </div><!-- /.col-lg-6 -->
                              <div class="col-lg-6">
											
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </span>
											 
                                  <input class="form-control" id="datey" name="date" placeholder="To" onchange="dateYFunction()" type="text"  required />
											 <input name="date_To" id="date_To" type="hidden"  />
                                </div><!-- /input-group -->
                              </div><!-- /.col-lg-6 -->
                            </div><!-- /.row -->
									
                            <div class="form-group">
										 <h4><input type="radio" onclick="disableY()"  id="specific" name="sched" value="2" >Training Schedule <small>(Specific)</small></h4>
											 <div class="row">
												<div class="col-lg-6">
													<div class="input-group">
													 <span class="input-group-addon">
														<i class="fa fa-calendar"></i>
													 </span>
													 <input class="form-control" id="datez" name="date"  placeholder="Choosen Date"  type="text" required disabled />
													</div><!-- /input-group -->
												</div>
												<div class="col-lg-3">
													<input id="selectedDatesbut" class="btn btn-default" type="button" onclick="createDates()" value="Select" disabled>
												</div><!-- /.col-lg-6 -->
											</div>
									</div>
									<div  class="form-group">
										<div class="table-responsive">
											<table class="table table-bordered table-hover table-striped">
												<thead><tr class="success" ><th>Selected Date(s)</th><th>Action</th></tr></thead>
												<tbody id="selectedDatesTable"></tbody>
											</table>
											<textArea id="selectedDinput" name="selectedDinput" style="display:none"></textArea>
										</div>
									</div>
									<div class="form-group">
                                <input type="text" name="soNumber" value="<?php echo $ref; ?>"  class="form-control" placeholder="SO Reference Number"  >
									</div>
									<!--<div class="form-group">
										<input type="file" name="fileToUpload" id="fileToUpload"  required>
                           </div>-->
									<div class="form-group">
										 <button name="submit" type="submit" class="btn btn-success"><?php if($edit) echo "Update"; else echo "Add";?></button>
									</div>
								</form>
                    </div>
						  <!-- Script -->
							 <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

							 <!-- Include Date Range Picker -->
							 <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
							 <link rel="stylesheet" href="css/bootstrap-datepicker3.css"/>

							 <script>
								  $(document).ready(function(){
										var date_input=$('input[name="date"]'); //our date input has the name "date"
										var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
										date_input.datepicker({
											 format: 'mm/dd/yyyy',
											 container: container,
											 todayHighlight: true,
											 autoclose: true,
										})
								  })
							 </script>
                  </div>
               </div>
            </div>
				<!-- MODAL Edit data-->
				<div id="editTraining" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
					<div class="modal-dialog">
					  <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Update Training  <small></small></h4>
							</div>
							<div class="modal-body">
								<form  role="form" method="post" action="lib/updateTraining.php" enctype='multipart/form-data' >
                            <div class="form-group">
										<label>Training Code </label>
										<input id="training_id" name="id" type="hidden" >
										<input id="training_code" class="form-control" name="training_code" type="text"   required>
                            </div>
                            <div class="form-group">
										<label >Title </label>	
										<input id="title" name="title" class="form-control" rows="3"  required>
                            </div>
                            <div class="form-group">
										<label>Venue </label>	
										<input id="venue"  name="venue"   type="text" class="form-control" >
                            </div>
									<div class="form-group">
										<label>Number of Hours</label>	
										<input  id="noh" name="noh"  type="text" class="form-control" required>
									</div>
									<div class="form-group">
										<label>SO Reference Number</label>	
										<input id="sonumber" type="text" name="soNumber"   class="form-control" required>
									</div>
									<div class="form-group">
										<h4><input type="radio" onclick="disableSpecific()" id="consecutive" name="sched" value="1" checked> Training Schedule <small>(Consecutive)</small></h4>
										<div id="alert_modal" class="alert alert-error" style="display:none;"> </div>
										<div class="row">
											<div class="col-lg-6">
											  <div class="input-group">
												 <span class="input-group-addon">
													<i class="fa fa-calendar"></i>
												 </span>
												 <input class="form-control" id="dateModalFrom" name="date" placeholder="From" type="text" onchange="date_modal_XFunction()"  />
												 <input name="date_From" id="date_From_text" type="hidden"  />
											  </div><!-- /input-group -->
											</div><!-- /.col-lg-6 -->
											<div class="col-lg-6">
												
											  <div class="input-group">
												 <span class="input-group-addon">
													<i class="fa fa-calendar"></i>
												 </span>
												 
												 <input class="form-control" id="dateModalTo" name="date" placeholder="To" onchange="date_modal_YFunction()" type="text" />
												 <input name="date_To" id="dateModalTo_text" type="hidden"  />
											  </div>
											</div>
										 </div>
									</div>
									<div class="form-group">
										 <h4><input type="radio" onclick="disableConsecutive()"  id="specific" name="sched" value="2" >Training Schedule <small>(Specific)</small></h4>
											 <div class="row">
												<div class="col-lg-6">
													<div class="input-group">
													 <span class="input-group-addon">
														<i class="fa fa-calendar"></i>
													 </span>
													 <input class="form-control" id="date_modal_specific" name="date"  placeholder="Choosen Date"  type="text"   disabled />
													</div>
												</div>
												<div class="col-lg-3">
													<input id="select_date_modal_button" class="btn btn-default" type="button" onclick="createDates_modal()"  value="Select"  disabled>
												</div>
											</div>
									</div>
									<div  class="form-group">
										<div class="table-responsive">
											<table class="table table-bordered table-hover table-striped">
												<thead><tr class="success" ><th>Selected Date(s)</th><th>Action</th></tr></thead>
												<tbody id="selected_modal_table"></tbody>
											</table>
											<textArea id="selected_modal_input" name="selectedDinput" style="display:none"></textArea>
										</div>
									</div>
									<!--<div class="form-group">
										<input type="file" name="fileToUpload" id="fileToUpload"  required>
                           </div>-->
							</div>	
							<div class="modal-footer">
								<button type="submit" name="submit" class="btn btn-primary">Update Training</button>
									</form>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					  </div>
					</div>
				</div>
				<!-- END OF MODAL -->
         </div>
		</div>
		<!-- /#wrapper -->
		
		<script src="tables/jquery/dist/jquery.min.js"></script>
		<script src="tables/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="tables/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

		<script>
		 $(document).ready(function() {
			  $('#dataTables-example').DataTable({
						 responsive: true
			  });
		 });
	 </script>
	</body>
</html>

