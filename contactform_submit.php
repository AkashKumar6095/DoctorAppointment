<?php
include('conn.php');
$name = $_POST['name_submit'];  //$name gets the name of the user being extracted 

$email = $_POST['email_submit'];   //$email gets the Email ID of the user being extracted 

$phone = $_POST['phone_submit'];   //$phone gets the phone number of the user being extracted 

$city = $_POST['city_submit'];     //$city gets the City Name of the user being extracted 

$enquiry = $_POST['enquiry_submit'];    //$enquiry gets the type of the enquiry of the user from the drop down menu being extracted

$other = $_POST['other_submit'];     //$other gets the others option from the $enquiry being extracted 
if($enquiry=="other")                //if $enquiry is assigned the other option by the user from the drop down menu
{
	$enquiry=$other;             //$enquiry gets the other option being executed
}

$message = $_POST['message_submit'];  //$message gets the complete message of the user being executed

// $sql variable to store SQL Query to Add Slots to the Database Start //
$sql="INSERT INTO `contact_us` (`name`, `email`, `phone`, `city`, `type`, `message`) VALUES('$name', '$email', '$phone', '$city', '$enquiry', '$message')";
mysqli_query($connection, $sql); //executes queries

?>	
<!-------------------------------------------- Styling the page starts ---------------------------------------------------------->
<div style="width: 400px; position: absolute; left: 0; right: 0; margin: auto; background-color: #279e29; color:#fff; padding: 10px;">
<h3 style="float: left; width: 100%; text-align: center;">Thank You For Contacting Us!</h3>
<p style="float: left; width: 100%; text-align: center;">We will get back to you shortly.</p>
<div style="float: left; width: 100%">
<a href="<?php echo $siteroot;?>/contact.php" style="margin: auto; display: block; width: 100px; text-align: center; background-color: #fff; color:#333; line-height: 35px; height: 35px; text-decoration: none;">Continue</a>
</div>
</div>
<!-------------------------------------------- Styling the page ends ---------------------------------------------------------->
