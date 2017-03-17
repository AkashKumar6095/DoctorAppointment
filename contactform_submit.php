<?php
include('conn.php');
$name = $_POST['name_submit'];

$email = $_POST['email_submit'];

$phone = $_POST['phone_submit'];

$city = $_POST['city_submit'];

$enquiry = $_POST['enquiry_submit'];

$other = $_POST['other_submit'];
if($enquiry=="other")
{
	$enquiry=$other;
}

$message = $_POST['message_submit'];


$sql="INSERT INTO `contact_us` (`name`, `email`, `phone`, `city`, `type`, `message`) VALUES('$name', '$email', '$phone', '$city', '$enquiry', '$message')";
mysqli_query($connection, $sql);

?>	
<div style="width: 400px; position: absolute; left: 0; right: 0; margin: auto; background-color: #279e29; color:#fff; padding: 10px;">
<h3 style="float: left; width: 100%; text-align: center;">Thank You For Contacting Us!</h3>
<p style="float: left; width: 100%; text-align: center;">We will get back to you shortly.</p>
<div style="float: left; width: 100%">
<a href="<?php echo $siteroot;?>/contact.php" style="margin: auto; display: block; width: 100px; text-align: center; background-color: #fff; color:#333; line-height: 35px; height: 35px; text-decoration: none;">Continue</a>
</div>
</div>