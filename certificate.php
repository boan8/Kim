<?php 
	include('parts/header.php');
?>
        <div id="page-wrapper">
			<style>
				#borderimg { 
					border: 40px solid transparent;
					 padding: 15px;
					 -webkit-border-image: url(img/border.png) 30 round; /* Safari 3.1-5 */
					 -o-border-image: url(img/border.png) 30 round; /* Opera 11-12.1 */
					 border-image: url(img/border.png) 30 round;
				}
		</style>
		
            <div class="container-fluid" >
                <!-- Page Heading -->
                <div class="row">
						 <button class="btn btn-lg btn-primary" id="certif"  class="form-control" onclick="printpage()" >Print</button>
                   <div class="col-lg-9" id="borderimg"  style="background-repeat:no-repeat;min-height:600px">
								<div class="row" style="border: 1px solid transparent;">
									<div class="col-lg-12" style="text-align:center;font-family:Old English Text MT;font-size:50px;font-weight: bold;">
										<p style="margin-top:100px;">Certificate of Participation</p>
									</div>
									<div class="col-lg-12" style="text-align:center;font-family:Times New Roman;font-size:20px;font-weight: bold;">
										<p style="margin-top:20px;">This certificate is proudly presented to</p>
										<p style="font-weight: normal;" ><u><?php echo $_GET['name'];?></u></p>
									</div>
									<div class="col-lg-12" style="text-align:center;font-family:Times New Roman;font-size:20px;font-weight: bold;">
										<p style="margin-top:30px;">in Recognition of your Participation in</p>
										<p style="font-weight: normal;" ><u><?php echo $_GET['training'];?></u></p>
									</div>
									<div class="col-lg-12" style="text-align:center;font-family:Times New Roman;font-size:20px;font-weight: normal;">
										<p >Presented this <u style="font-weight: bold;"><?php echo  $_GET['day'];?></u> day of <u style="font-weight: bold;"><?php echo $_GET['month']; ?></u> in the year <u style="font-weight: bold;"><?php echo $_GET['year'];?></u>.</p>
									</div>
									<div class="col-lg-6" style="text-align:center;font-family:Times New Roman;font-size:20px;font-weight: bold;">
										<p style="margin-top:50px;">__________________</p>
									</div>
									<div class="col-lg-6" style="font-family:Times New Roman;font-size:20px;font-weight: bold;">
										<p style="margin-top:50px;margin-left:60px">__________________</p>
									</div>
								</div>
                    </div>
						  
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	
	
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
						 function printpage() {
							  var printButton = document.getElementById("certif");
							  printButton.style.visibility = 'hidden';
							  window.print()
							  printButton.style.visibility = 'visible';
						 }
					</script>
</body>

</html>
