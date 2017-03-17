<?php include('header.php');?>
<?php
if(isset($_GET['date']) && isset($_GET['did']))
{
	$date=$_GET['date'];
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

}else
{
	exit();
}
?>
	<link rel="stylesheet" type="text/css" href="css/lastpage.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<div class="main">
		<div class="midWrap">
			<div class="wrapper">
				<div class="bodyWrap">
					<div class="profile">
					<div class="profilepic">
						<input type="file" style="display: none;" id="profile_img_file">
						<img src="images/Male-placeholder.jpg" alt="">
					</div>
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
					</div>
					<div class="appoint">
						<p>Morning Appointments</p>
						<a href="#" title=""><?php echo date('d M y', strtotime($date));?></a>
					</div>
					<div class="appointdate">
						<table>
							<tbody>
								
								<?php
								$count=0;
								
								$sql="SELECT * FROM `slot_availability` WHERE `doctor_id` = '$did' AND `date` = '$date' AND `slot_shift` = 'morning' AND `status` <> 'deleted'";
								$res=mysqli_query($connection, $sql);
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
									<a href="<?php echo $siteroot;?>/appointment3.php?sid=<?php echo $slot_id;?>" title="">Book an Appointment</a>
									</td>
									<?php }else{?>
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

					<div class="appoint">
						<p>Evening Appointments</p>
						<a href="#" title=""><?php echo date('d M y', strtotime($date));?>	</a>
					</div>
					<div class="appointdate">
						<table>
							<tbody>
								<?php
								$count=0;
								
								$sql="SELECT * FROM `slot_availability` WHERE `doctor_id` = '$did' AND `date` = '$date' AND `slot_shift` = 'evening'AND `status` <> 'deleted'";
								$res=mysqli_query($connection, $sql);
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
									<a href="<?php echo $siteroot;?>/appointment3.php?sid=<?php echo $slot_id;?>" title="">Book an Appointment</a>
									</td>
								    <?php }else{?>
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
			</div>
		</div>
	</div>

<?php include('footer.php');?>