<?php 
	include('parts/header.php');
	include('lib/profile.php');
?>
<script src="js/profile_edit.js"></script>
        <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row">
						<div class="col-md-12">
							<h2>Profile</h2>
							<div class="alert alert-info">
								<div class="row">
									<form method="post" action="lib/updateProfile.php?id=<?php echo $id_num; ?>" enctype="multipart/form-data">
									<div class="col-md-3">
										<img src="getImage.php?id=<?php echo $id?>" onerror="this.src='img/img.png'" style="width:250px;height:250px;" class="img-rounded img-responsive" />
										<input id="image" name="images" type="hidden">
								  </div>
								  <div class="col-md-9">
										<div class="row">
											<div id="id_numb" >
												<h4>ID No : <?php echo $id_num; ?></h4>
											</div>
											<div  id="button">
												<div class="form-group">	
													<button name="submit" type="submit"  id="save" class="btn btn-warning" >Save</button>
													<button id="edit" type="button" class="btn btn-success">Edit</button>
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group">
													<label>Name</label>
													<input id="name" value="<?php echo $name; ?>" name="name" type="text" class="form-control">
												</div>
												<div class="form-group">
														<label>College/Cost Center</label>
														<input  id="college"  name="college" value="<?php echo $college; ?>"  type="text" class="form-control">
													</div>
												<div class="form-group">
														<label>Department</label>
														<input id="dept" name="dept" value="<?php echo $dept; ?>"  type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Contact</label>
													<input id="contact" name="contact" value="<?php echo $contact; ?>" type="text" class="form-control">
												</div>
												<div class="form-group">
														<label>Email</label>
														<input id="email" name="email" value="<?php echo $email; ?>"  type="text" class="form-control">
													</div>
												<div class="form-group">
														<label>Rank/Position</label>
														<input id="pos" name="pos" value="<?php echo $pos; ?>"  type="text" class="form-control">
														
												</div>
												
											</div>
										</div>
									</form>
									</div>
								</div>  
							</div> 
							<div class="table-responsive">
								<table class="table table-bordered table-hover table-striped">
									<thead>
										<tr>
										<th>Training Code</th>
										<th>Inclusive Date</th>
										<th>Number of Hours</th>
										<th>Trainor</th>
										<th>Remarks</th>   
										</tr>
									</thead>
								<tbody>
								<?php include('lib/profile_trainings_attended.php');?>
								<!--
									<tr>
										<td>TOL 1</td>
										<td>March 1-3</td>
										<td>Micel Admin</td>
										<td>Completed</td>
									</tr>
									-->
								</tbody>
								</table>
							</div>  
						</div> 
               </div>    
				</div>
            <!-- ROW END -->
         </div>
			 <!-- /# page wrapper -->
      </div>
           <!-- /#wrapper -->

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

