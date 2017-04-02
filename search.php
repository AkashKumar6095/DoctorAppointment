<?php include('header.php');?>
<?php
if(isset($_GET['pcode']) && isset($_GET['cid']))
{
	$pcode=$_GET['pcode'];                  //$pcode gets the pin code of the location of the doctor/dentist being extracted    
	$cid=$_GET['cid'];                      //$cid gets the category id of the doctot/dentist being extracted
}else
{
	exit();
}
?>


<?php
	$sqlcat="SELECT * FROM `doctor_category` WHERE `cat_id` = '$cid'";  //fetch all categories from doctor_category table where cat_id column is equal to $cid
        $rescat=mysqli_query($connection, $sqlcat);                         //executes queries
	$rowcat=mysqli_fetch_assoc($rescat);                                //fetches the result row as an associative array
								
	$cat_id=$rowcat['cat_id'];
	$cat_name=$rowcat['cat_name'];
	?>
<!--Custom CSS-->
<link rel="stylesheet" type="text/css" href="css/index.css">

           <!--mainWrap start-->
           <div class="mainWrap">
		<!--mid wrap start-->
		<div class="midWrap">
			<!--container start-->
			<div class="container">
				<!--Results main wrap start-->
				<div class="resultsMainWrap">
			        <!--Result Heading start-->
				<div class="resultHeading">Search Result For <b>Pincode : <?php echo $pcode;?></b> and <b>Category : <?php echo $cat_name;?>
					</b>
					</div>
					<!--Result Heading end-->
					<!--Result wrap start-->
					<div class="resultWrap">
						<ul class="resultsHeadingWrap">
							<li>Dr. Name</li>
							<li>Clinic Name</li>
							<li>Clinic Address</li>
							<!--<li></li>-->
							<li class="hidden">Distance from location</li>
							<li class="location"></li>
							<li class="hidden">Book An Appointment</li>
						</ul>

							
						
						<div class="" id="rTab<?php echo $cat_id;?>">
							<ul class="resultsList">
					                        <?php
					                        $sql="SELECT * FROM `doctors` WHERE `cat_id` = '$cid' AND `d_pin` = '$pcode'";    //fetch all columns of doctors table where cat_id column is equal to $cid and d_pin column is equal to $pcode
					                        $res=mysqli_query($connection, $sql);         //executes queries
								$result_count=mysqli_num_rows($res);          //returns the rows in a result set
								while($row=mysqli_fetch_assoc($res))
								{
									
									$d_id=$row['d_id'];
									$doctor_name=$row['d_name'];
									$d_type=$row['d_type'];
									$d_spec=$row['d_spec'];
									$d_qual=$row['d_qual'];
									$d_clname=$row['d_clname'];
									$d_claddr=$row['d_claddr'];

								?>
								<li>
									<ul class="resultsListInner">
										<li><?php echo $doctor_name;?>
											<br>Specialty : <?php echo $cat_name;?> 
											<br>Qualification : <?php echo $d_qual;?>
										</li>
										<li><?php echo $d_clname;?></li>
										<li><?php echo $d_claddr;?></li>
										<li></li>
										<li>
											<a href="<?php echo $siteroot;?>/appoint2.php?did=<?php echo $d_id;?>" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
								<?php }?>

								<?php
								if($result_count<=0)
								{
									echo '<li>No Result Found</li>';
								}
								?>
							</ul>
						</div><!-- resultChange end -->
						
						<!-- resultChange end -->
						<div class="resultChange" id="rTab15">
							<ul class="resultsList">
								
							</ul>
						</div><!-- resultChange end -->
					</div>
					<!--Result wrap end-->
				</div>
				<!--Results main wrap end-->
			</div>
			<!--container end-->
		</div>
		<!--mid wrap end-->  
	</div>
       <!--main wrap end-->
<?php include('footer.php');?>
