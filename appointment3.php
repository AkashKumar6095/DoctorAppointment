<?php include('header.php');?>
<?php
if(isset($_GET['sid']))
{
	$sid=$_GET['sid'];

								$sql="SELECT * FROM `slot_availability` WHERE `slot_id` = '$sid'";
								$res=mysqli_query($connection, $sql);
								$row=mysqli_fetch_assoc($res);
								$did=$row['doctor_id'];


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
	<link rel="stylesheet" type="text/css" href="css/appointment.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<div class="main">
		<div class="midWrap">
			<div class="bodyWrap">
				<div class="profile">
					<div class="profilepic">
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
				<div class="Wrapper">
				<form action="appointment3_submit.php" method="post" accept-charset="utf-8">
					<input type="hidden" name="sid" value="<?php echo $sid;?>">
					<div class="formBox">
						<p>Book An Appointment</p>
						<label>Patient Name<span>*</span>
						<input type="text" name="patname_name" value="" required="required"></label>
						<label for="age">Patient Age<span>*</span>
						<input type="text" name="patage_age" required="required" pattern="^\d{1,3}$" max="110"></label>
						<label>Type of Problem<span>*</span>
							<select name="category" id="category">
							<?php
							$sql="SELECT * FROM `doctor_category`";
							$res=mysqli_query($connection, $sql);
							while($row=mysqli_fetch_assoc($res))
							{
								$cat_id=$row['cat_id'];
								$cat_name=$row['cat_name'];
								$d_type=$row['type'];
							?>
						<option value="<?php echo $cat_name;?>"><?php echo $cat_name;?></option>
						<?php }?>
						<option value="others">Others</option>}
						option
						</select></label>
						<label class="hidden" name="open" id="other_cat_label">
						<input type="text" name="other_cat" for="open" value="" placeholder="Other Please Specify"></label>
						<label class="newclick">Consulted Before</label>
						<label class="click">
						<input type="radio" value="yes" name="cosult_option">Yes</label>
						<label class="click">
						<input type="radio" value="no" name="cosult_option" checked="checked">No</label>
						<label>Explain The Problem
						<input type="text" name="explain_submit" value=""></label>
						<label>Email<span>*</span>
						<input type="email" name="email_submit" value="" required="required"></label>
						<label>Contact No.<span>*</span>
						<input type="text" name="contact_submit" pattern="[789][0-9]{9}" value="" required="required"></label>
						<label>Patient Address
						<input type="text" name="pataddress_submit" value=""></label>
						<ul class="submit">
							<li class="red">
								<a href="<?php echo $_SERVER['HTTP_REFERER']?>" title="">Cancel</a>
							</li>
							<li class="grey">
								<input type="reset" name="" value="Refresh Form">
							</li>
							<li class="green">
								<input type="submit" name="Submit" value="Set An Appointment">
							</li>
						</ul>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
	$("#category").change(function(){
		if($(this).val()=="others")
		{
			$("#other_cat_label").show();
		}else
		{
			$("#other_cat_label").hide();
		}
	});
</script>

<?php include('footer.php');?>