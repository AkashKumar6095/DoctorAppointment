<!--------------------------------HEADER----------------------------------------->
<?php 
include('conn.php');          //including the Database connection
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<!--Custom CSS-->
	<link rel="stylesheet" href="<?php echo $siteroot;?>/css/index.css">
	<!--Responsive Web Design-->
	<link rel="stylesheet" href="<?php echo $siteroot;?>/css/mob.css">
	<link rel="stylesheet" href="<?php echo $siteroot;?>/css/header.css">
	<link rel="stylesheet" href="<?php echo $siteroot;?>/css/footer.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet"> 
             <!-- Latest compiled and minified JavaScript -->
	<script src="<?php echo $siteroot;?>/js/jquery.min.js"></script>
</head>
<body>
	<!--Header Start-->
	<header id="header">
		<!--midWrap starts-->
		<div id="midWrap">
			<!----------------------Navigation Bar Start------------------------>
			<nav id="nav">
				<ul>
					<li><a href="<?php echo $siteroot;?>">Home</a></li>     
					<li><a href="<?php echo $siteroot;?>/#ourdoctor">Our Doctors</a></li>
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
					<li ><a href="..\main\hospital_bed_booking.php" >Hospital Bed Booking</a></li>
					<li><a href=".\..\Medi-Store\ecommerce.php"> Medical Ecommerce </a></li>
				</ul>
			</nav>
			<!----------------------Navigation Bar End------------------------>
                        <!------------------Mobile Responsive Menu Design Start-------------------------------->
			<!--mobMenu start-->
			<div class="mobMenu">
				<ul class="mobileUl menutriggeron">
					<li class="home"><a href="#" title="" style="width: 35px; height: 22px;"></a>
					<ul class="newHome">
						<li><a href="<?php echo $siteroot;?>/index.php" title="">Home</a></li>
						<li><a href="<?php echo $siteroot;?>/index.php#ourdoctor" title="">Our Doctors</a></li>
						<li><a href="<?php echo $siteroot;?>/" class="searchOverlayTrigger">Book appointment now</a></li>
						<li><a href="<?php echo $siteroot;?>/about.php" title="">About Us</a></li>
						<li><a href="<?php echo $siteroot;?>/contact.php" title="">Contact Us</a></li>
						<li ><a href="..\main\hospital_bed_booking.php" >Hospital Bed Booking</a></li>
					        <li><a href=".\..\Medi-Store\ecommerce.php"> Medical Ecommerce </a></li>
					</ul>
					</li>
				</ul>
			</div>
			<!--mobMenu end-->
			<!------------------Mobile Responsive Menu Design End-------------------------------->
		</div>
		<!--midWrap end-->
	</header>
        <!--Header end-->
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
					$sql="SELECT * FROM `doctor_category`"; //fetch all columns from the doctor_category table
					$res=mysqli_query($connection, $sql); //executed queries
							while($row=mysqli_fetch_assoc($res))
							{
								$cat_id=$row['cat_id'];
								$cat_name=$row['cat_name'];
								$d_type=$row['type'];
							?>
					<option value="<?php echo $cat_id;?>" class="<?php echo $d_type;?>"><?php echo $cat_name;?></option>
					<?php }?>
				</select>
			</div>
			<!----Search Button---->
			<div class="searchButtonWrap">
				<input type="submit" id="searchButton" value="Search">
			</div>
		</div>
		</form>
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

$(document).on('click', '.cross span', function() {
	$('.main3').hide();
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
<!--------------------------------HEADER ENDS----------------------------------------->
