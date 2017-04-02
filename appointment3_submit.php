<?php
include('conn.php');
$sid = $_POST['sid'];                              // $sid gets the slot id of the doctor/dentist being extracted 
$name = $_POST['patname_name'];                    // $name gets the name of the patient being extracted 

$age = $_POST['patage_age'];                      // $age gets the age of the patient being extracted 

$category = $_POST['category'];                  // $category gets the category of the doctor/dentist selected from drop down menu being extracted 
$other_cat = $_POST['other_cat'];                // $sother_cat gets the others category from the category of the doctor/dentist from the drop down being extracted 
if($category=="others")                          // if $category gets the others being extracted   
{
	$category=$other_cat;                     // $category gets the others option being extracted 
}
$cosult_before = $_POST['cosult_option'];       // $cosult_option gets whether the patient has visited the doctor earlier or not being extracted 

$message = $_POST['explain_submit'];            // $message gets the info about the health problem by the patient being extracted 
 
$email = $_POST['email_submit'];                // "$srno" gets the "id" of hospital being extracted 

$contact = $_POST['contact_submit'];            // $contact gets the contact number of the patient being extracted 

$address = $_POST['pataddress_submit'];         // $address gets the "email address of the patient being extracted 

$sql="SELECT * FROM `slot_availability` WHERE `slot_id` = '$sid' AND `status`='available'";   //fetch all slots from slot_availability table when values slot_id column are equal to $sid and status column is equal to available
$res=mysqli_query($connection, $sql);
$slotcheck=mysqli_num_rows($res);

if($slotcheck>0)         //Until No of slots of each doctor/dentist are more than 0
{
 // $sql variable to store SQL Query to Add Slots to the Database Start //
$sql="INSERT INTO `slot_booking` (`slot_id`, `name`, `age`, `category`, `consult_before`, `message`, `email`, `contact`, `address`, `status`) VALUES('$sid', '$name', '$age', '$category', '$cosult_before', '$message', '$email', '$contact', '$address', 'confirmed')";  
mysqli_query($connection, $sql);     //executes queries 

$sql="UPDATE `slot_availability` SET `status` = 'booked' WHERE `slot_id` = '$sid'";     //update the slot_availabilty and instantly reserve that slot in the slot_id column and the status becomes booked
$res=mysqli_query($connection, $sql);  //executes queries

?>
<!-------------------------------------------- Styling the page starts ---------------------------------------------------------->
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
<!--Continue Button Takes Back to the Home Page after booking the apppointment-->	
<a href="<?php echo $siteroot;?>" style="margin: auto; display: block; width: 100px; text-align: center; background-color: #fff; color:#333; line-height: 35px; height: 35px; text-decoration: none;">Continue</a>
</div>
</div>
</div>
<!-------------------------------------------- Styling the page end ---------------------------------------------------------->
	<?php }?>
