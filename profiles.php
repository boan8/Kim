<?php 
	include('parts/header.php');
?>
	  <div id="page-wrapper">
			<div class="container-fluid">
				 <div class="row">
				  <div class="col-lg-8">
							<h2  class="page-header">Profiles</h2>
							<div class="table-responsive">
								 <table class="table table-bordered table-hover table-striped">
									  <thead>
											<tr>
												 <th>Name</th>
												 <th>Department</th>
												 <th>College</th>  
											</tr>
									  </thead>
									  <tbody>
											<!--
											<tr>
												 <td><a href="">Test A</a></td>
												 <td>IT department</td>
												 <td>SCS</td>
											</tr>
											<tr>
												 <td><a href="">Test B</a></td>
												 <td>Comsci department</td>
												 <td>SCS</td>
											</tr>
											-->
											<?php	include('lib/profiles.php'); ?>
									  </tbody>
								 </table>
							</div>
					  </div>
				  <div class="col-lg-4">
							<div class="well well-lg">
							<form method="post" action="lib/addPerson.php" enctype="multipart/form-data">
								 <h3>Add Person</h3>
								 <div class="form-group">
									  <input name="name" type="text" class="form-control" placeholder="Name" required>
								 </div>

								 <div class="form-group">
									  <input name="email" type="email" class="form-control" placeholder="Email" required>
								 </div>

								 <div class="form-group">
									  <input name="collegeCenter"type="text" class="form-control" placeholder="College Center" required>
								 </div>
							  
								 <div class="form-group">
									  <input name="cnum" type="text" class="form-control" placeholder="Contact Number" required>
								 </div>
								 
								 
								 <div class="form-group">
									  <input name="dept" type="text" class="form-control" placeholder="Department" required>
								 </div>
								 
								 <div class="form-group">
									  <select class="form-control" name="pos" >
											<option>Student</option>
											<option>Faculty</option>
											<option>Others</option>
									  </select>
								 </div>
								 
								 <div class="form-group">
									 <label>Profile Picture</label>
									<input name="image" type="file">
								 </div>
							<div class="form-group">
								 <button name="submit" type="submit" class="btn btn-success">Add Person</button>
							</div>

						</form>
					  </div>
							</div>
					  </div>
				 </div>
			</div>
	</div>
 </div>
</body>
</html>