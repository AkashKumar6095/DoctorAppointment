<?php include('header.php');?>
<?php
if(isset($_GET['key']))
{
	$key=$_GET['key'];
}else
{
	$key="";
}
?>
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
						<form method="get" accept-charset="utf-8">
							<input type="search" name="key" value="" placeholder="Search Your Queries"><span>Search</span>
						</form>
					</div>
					<div class="faq">
						FAQ's (Frequently Asked Questions)
					</div>

					<?php
					$sql="SELECT * FROM `faq` WHERE `question` LIKE '%$key%' OR `answer` LIKE '%$key%'";
					$res=mysqli_query($connection, $sql);
					$count=mysqli_num_rows($res);
					while($row=mysqli_fetch_assoc($res))
					{
						$question=$row['question'];
						$answer=$row['answer'];
					?>
					<div class="headings">
						<h2><?php echo $question;?></h2>
					</div>
					<div class="para">
						<p>
							<?php echo $answer;?>
						</p>
					</div>
					<?php }?>

					<?php
					if($count<=0)
					{

					?>
					<div class="headings">
						<h2 style="color:#f00;">No FAQ's Found</h2>
					</div>
					<?php }?>

					
					


					<div class="headings">
						<h2>Have a feedback for our doctor you visited</h2>
					</div>
					<div class="paralast">
						<p>
							Enter your feedback:
						</p>
						<a href="http://127.0.0.1/Doctor2/feedback.php" title="Feedback" class="feedbackpop">Feedback</a>
					</div>


			</div>
		</div>
	</div>

	<div class="mainWrap feedbackOverlay">
		<div class="midWrap2">
			<div class="wrappers">
				<div class="login">
					<ul class="topic2">
						<li>Feedback</li>
						<li class="cross"><span></span></a></li>
					</ul>
				</div>
				<div class="details">
					<form action="" method="" accept-charset="utf-8">
						<ul class="formtypefeed">
							<li>
								<label>Doctor's Name</label>
								<input type="text" name="" value="" required="required">
							</li>
							<li>
								<label>Patient's Name</label>
								<input type="text" name="" value="" required="required">
							</li>
							<li>
								<label>Date Visited</label>
								<input type="text" name="" value="" required="required">
							</li>
							<li>
								<label>Location/Pincode</label>
								<input type="text" name="" value="" required="required">
							</li>
							<li>
								<label>Health Problem</label>
								<input type="text" name="" value="" required="required">
							</li>
							<li>
								<label>Feedback (in detail)
								<textarea name="" required="required"></textarea></label>
							</li>
							<li class="submitbd">
								<input type="submit" name="Submit" value="Submit">
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).on('click', '.feedbackpop', function() {
		$('.feedbackOverlay').show();
	});
	$(document).on('click', '.cross span', function() {
		$('.feedbackOverlay').hide();
	});
</script>
	<?php include('footer.php');?>
