<!DOCTYPE html>
<html>
<head>
	<title></title><link rel="stylesheet" type="text/css" href="css/feedback.css">
</head>
<body>
	<div class="main2">
		<div class="midWrap2">
			<div class="wrapper">
				<div class="login">
					<ul class="topic">
						<li>Feedback</li>
						<li class="cross"><a href="#" title=""></a></li>
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
								<input type="text" name="patname_submit" value="" required="required"></label>
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
							<li class="submitb">
								<input type="submit" name="" value="Submit">
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>