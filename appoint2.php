<?php include('header.php');?>
<?php
if(isset($_GET['did']))
{
	$did=$_GET['did'];


	$sql="SELECT * FROM `doctors` WHERE `d_id` = '$did'";
								$res=mysqli_query($connection, $sql);
								$row=mysqli_fetch_assoc($res);
								
									
									$catid=$row['cat_id'];
									$doctor_name=$row['d_name'];
									$d_type=$row['d_type'];
									$d_spec=$row['d_spec'];
									$d_qual=$row['d_qual'];
									$d_clname=$row['d_clname'];
									$d_claddr=$row['d_claddr'];

									$available_in_morn_from=$row['available_in_morn_from'];
									$available_in_morn_to=$row['available_in_morn_to'];
									$available_in_eve_from=$row['available_in_eve_from'];
									$available_in_eve_to=$row['available_in_eve_to'];
									$appoi_time_minuts=$row['appoi_time_minuts'];

									$sqlcat="SELECT * FROM `doctor_category` WHERE `cat_id` = '$catid'";
									$rescat=mysqli_query($connection, $sqlcat);
									$rowcat=mysqli_fetch_assoc($rescat);
									$cat_name=$rowcat['cat_name'];

									$today_date=date('Y-m-d');


				

}else
{
	exit();
}
?>
	<link rel="stylesheet" type="text/css" href="css/appoint2.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
        <!--main start-->
	<div class="main">
		<!--midWrap start-->
		<div class="midWrap">
			<!--wrapper start-->
			<div class="wrapper">
				<!--bodyWrap start-->
				<div class="bodyWrap">
					<!--Image-->
					<div class="profile">
					<div class="profilepic">
						<img src="images/Male-placeholder.jpg" alt="">
					</div>
					
				        <!--details start-->
					<div class="details">
						<h2><?php echo $doctor_name;?></h2>
						<div class="leftdetail">
							<p>Clinic</p>
							<p>Address</p>
							<p>Specialist in</p>
							<p>Qualification</p>
						</div>
						<div class="leftdetail2">
							<p>: <?php echo $d_clname; //display clinic name from the database
								?></p>
							<p>: <?php echo $d_claddr; //display clinic address from the database
								?></p>
							<p>: <?php echo $cat_name; //display category name from the database
								?></p>
							<p>: <?php echo $d_qual; //display clinic name from the database
								?></p>
						</div>
					</div>
					<!--details end-->
				</div>
				
				<?php include('monthly_attnd_rpt.php');?>
				
				</div>
				<!--bodyWrap end-->
			</div>
			<!--wrapper end-->
		</div>
		<!--midWrap end-->
	</div>
        <!--main end-->
<?php include('footer.php');?>
