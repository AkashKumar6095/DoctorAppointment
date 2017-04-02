<!--FEEDBACK-->
<!DOCTYPE html>
<html>
<head>
	
	<title></title>
	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="css/feedback.css">
</head>	
<body>
	<!--main2 starts-->
	<div class="main2">
		<!--midWrap2 starts-->
		<div class="midWrap2">
			<!--wrapper class starts-->
			<div class="wrapper">
				<!--login starts-->
				<div class="login">
					<!--Heading-->
					<ul class="topic">
						<li>Feedback</li>
						<li class="cross"><a href="#" title=""></a></li>
					</ul>
				</div>
				<!--details starts-->
				<div class="details">
			<!--Form Starts and after it is submitted it is sent for processing to feeback_submit.php file with the HTTP Post Method-->
			<form action="feedback_submit.php" method="post" accept-charset="utf-8">
			<ul class="formtype">
			<li>
			<label>Doctor's Name
			<!--Doctor Name Input Field-->	
			<input type="text" name="docname_submit" value="" required="required"></label>
			</li>
			<li>
			<label>Patient's Name
			<!--Patient Name Input Field-->	
			<input type="text" name="patname_submit" value="" required="required"></label>
			</li>
			<li>
			<label>Date Visited
			<!--Date of Visit Input Field-->
		        <input type="text" name="date_submit" value="" required="required"></label>
			</li>
			<li>
			<!--Location or Pin Code Input Field-->
			<label>Location/Pincode
			<input type="text" name="pincode_submit" value="" required="required"></label>
			</li>
			<li>
		        <label>Health Problem
			<!--Health Problem Faced Input Field-->
			<input type="text" name="problem_submit" value="" required="required"></label>
			</li>
			<li>
			<label>Feedback (in detail)
			<!--Feedback Message Input Field-->
			<textarea name="details_submit" required="required"></textarea></label>
			</li>
			<li class="submitb">
			<!--Submit Button-->	
			<input type="submit" name="" value="Submit">
			</li>
		        </ul>
			</form>
			<!--Form Ends-->
		        </div>
			<!--details ends-->	
	        </div>
		<!--wrapper class ends-->	
	     </div>
	     <!--midWrap2 starts-->
	</div>
	<!--main2 starts-->
</body>
</html>
