<!-----------------------HEADER---------------------->
<?php 
include('conn.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="<?php echo $siteroot;?>/css/index.css">
	<link rel="stylesheet" href="<?php echo $siteroot;?>/css/mob.css">
	<link rel="stylesheet" href="<?php echo $siteroot;?>/css/header.css">
	<link rel="stylesheet" href="<?php echo $siteroot;?>/css/footer.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet"> 
	<!-- Latest compiled and minified JavaScript -->
	<script src="<?php echo $siteroot;?>/js/jquery.min.js"></script>
</head>
<body>
	<!--header starts-->
	<header id="header">
		<div id="midWrap">
			<!--Navigation Starts-->
			<nav id="nav">
				<ul>
					<li><a href="<?php echo $siteroot;?>">Home</a></li>
					<li><a href="<?php echo $siteroot;?>/">Our Doctors</a></li>
					<li><a href="<?php echo $siteroot;?>/" class="searchOverlayTrigger">Book appointment now</a></li>
					<li><a href="<?php echo $siteroot;?>/about.php">About us</a></li>
					<li><a href="<?php echo $siteroot;?>/contact.php">Contact</a></li>
					<!-- <li class="dropitnow"><a href="" class="logintabs" style="font-family: cursive;">Welcome, Username
						</a>
						<ul class="dropdwnlst">
							<li><a href="#" title="">Your Orders</a></li>
							<li><a href="#" title="">Your Profile</a></li>
							<li><a href="#" title="">Log Out</a></li>
						</ul>
					</li> -->
					<li class="greentab"><a href="" class="2login">Login/register</a></li>
				</ul>
			</nav>
                        <!--Navigation ends-->
                        <!--Mobile Responsive Menu Bar starts-->
			<div class="mobMenu">
				<ul class="mobileUl menutriggeron">
					<li class="home"><a href="#" title="" style="width: 35px; height: 22px;"></a>
					<ul class="newHome">
						<li><a href="<?php echo $siteroot;?>/index.php" title="">Home</a></li>
						<li><a href="#" title="">Our Doctors</a></li>
						<li><a href="<?php echo $siteroot;?>/" class="searchOverlayTrigger">Book appointment now</a></li>
						<li><a href="<?php echo $siteroot;?>/about.php" title="">About Us</a></li>
						<li><a href="<?php echo $siteroot;?>/contact.php" title="">Contact Us</a></li>
						<li class="color"><a href="#" title="" class="2login">Login/Register</a></li>
					</ul>
					</li>
				</ul>
			</div>
			<!--Mobile Responsive Menu Bar Ends-->
		</div>
	</header>
	<!-- header ends -->

	<div class="banOverlay">
	<div class="banOverlayMain">
		<span class="searchCancel">&#10005;</span>
		<ul class="searchTab">
			<li data-id="doctor" class="searchTabActive">Doctor</li>
			<li data-id="dentist">Dentist</li>
		</ul>
		<form method="GET" action="<?php echo $siteroot;?>/search.php" id="searchFrom">
		<div class="searchTabContainer" style="display: block;">
			<div class="overlayLeft">
				<div class="overlayHeading">Enter your Area Pin Code*</div>
				<input type="text" name="pcode" required="required" id="pin">
			</div>
			<style type="text/css" media="screen">
			.dentist
			{
				display: none;
			}	
			</style>
			<div class="overlayRight">
				<div class="overlayHeading">Specialist in </div>
				<select id="overlayDropdown" name="cid" class="select_cat">
					<?php
							$sql="SELECT * FROM `doctor_category`";  //fetch all doctors and dentists categories from doctor_category table							$res=mysqli_query($connection, $sql);
							while($row=mysqli_fetch_assoc($res))     //executes queries
							{
								$cat_id=$row['cat_id'];
								$cat_name=$row['cat_name'];
								$d_type=$row['type'];
							?>
					<option value="<?php echo $cat_id;?>" class="<?php echo $d_type;?>"><?php echo $cat_name;?></option>
					<?php }?>
				</select>

				
			</div>
			<div class="searchButtonWrap">
				<input type="submit" id="searchButton" value="Search">
			</div>
		</div>
		</form>
	</div>
</div>


	<div class="main3">
		<div class="midWrap3">
			<div class="wrapper3">
				<div class="login">
					<ul class="topic">
						<li data-id="#newlog" class="active">Log in</li>
						<li data-id="#oldlog" class="register3">Register</li>
						<div class="cross"><span></span></div>
					</ul>
				</div>
				<!---------------------LOGIN---------------------------->
				<div class="tabWrap" id="newlog" style="display: block;">
					<div class="details">
					<!--Form Starts-->	
					<form action="" method="" accept-charset="utf-8">
						<ul class="formtype">
							<li>
								<label>Username
								<input type="text" name="" value="" required="required" placeholder="Username"></label>
							</li>
							<li>
								<label>Password
								<input type="text" name="" value="" required="required" placeholder="Password"></label>
							</li>
							<li class="check">
								<label>Remember me
								<input type="checkbox" name="" value=""></label>
								<a href="#" title="" class="forgotpassWord">forgot password ?</a>
							</li>
							<li class="submitb">
								<input type="submit" name="" value="Login">
							</li>
							<li class="submitb">New User? 
								<a href="" title="" class="register2">Register Here</a>
							</li>
							<li class="submitp">By logging in, you agree to our
								<a href="http://127.0.0.1/Doctor2/privacy.php" title="">Privacy policy</a>
							</li>
						</ul>
					</form>
					<!--Form Ends-->	
				</div>
				</div>
				<!---------------------MODAL REGISTRATION STARTS--------------------->
				<div class="tabWrap" id="oldlog">
					<div class="details">
					<!--Form Starts-->
					<form action="" method="" accept-charset="utf-8">
						<ul class="formtype">
							<li>
								<label>Name
								<input type="text" name="" value="" required="required" placeholder="Name"></label>
							</li>
							<li>
								<label>Address
								<input type="text" name="" value="" required="required" placeholder="Address"></label>
							</li>
							<li>
								<label>Pincode
								<input type="text" name="" value="" required="required" placeholder="Pincode"></label>
							</li>
							<li>
								<label>Aadhaar No.
								<input type="text" name="" value="" required="required" placeholder="Aadhaar No."></label>
							</li>
							<li>
								<label>Password
								<input type="text" name="" value="" required="required" placeholder="Password"></label>
							</li>
							<li>
								<label>Confirm Password
								<input type="text" name="" value="" required="required" placeholder="Confirm Password"></label>
							</li>
							<li class="submitb">
								<input type="submit" name="" value="Register">
							</li>
							<li class="submitp">By registering, you agree to our
								<a href="http://127.0.0.1/Doctor2/privacy.php" title="">Privacy policy</a>
							</li>
						</ul>
						</form>
					<!-- Form ends -->
				</div>
				</div>
				<!-- MODAL REGISTRATION ENDS -->
			</div>
		</div>
	</div>

        <!--Forgot Password-->
	<div class="mainWrapp">
		<div class="midWraps">
			<div class="wrapper3">
				<div class="detailsTabs">
					<!--Form Starts-->
					<form action="" method="" accept-charset="utf-8">
						<ul class="formtypetabs">
							<li class="inputtype">
								<label>Enter Registered E-mail-ID/Mobile No.</label>
								<input type="text" name="" value="" required="required" placeholder="E-mail-ID/Mobile No.">
							</li>
							<li class="submitbc">
								<a href="" title="" class="goback">< BACK</a>
								<input type="submit" name="" value="Reset Password">
							</li>
						</ul>
					</form>
					<!--Form Ends-->
				</div>
			</div>
		</div>
	</div>







				
<script type="text/javascript">
$(document).on('click', '.topic li', function() {
	var trigger = $(this).attr('data-id');
	$('.tabWrap').hide();
	$(trigger).show();
	$('.topic li').removeClass('active');
	$(this).addClass('active');
});
$(document).on('click', '.2login', function(e) {
	e.preventDefault();
	$('.main3').show();
});
$(document).on('click', '.cross span', function() {
	$('.main3').hide();
});
$(document).on('click', '.register2', function(event) {
	event.preventDefault();
	$(".register3").click();
});





$(document).on('click', '.forgotpassWord', function(event) {
	event.preventDefault();
	$(".main3").hide();
	$(".mainWrapp").show();

});

$(document).on('click', '.goback', function(event) {
	event.preventDefault();
	$(".main3").show();
	$(".mainWrapp").hide();

});






$(document).on('click', '.menutriggeron', function() {
	$('.newHome').css('left', '0');
	$('.mobileUl').removeClass('menutriggeron').addClass('menutriggeroff');
});

$(document).on('click', '.menutriggeroff', function() {
	$('.newHome').css('left', '-100%');
	$('.mobileUl').removeClass('menutriggeroff').addClass('menutriggeron');
});

$("#searchFrom").submit(function(event){
	var pin=$("#pin").val();
	if(!$.isNumeric(pin))
	{
		event.preventDefault();
		alert("Invalid Pincode");
	}
});
</script> 


 

	
