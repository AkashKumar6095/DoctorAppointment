<?php $siteroot="http://127.0.0.1/Doctor2"?>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<header id="header">
		<div id="midWrap">
			<nav id="nav">
				<ul>
					<li><a href="<?php echo $siteroot;?>">Home</a></li>
					<li><a href="<?php echo $siteroot;?>/">Our Doctors</a></li>
					<li><a href="<?php echo $siteroot;?>/" class="searchOverlayTrigger">Book appointment now</a></li>
					<li><a href="<?php echo $siteroot;?>/about.php">About us</a></li>
					<li><a href="<?php echo $siteroot;?>/contact.php">Contact</a></li>
					<li><a href="" class="2login">Login/register</a></li>
				</ul>
			</nav>
			<div class="mobMenu">
				<ul class="mobileUl">
					<li class="home"><a href="#" title=""></a></li>
					<!--
					<li><a href="#" title="">Our Doctors</a></li>
					<li><a href="#" title="">Book Appointment Now</a></li>
					<li><a href="#" title="">About Us</a></li>
					<li><a href="#" title="">Contact Us</a></li>
					<li><a href="#" title="">Login/Register</a></li>
				-->
				</ul>
			</div>
		</div>
	</header>

	<div class="banOverlay">
	<div class="banOverlayMain">
		<span class="searchCancel">&#10005;</span>
		<ul class="searchTab">
			<li data-id="#sTab1" class="searchTabActive">Doctor</li>
			<li data-id="#sTab2">Dentist</li>
		</ul>
		<form action="" method="">
		<div id="sTab1" class="searchTabContainer" style="display: block;">
			<div class="overlayLeft">
				<div class="overlayHeading">Enter your Area/Pin Code*</div>
				<input type="text" name="pin" id="pin">
			</div>
			<div class="overlayRight">
				<div class="overlayHeading">Specialist in </div>
				<select id="overlayDropdown">
					<option>Ophthalmologist (Eye Specialist) </option>
					<option>Cardiologist (Heart Specialist)</option>
					<option>Gastroenterologist (Liver Disorder) </option>
					<option>Gynecologist (Women Health </option>
					<option>Urologist (Urinary Problems) </option>
					<option>Dermatologist (Skin Specialist)</option>
					<option>Psychiatrist (Mental illness) </option>
					<option>Ear Nose Throat (ENT Specialist) </option>
					<option>Neurologist (Neurological Disorder) </option>
				</select>
			</div>
			<div class="searchButtonWrap">
				<input type="submit" id="searchButton" value="Search">
			</div>
		</div>
		<div id="sTab2" class="searchTabContainer">
			<div class="overlayLeft">
				<div class="overlayHeading">Enter your Area/Pin Code*</div>
				<input type="text" name="pin" id="pin">
			</div>
			<div class="overlayRight">
				<div class="overlayHeading">Specialist in </div>
				<select id="overlayDropdown">
					<option>Dentist</option>
					<option>Orthodontist</option>
					<option>Endodontist</option>
					<option>Prosthodontist</option>
					<option>Pediatric Dentist</option>
					<option>Implantologist</option>
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
				<div class="tabWrap" id="newlog" style="display: block;">
					<div class="details">
					<form action="loginform_submit.php" method="post" accept-charset="utf-8">
						<ul class="formtype">
							<li>
								<label>Username
								<input type="text" name="username_submit" value="" required="required" placeholder="Username"></label>
							</li>
							<li>
								<label>Password
								<input type="text" name="password_submit" value="" required="required" placeholder="Password"></label>
							</li>
							<li class="check">
								<label>Remember me
								<input type="checkbox" name="" value=""></label>
								<a href="#" title="">forgot password ?</a>
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
				</div>
				</div>
				<div class="tabWrap" id="oldlog">
					<div class="details">
					<form action="signupform_submit.php" method="post" accept-charset="utf-8">
						<ul class="formtype">
							<li>
								<label>Name
								<input type="text" name="name_submit" value="" required="required" placeholder="Name"></label>
							</li>
							<li>
								<label>Address
								<input type="text" name="address_submit" value="" required="required" placeholder="Address"></label>
							</li>
							<li>
								<label>Pincode
								<input type="text" name="pincode_submit" value="" required="required" placeholder="Pincode"></label>
							</li>
							<li>
								<label>Aadhaar No.
								<input type="text" name="aadhar_submit" value="" required="required" placeholder="Aadhaar No."></label>
							</li>
							<li>
								<label>Password
								<input type="text" name="password_submit" value="" required="required" placeholder="Password"></label>
							</li>
							<li>
								<label>Confirm Password
								<input type="text" name="confirmpassword_submit" value="" required="required" placeholder="Confirm Password"></label>
							</li>
							<li class="submitb">
								<input type="submit" name="" value="Register">
							</li>
							<li class="submitp">By registering, you agree to our
								<a href="http://127.0.0.1/Doctor2/privacy.php" title="">Privacy policy</a>
							</li>
						</ul>
					</form>
				</div>
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


</script>