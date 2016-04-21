<?php 
	include('parts/header.php');
	
	include('lib/attendance_date.php');
?>
        <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row-fluid">
                  <div class="col-lg-4">
							<div class="panel panel-primary">
								 <div class="panel-heading">
									  <h3 >Attendance</h3>
								 </div>
								 <div class="panel-body">
									<?php include('lib/training_information.php'); ?>
									<button type="button" onclick="bodyPadding()" class="btn btn-primary" data-toggle="modal" data-target="#modal1">Add Person Involve</button>

									<div id="modal1" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
										<div class="modal-dialog">
										  <div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Add Person Involve</h4>
												</div>
												<div class="modal-body">
													<form class="form-horizontal" role="form" method="post" action="lib/addParticipant.php?id=<?php echo $_GET['id']; ?>">
														<div class="form-group">
														  <label class="col-sm-2 control-label"
																  for="inputPassword3" >Name </label>
														  <div class="col-sm-10">
																 <select name="participant" class="form-control">
																		<?php include('lib/participants.php'); ?>
																	</select>
														  </div>
														</div>
														<div class="form-group">
														  <label class="col-sm-2 control-label"
																  for="inputPassword3" >Role</label>
														  <div class="col-sm-10">
																 <select name="role" class="form-control">
																		<?php include('lib/role.php'); ?>
																	</select>
														  </div>
														</div>
												</div>
												<div class="modal-footer">
													<div class="row">
														<div class="col-lg-12">
															<div class="col-lg-3">
																<a href="profiles.php" class="btn btn-primary" >Add New Person</a>
															</div>
															<div class="col-lg-9">
																<button type="submit" name="submit" class="btn btn-primary">Add</button>
																	</form>
															   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
										  </div>
										</div>
									</div>
								</div>
							</div>
                   </div>
						 <div class="col-lg-8">
							<div class="row">
								<div class="col-lg-12">
									<h4  class="alert alert-success">Participants</h4>
									<div class="table-responsive">
										<table class="table table-bordered table-hover table-striped">
											<thead>
												<tr>
													<th>Name</th>
													<th>College/Cost Center</th>
													<th>Department</th>
													<!-- <th><?php //echo $list_Of_Dates[$index]; ?></th> -->
													<th>Status</th>
													<th>Action</th>    
												</tr>
											</thead>
											<tbody>
												<?php include('lib/attendance.php'); ?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="col-lg-12">
									<h4 class="alert alert-info"> Trainor</h4>
									<div class="table-responsive">
										<table class="table table-bordered table-hover table-striped">
											<thead>
												<tr>
													<th>Name</th>
													<th>College/Cost Center</th>
													<th>Department</th>
													<th>Print</th>
													<th>Action</th>    
												</tr>
											</thead>
											<tbody>
												<?php include('lib/attendance_trainor.php'); ?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="col-lg-12">
									<h4  class="alert alert-warning">Facilitator</h4>
									<div class="table-responsive">
										<table class="table table-bordered table-hover table-striped">
											<thead>
												<tr>
													<th>Name</th>
													<th>College/Cost Center</th>
													<th>Department</th>
													<th>Print</th>
													<th>Action</th>    
												</tr>
											</thead>
											<tbody>
												<?php include('lib/attendance_facilitator.php'); ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
                </div>
               </div>
            </div>
        </div>
        </div>
        <!-- /#wrapper -->
		  <!-- AJAX -->
		  <script src="ajax/modal-getData-editAttendance.js"></script>
		  <!-- MODAL Edit data-->
			<div id="modal2" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
				<div class="modal-dialog">
				  <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Attendance  <small></small></h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" role="form" method="post" action="lib/save_attendance.php?id=<?php echo $_GET['id']; ?>">
								<div class="form-group">
								  <label class="col-sm-2 control-label" for="inputPassword3" >Name </label>
								  <div class="col-sm-10">
									<div class="form-control" id="name" ></div>
										<input type="hidden" name="person_id" id="id_input" />
										<input type="hidden" name="name" id="name_input"/>
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-sm-2 control-label"
										  for="inputPassword3" >Attendance</label>
								  <div class="col-sm-10">
										 <table class="table table-bordered table-hover table-striped">
											<thead>
												<th>Date</th>
												<th>Present</th>
											</thead>
											<tbody id="tbody">
											</tbody>
										</table>
								  </div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label"
										  for="inputPassword3" >Status</label>
									<div class="col-sm-offset-2 col-sm-10">
										<select name="status" class="form-control">	
											<option>Complete</option>
											<option>Incomplete</option>
										</select>
									</div>
								</div>
						</div>
						<div class="modal-footer">
							<button type="submit" name="submit" class="btn btn-primary">Add</button>
							</form>
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
				  </div>
				</div>
			</div>
			<!-- END OF MODAL -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>

