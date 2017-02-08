<?php include('header.php');?>
<link rel="stylesheet" type="text/css" href="css/help.css">
	<div class="main">
		<div class="midWrap">
			<div class="wrapper">
				<div class="topwrap">
					<h1>Help<span></span></h1>
				</div>
				<div class="bodyWrap">
					<div class="headings">
						<h2 class="center">Can't find what you want? <a href="http://127.0.0.1/Doctor2/contact.php" title="">Contact Us</a></h2>
					</div>
					<div class="searchbox">
						<form action="" method="" accept-charset="utf-8">
							<input type="search" name="" value="" placeholder="Search Your Queries"><span>Search</span>
						</form>
					</div>
					<div class="faq">
						FAQ's (Frequently Asked Questions)
					</div>
					<div class="headings">
						<h2>How to book an appointment ?</h2>
					</div>
					<div class="para">
						<p>
							If you are a new user, click on <a href="#" title="">Login/Register</a> button on the top right corner of the page. And then go to <a href="#" title=""> Register</a> option and fill the details and create your account. After that you can make an appointment with your nearest doctor/dentist.<br><br>
							If you are Registered user, click on <a href="#" title="">Login</a> button on the top right corner of the page. And then go to login option (If not logged in) By entering your username and password. After that you can make an appointment with your nearest doctor/dentist.
						</p>
					</div>


					<div class="headings">
						<h2>Can't find a doctor close to your location ?</h2>
					</div>
					<div class="para">
						<p>
							<a href="http://127.0.0.1/Doctor2/contact.php" title="">Contact Us</a> and we will get back to you within 24 working hours.
						</p>
					</div>


					<div class="headings">
						<h2>Having problem in logging into your account ?</h2>
					</div>
					<div class="para">
						<p>
							Go to <a href="#" title="">forgot password</a> and enter your details.

						</p>
					</div>
					


					<div class="headings">
						<h2>Have a feedback for our doctor you visited</h2>
					</div>
					<div class="paralast">
						<p>
							Enter your feedback:
						</p>
						<a href="C:\xampp\htdocs\Doctor2\feedback.php" title="Feedback" class="feedbackpop">Feedback</a>
					</div>


			</div>
		</div>
	</div>

	<div class="main2">
		<div class="midWrap2">
			<div class="wrappers">
				<div class="login">
					<ul class="topic">
						<li>Feedback</li>
						<li class="cross"><span></span></a></li>
					</ul>
				</div>
				<div class="details">
					<form action="feedback_submit.php" method="post" accept-charset="utf-8">
						<ul class="formtype">
							<li>
								<label>Doctor's Name
								<input type="text" name="docname_submit" value="" required="required"></label>
							</li>
							<li>
								<label>Patient's Name
								<input type="text" name="patientname_submit" value="" required="required"></label>
							</li>
							<li>
								<label>Date Visited
								<input type="text" name="date_submit" value="" required="required"></label>
							</li>
							<li>
								<label>Location/Pincode
								<input type="text" name="pincode_submit" value="" required="required"></label>
							</li>
							<li>
								<label>Health Problem
								<input type="text" name="problem_submit" value="" required="required"></label>
							</li>
							<li>
								<label>Feedback (in detail)
								<textarea name="details_submit" required="required"></textarea></label>
							</li>
							<li class="submitbd">
								<input type="submit" name="" value="Submit">
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).on('click', '.feedbackpop', function() {
		$('.main2').show();
	});
	$(document).on('click', '.cross span', function() {
		$('.main2').hide();
	});
</script>
	<?php include('footer.php');?>