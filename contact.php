<!--Contact Us-->
<?php include('header.php');?>
<link rel="stylesheet" type="text/css" href="css/contact.css">
        <!--main start-->
	<div class="main">
		<!--headimg start-->
		<div class="headimg">
			        <!--imgbox for image start-->
				<div class="imgbox">
					<img src="images/doctor.png" alt="">
				</div>
			        <!--imgbox for image ends-->
			</div>
		        <!--headimg end-->
		<div class="midWrap">
		<!--midWrap start-->
			<div class="wrap">
			<!--wrap start-->
				<!--After clicking the Submit Button-->
				<form action="contactform_submit.php" method="post" accept-charset="utf-8">
					<ul class="contactus">
						<li class="text"><h1>CONTACT US<span></span></h1></li>
						<li class="text"><p>In case you need any further assistance/Support.<br>
						We'd love to hear from you! Please fill the form below.<br>
						We would get back to you at the earliest.</p>
						</li>
						<li>
							<!--Form start-->
							<div class="contact_form">
								<!--Name Field to be input by the user-->
								<label>Name<span>*</span></label>
								<input type="text" name="name_submit" value="" required="required">
							</div>

							<div class="contact_form">
								<!--E-mail Field to be input by the user-->
								<label>E-mail<span>*</span></label>
								<input type="email" name="email_submit" value="" required="required">
							</div>

							<div class="contact_form">
								<!--Phone No Field to be input by the user-->
								<label>Phone<span>*</span></label>
								<input type="text" name="phone_submit" pattern="[789][0-9]{9}" value="" required="required">
							</div>

							<div class="contact_form">
								<!--City Name Field to be input by the user-->
								<label>City<span>*</span></label>
								<input type="text" name="city_submit" value="" required="required">
							</div>
						</li>
						<li>
							<div class="contact_form">
								<!--Type of Enquiry Field to be selected by the user from the options in the Drop Down Menu-->
								<label for="">Type of Enquiry</label>
								<select name="enquiry_submit" class="enqueryType">
									<option value="healthy">Healthy Related</option>
									<option value="business">Business Related</option>
									<option value="freeListing">Free Listing</option>
									<option value="other">Others</option>
								</select>
									<div class="drop"></div>
							</div>
                                                        <!--Others Option is selected by the user from the above drp down-->
							<div class="contact_form">
								<div class="contact_display">
								<label class="typeOther"></label>
								<input type="text" name="other_submit" value="" placeholder="Please Specify">
								</div>
							</div>
						</li>
						<li>
							<div class="contact_form">
								<label>Message<span>*</span></label>
								<textarea name="message_submit" required="required"></textarea>
							</div>
						</li>
						<li class="submit">
							<input type="submit" name="Submit" value="Submit">
						</li>
					</ul>
				</form>
				<!--Form end-->
			</div>
			<!--wrap ends-->
		</div>
		<!--midWrap ends-->
	</div>
        <!--main end-->
<script type="text/javascript">
		/* using JQUERY for the Type of Enquiry field that has to be selcted by the user */
	$(document).on('change', '.enqueryType', function() {
		var selectValue = $('.enqueryType :selected').val();
		/* If Others option is selected by the user in the Type of Enquiry Field */
		if (selectValue == "other") 
		{
                        /* The New textbox will be shown where the user has to provide the input*/
			$('.contact_display').show();
		}
		/* If Except Others option any other option is selected by the user in the Type of Enquiry Field*/
		else
		{ 
			/* The New textbox would be hidden where the user has to provide the input*/
			$('.contact_display').hide();
		}
	});
</script>


<?php include('footer.php');?>
