<?php include('header.php');?>      //include header to the webpage
<?php
if(isset($_GET['sid']))
{
	$sid=$_GET['sid'];           //assign value of variable

	$sql="SELECT * FROM `slot_availability` WHERE `slot_id` = '$sid'";   //fetch all columns from slot_availability table where value of slot_id column are equal to s_id variable
        $res=mysqli_query($connection, $sql);          ///executes queries
	$row=mysqli_fetch_assoc($res);                 // Associative array
        $did=$row['doctor_id']; 


	$sql="SELECT * FROM `doctors` WHERE `d_id` = '$did'";    //fetch all columns from doctors table where value of d_id column are equal to did variable
	$res=mysqli_query($connection, $sql);                    //executes queries
	$row=mysqli_fetch_assoc($res);                           // Associative array
								
									
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

	$sqlcat="SELECT * FROM `doctor_category` WHERE `cat_id` = '$catid'";   //fetch all columns from doctors table where value of catid_id column are equal to catid variable
	$rescat=mysqli_query($connection, $sqlcat);                            //executes queries
	$rowcat=mysqli_fetch_assoc($rescat);                                    // Associative array
        $cat_name=$rowcat['cat_name'];
}else
{
	exit();
}
?>
       <!-- Custom CSS-->
	<link rel="stylesheet" type="text/css" href="css/appointment.css">
      <!--Responsive Web Page-->
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
        <!--main start-->
	<div class="main">
		 <!--midWrap start-->
		<div class="midWrap">
			 <!--bodyWrap start-->
			<div class="bodyWrap">
				<!--Doctor Image-->
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
							<p>: <?php echo $d_clname      //display clinic name from the database
	                                                    ;?>
							</p>
							<p>: <?php echo $d_claddr     //display clinic address from the database
	                                                     ;?>
							</p>
							<p>: <?php echo $cat_name      //display category name from the database
	                                                     ;?>
							</p>
							<p>: <?php echo $d_qual       //display doctor qualification from the database
	                                                     ;?>
							</p>
						</div>
					</div>
					<!--details end-->
				</div>
				<!--Wrapper class start-->
				<div class="Wrapper">
	<!----------------------Form Starts and after it is submitted it is sent for processing to appointment3_submit.php file with the HTTP Post Method------------------------------------->
				<form action="appointment3_submit.php" method="post" accept-charset="utf-8">
					<input type="hidden" name="sid" value="<?php echo $sid;?>">
					<div class="formBox">
						<p>Book An Appointment</p>
						<label>Patient Name<span>*</span>
						<input type="text" name="patname_name" value="" required="required"></label>
						<label for="age">Patient Age<span>*</span>
					        <!--Form Validation for Patient Age-->
						<input type="text" name="patage_age" required="required" pattern="^\d{1,3}$" max="110"></label>
						<label>Type of Problem<span>*</span>
							<select name="category" id="category">
							<?php
							$sql="SELECT * FROM `doctor_category`";   //fetch all categories from doctor_category table
							$res=mysqli_query($connection, $sql);     //perform queries $connection is connection and &sql is the resultmode
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
						<!--Form Validation For Contact No-->
						<label>Contact No.<span>*</span>
						<input type="text" name="contact_submit" pattern="[789][0-9]{9}" value="" required="required"></label>
						<label>Patient Address
						<input type="text" name="pataddress_submit" value=""></label>
						<ul class="submit">
							<li class="red">
								<!--Cancel Button Redirects to previous page-->
								<a href="<?php echo $_SERVER['HTTP_REFERER']?>" title="">Cancel</a>
							</li>
							<li class="grey">
								<!--Refreshes the page-->
								<input type="reset" name="" value="Refresh Form">
							</li>
							<li class="green">
								<!--Submit Button-->
								<input type="submit" name="Submit" value="Set An Appointment">
							</li>
						</ul>
					</div>
				</form>
			        <!--------------------Form ends----------------------------------->		
				</div>
				<!--wrapper class end-->
			</div>
			<!--bodyWrap end-->
		</div>
		<!--midWrap end-->
	</div>
        <!--main end-->
/* using JQUERY for the drop down menu for the "Type of Problem" field in the form above
	   "category" is the id of the category which is shown in the drop down menu
           "other_cat_label" is the id of the "Other" option 
	   if the user selects the "Others" option in the drop down menu
           "#other_cat_label" is active and a new label box opens where user can enter the text
           if the user selects the category which is shown in the drop down menu
            "#other_cat_label" is hidden
*/
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

<?php include('footer.php');?>  //include footer to the webpage
