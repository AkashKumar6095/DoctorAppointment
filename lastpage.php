<?php include('header.php');?>
<?php
if(isset($_GET['date']) && isset($_GET['did']))
{
	$date=$_GET['date'];                //$date gets the date of the appointment being extracted
	$did=$_GET['did'];                 //$did gets the doctor id of the doctor/dentist being extracted
 
	$sql="SELECT * FROM `doctors` WHERE `d_id` = '$did'";    // fetch all the columns of the doctors table where values in d_id table are equal to $did
	$res=mysqli_query($connection, $sql);                    //executes queries
	$row=mysqli_fetch_assoc($res);                           //fetch result row as an associative array  
								
									
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

        $sqlcat="SELECT * FROM `doctor_category` WHERE `cat_id` = '$catid'";   //fetch all columns from the doctor_category table where value in the cat_id column is equal to $catid
	$rescat=mysqli_query($connection, $sqlcat);                            //execute queries
	$rowcat=mysqli_fetch_assoc($rescat);                                   //fetch result row as an associative array  
	$cat_name=$rowcat['cat_name'];  

}else
{
	exit();
}
?>
        <!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="css/lastpage.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
        <!--main start-->
	<div class="main">
		<!--midWrap start-->
		<div class="midWrap">
			<!--wrapper start-->
			<div class="wrapper">
				<!--bodyWrap start-->
				<div class="bodyWrap">
					<!--Doctor Image-->
					<div class="profile">
					<div class="profilepic">
						<input type="file" style="display: none;" id="profile_img_file">
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
							<p>: <?php echo $d_clname;?></p>
							<p>: <?php echo $d_claddr;?></p>
							<p>: <?php echo $cat_name;?></p>
							<p>: <?php echo $d_qual;?></p>
						</div>
					</div>
					<!--details end-->	
					</div>
					<!--Morning Appointments-->
					<div class="appoint">
						<p>Morning Appointments</p>
						<a href="#" title=""><?php echo date('d M y', strtotime($date));?></a>
					</div>
					<div class="appointdate">
						<table>
						<tbody>
								
						<?php
						$count=0;
								
						$sql="SELECT * FROM `slot_availability` WHERE `doctor_id` = '$did' AND `date` = '$date' AND `slot_shift` = 'morning' AND `status` <> 'deleted'"; //fetch all columns from the slot_availability table where doctor_id column =$did and date column=$date and slot_shit column = morning and status column!= delete
						$res=mysqli_query($connection, $sql);   //executes queries
						while($row=mysqli_fetch_assoc($res))
						{
						  $count++;
						  if($count==1)
						  {
							echo "<tr>";
						  }
						  $timing=$row['timing'];
						  $slot_id=$row['slot_id'];
						  $status=$row['status'];
						?>
						<?php if($status=="available"){?>
						<td class="available">
						<p><?php echo $timing;?></p>
						<!--Book An Appointment Button-->	
						<a href="<?php echo $siteroot;?>/appointment3.php?sid=<?php echo $slot_id;?>" title="">Book an Appointment</a>
						</td>
						<?php }else
						//Slot Reserved	
						{?>
						<td class="available">
						<p><?php echo $timing;?></p>
						<span style="color:#f00; float: left; margin:0 15px;">Already Reserved</span>
						</td>
						<?php }?>
								
						<?php 
						if($count==3)
									{
										$count=0;
										echo "</tr>";	
									}

								}?>
								
							</tbody>
						</table>
					</div>
                                        <!--Evening Appointments-->
					<div class="appoint">
						<p>Evening Appointments</p>
						<a href="#" title=""><?php echo date('d M y', strtotime($date));?>	</a>
					</div>
					<div class="appointdate">
					<table>
					<tbody>
					<?php
					$count=0;
								
					$sql="SELECT * FROM `slot_availability` WHERE `doctor_id` = '$did' AND `date` = '$date' AND `slot_shift` = 'evening'AND `status` <> 'deleted'"; //fetch all columns from the slot_availability table where doctor_id column =$did and date column=$date and slot_shit column = evening and status column!= deleted
					$res=mysqli_query($connection, $sql);         //executes queries
					while($row=mysqli_fetch_assoc($res))
					{
						$count++;
						if($count==1)
						{
					        	echo "<tr>";
						}
						$timing=$row['timing'];
						$slot_id=$row['slot_id'];
						$status=$row['status'];
						?>
						 <?php if($status=="available"){?>
						<td class="available">
						<p><?php echo $timing;?></p>
						<!--Book An Appointment Button-->	
						<a href="<?php echo $siteroot;?>/appointment3.php?sid=<?php echo $slot_id;?>" title="">Book an Appointment</a>
						</td>
					        <?php }else
						//Slot Reserved		
						{?>
						<td class="available">
						<p><?php echo $timing;?></p>
						<span style="color:#f00; float: left; margin:0 15px;">Already Reserved</span>
						</td>
						<?php }?>
									
						<?php 
						if($count==3)
						{
							$count=0;
							echo "</tr>";	
						}

					}?>
							</tbody>
						</table>
					</div>
                                </div>
				<!--bodyWrap ends-->
			</div>
			<!--wrapper class ends-->
		</div>
		<!--midWrap ends-->
	</div>
        <!--main ends-->
<?php include('footer.php');?>
