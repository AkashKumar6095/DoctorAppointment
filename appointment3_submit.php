<?php
include('conn.php');
$sid = $_POST['sid'];
$name = $_POST['patname_name'];

$age = $_POST['patage_age'];

$category = $_POST['category'];
$other_cat = $_POST['other_cat'];
if($category=="others")
{
	$category=$other_cat;
}
$cosult_before = $_POST['cosult_option'];



$message = $_POST['explain_submit'];

$email = $_POST['email_submit'];

$contact = $_POST['contact_submit'];

$address = $_POST['pataddress_submit'];



$sql="SELECT * FROM `slot_availability` WHERE `slot_id` = '$sid' AND `status`='available'";
$res=mysqli_query($connection, $sql);
$slotcheck=mysqli_num_rows($res);

if($slotcheck>0)
{

$sql="INSERT INTO `slot_booking` (`slot_id`, `name`, `age`, `category`, `consult_before`, `message`, `email`, `contact`, `address`, `status`) VALUES('$sid', '$name', '$age', '$category', '$cosult_before', '$message', '$email', '$contact', '$address', 'confirmed')";
mysqli_query($connection, $sql);

$sql="UPDATE `slot_availability` SET `status` = 'booked' WHERE `slot_id` = '$sid'";
$res=mysqli_query($connection, $sql);

?>


<div style="width: 400px; position: absolute; left: 0; right: 0; margin: auto; background-color: #279e29; color:#fff; padding: 10px;">
<h3 style="float: left; width: 100%; text-align: center;">Congratulations!</h3>
<p style="float: left; width: 100%; text-align: center;">Your Appointment has been booked.</p>
<div style="float: left; width: 100%">
<a href="<?php echo $siteroot;?>" style="margin: auto; display: block; width: 100px; text-align: center; background-color: #fff; color:#333; line-height: 35px; height: 35px; text-decoration: none;">Continue</a>
</div>
</div>
<?php
}else
{
	?>
<div style="width: 400px; position: absolute; left: 0; right: 0; margin: auto; background-color: #F00; color:#fff; padding: 10px;">
<h3 style="float: left; width: 100%; text-align: center;">Sorry!</h3>
<p style="float: left; width: 100%; text-align: center;">This Slot is already booked.</p>
<div style="float: left; width: 100%">
<a href="<?php echo $siteroot;?>" style="margin: auto; display: block; width: 100px; text-align: center; background-color: #fff; color:#333; line-height: 35px; height: 35px; text-decoration: none;">Continue</a>
</div>
</div>
</div>
	<?php }?>