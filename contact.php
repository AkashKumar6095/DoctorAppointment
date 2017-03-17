<?php include('header.php');?>
<link rel="stylesheet" type="text/css" href="css/contact.css">
	<div class="main">
		<div class="headimg">
				<div class="imgbox">
					<img src="images/doctor.png" alt="">
				</div>
			</div>
		<div class="midWrap">
			<div class="wrap">
				<form action="contactform_submit.php" method="post" accept-charset="utf-8">
					<ul class="contactus">
						<li class="text"><h1>CONTACT US<span></span></h1></li>
						<li class="text"><p>In case you need any further assistance/Support.<br>
						We'd love to hear from you! Please fill the form below.<br>
						We would get back to you at the earliest.</p>
						</li>
						<li>
							<div class="contact_form">
								<label>Name<span>*</span></label>
								<input type="text" name="name_submit" value="" required="required">
							</div>

							<div class="contact_form">
								<label>E-mail<span>*</span></label>
								<input type="email" name="email_submit" value="" required="required">
							</div>

							<div class="contact_form">
								<label>Phone<span>*</span></label>
								<input type="text" name="phone_submit" pattern="[789][0-9]{9}" value="" required="required">
							</div>

							<div class="contact_form">
								<label>City<span>*</span></label>
								<input type="text" name="city_submit" value="" required="required">
							</div>
						</li>
						<li>
							<div class="contact_form">
								<label for="">Type of Enquiry</label>
								<select name="enquiry_submit" class="enqueryType">
									<option value="healthy">Healthy Related</option>
									<option value="business">Business Related</option>
									<option value="freeListing">Free Listing</option>
									<option value="other">Others</option>
								</select>
									<div class="drop"></div>
							</div>

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
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).on('change', '.enqueryType', function() {
		var selectValue = $('.enqueryType :selected').val();
		if (selectValue == "other") {
			$('.contact_display').show();
		}else{
			$('.contact_display').hide();
		}
	});
</script>


<?php include('footer.php');?>