<?php include('header.php');?>     //includes header to the webpage
<?php
if(isset($_GET['did']))           //until the variable set of did is not null
{
	$did=$_GET['did'];        //assign value of variable


	$sql="SELECT * FROM `doctors` WHERE `d_id` = '$did'";     //fetch all doctors and dentists from doctors table where value of d_id column are equal to did variable
	$res=mysqli_query($connection, $sql);                      //perform queries $connection is connection and &sql is the resultmode
	$row=mysqli_fetch_assoc($res);                            // Associative array
								
									
	$catid=$row['cat_id'];                      //assign value of cat_id stored in the database to catid variable row wise
	$doctor_name=$row['d_name'];                //assign value of d_name stored in the database to doctor_name variable row wise
	$d_type=$row['d_type'];                     //assign value of d_type stored in the database to d_type variable row wise
	$d_spec=$row['d_spec'];                     //assign value of d_spec stored in the database to d_spec variable row wise
        $d_qual=$row['d_qual'];                     //assign value of d_qual stored in the database to d_qual variable row wise
	$d_clname=$row['d_clname'];                 //assign value of cl_name stored in the database to cl_name variable row wise
	$d_claddr=$row['d_claddr'];                 //assign value of d_claddr stored in the database to d_claddr variable row wise

	$available_in_morn_from=$row['available_in_morn_from'];  //assign value of available_in_morn_from stored in the database to available_in_morn_from variable row wise
	$available_in_morn_to=$row['available_in_morn_to'];      //assign value of available_in_morn_to stored in the database to available_in_morn_to variable row wise
	$available_in_eve_from=$row['available_in_eve_from'];    //assign value of available_in_eve_from stored in the database to available_in_eve_from variable row wise
	$available_in_eve_to=$row['available_in_eve_to'];        //assign value of available_in_eve_to stored in the database to available_in_eve_to variable row wise
	$appoi_time_minuts=$row['appoi_time_minuts'];            //assign value of appoi_time_minuts stored in the database to appoi_time_minuts variable row wise

	$sqlcat="SELECT * FROM `doctor_category` WHERE `cat_id` = '$catid'";  //fetch all doctors and dentists categories from doctor_category table where values in cat_id column are equal to catid variable
        $rescat=mysqli_query($connection, $sqlcat);                           //perform queries $connection is connection and &sqlcat is the resultmode
	$rowcat=mysqli_fetch_assoc($rescat);                                  // Associative array
	$cat_name=$rowcat['cat_name'];                      

        $today_date=date('Y-m-d');          //assign the date to today_date variable in the Y-M-D Format


				

}else
{
	exit();
}
?>
         <!-- Custom CSS -->  
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
				                <!--leftdetail start-->
						<div class="leftdetail">
							<p>Clinic</p>
							<p>Address</p>
							<p>Specialist in</p>
							<p>Qualification</p>
						</div>
						<!--leftdetail end-->
						<!--leftdetail2 start-->
						<div class="leftdetail2">
							<p>: <?php echo $d_clname; //display clinic name stored in the database
								?></p>
							<p>: <?php echo $d_claddr; //display clinic address stored in the database
								?></p>
							<p>: <?php echo $cat_name; //display category name stored in the database
								?></p>
							<p>: <?php echo $d_qual; //display doctor qualification stored in the database
								?></p>
						</div>
						<!--leftdetail2 end-->
					</div>
					<!--details end-->
				</div>
				
				<?php include('monthly_attnd_rpt.php');?>      //includes calendar to the webpage
				
				</div>
				<!--bodyWrap end-->
			</div>
			<!--wrapper end-->
		</div>
		<!--midWrap end-->
	</div>
        <!--main end-->
<?php include('footer.php');?>        //includes footer to the webpage
