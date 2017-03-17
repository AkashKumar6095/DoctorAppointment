<?php include('header.php');?>
<?php
if(isset($_GET['pcode']) && isset($_GET['cid']))
{
	$pcode=$_GET['pcode'];
	$cid=$_GET['cid'];
}else
{
	exit();
}
?>


<?php
								$sqlcat="SELECT * FROM `doctor_category` WHERE `cat_id` = '$cid'";
								$rescat=mysqli_query($connection, $sqlcat);
								
								$rowcat=mysqli_fetch_assoc($rescat);
								
									$cat_id=$rowcat['cat_id'];
									$cat_name=$rowcat['cat_name'];
								?>
<link rel="stylesheet" type="text/css" href="css/index.css">


	<div class="mainWrap">
		<div class="midWrap">
			
			<div class="container">
				
				<div class="resultsMainWrap">
					<div class="resultHeading">Search Result For <b>Pincode : <?php echo $pcode;?></b> and <b>Category : <?php echo $cat_name;?></b></div>
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
								$sql="SELECT * FROM `doctors` WHERE `cat_id` = '$cid' AND `d_pin` = '$pcode'";
								$res=mysqli_query($connection, $sql);
								$result_count=mysqli_num_rows($res);
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
				</div>
			</div>
		</div>
	</div>

<?php include('footer.php');?>