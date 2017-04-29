<?php include('conn.php');?>     //include Database Connection
<?php
/*
hit url
http://127.0.0.1/doctor2/update_slot.php?date=YYYY-MM-DD
*/
$date_g = @$_GET['date'];
$d_id = @$_GET['d_id'];

if(!empty($d_id))   //until the d_id variable is not empty
{
	$sql_doctor="SELECT * FROM `doctors` WHERE `d_id`='$d_id'";    //fetch all columns from doctors table where values in d_id table are equal to $d_id 
}else
{
	$sql_doctor="SELECT * FROM `doctors`";                       //fetch all columns from doctors table
}

	$res_doctor=mysqli_query($connection, $sql_doctor);     //execute queries
	while($row=mysqli_fetch_assoc($res_doctor))            //until row acts an associative array
	{
								
									$did=$row['d_id'];     
									$catid=$row['cat_id'];
									$doctor_name=$row['d_name'];
									$d_type=$row['d_type'];
									$d_spec=$row['d_spec'];
									$d_qual=$row['d_qual'];
									$d_clname=$row['d_clname'];
									$d_claddr=$row['d_claddr'];

									$available_in_morn_from=$row['available_in_morn_from'];
									$available_in_morn_to=$row['available_in_morn_to'];
									$available_in_eve_from=$row['available_in_eve_from'];
									$available_in_eve_to=$row['available_in_eve_to'];
									$appoi_time_minuts=$row['appoi_time_minuts'];

									$sqlcat="SELECT * FROM `doctor_category` WHERE `cat_id` = '$catid'"; //fetch all tables from doctor_category table where values in cat_id table are equal to $catid
									$rescat=mysqli_query($connection, $sqlcat);  //executes queries
									$rowcat=mysqli_fetch_assoc($rescat);  //fetch result row as an associative array  
									$cat_name=$rowcat['cat_name'];  
                                //Morning Slots For Doctor Appointment Start
				$slot_sql_values="";
				$temparr=explode(':', $available_in_morn_from);
				$available_in_morn_from_hr=$temparr[0];
				if(count($temparr)==2)        
				{
					$available_in_morn_from_mn=$temparr[1];
				}else
				{
					$available_in_morn_from_mn=0;
				}

				$temparr=explode(':', $available_in_morn_to);
				$available_in_morn_to_hr=$temparr[0];
				if(count($temparr)==2)
				{
					$available_in_morn_to_mn=$temparr[1];
				}else
				{
					$available_in_morn_to_mn=0;
				}

					
					$tempcheck=explode('-', $date_g);
					if(empty($date_g) && count($tempcheck)==3)
					{
						$this_date=date('Y-m-d');;
					}else
					{
						$this_date=$date_g;
					}
$sql="SELECT * FROM `slot_availability` WHERE `doctor_id` = '$did' AND `date` = '$this_date'"; //fetches all columns from slot_availability table where doctor_id variable are equal to did and date variable are equal to this_date(current date)
                                $res=mysqli_query($connection, $sql);    //executes queries
				$count=mysqli_num_rows($res);   //gets the total number of rows and stores it in count
				if($count<=0)
				{ 
					        $insert_slot_values="";
						$i=$available_in_morn_from_hr;
						$j=$available_in_morn_from_mn;
					        if($available_in_morn_to_mn>=$appoi_time_minuts)
						{
							$tomn=$available_in_morn_to_mn-$appoi_time_minuts;
							$tohr=$available_in_morn_to_hr;
						}
					        else
						{
							$tomn=$available_in_morn_to_mn+60-$appoi_time_minuts;
							$tohr=$available_in_morn_to_hr-1;
						}
						while($i<$tohr || ($i<=$tohr && $j<=$tomn))
						{
							

							if($i>12)
							{
								$hrtime=$i-12;
								$tformat="pm";
							}else if($i==12)
							{
								$hrtime=$i;
								$tformat="pm";
							}else
							{
								$hrtime=$i;
								$tformat="am";
							}

							$mntime=$j;

							if($mntime==9)
							{
								$mntime="0".$mntime;
							}else if($mntime==0)
							{
								$mntime="00";
							}

							$from_timing="$hrtime:$mntime $tformat";

							$j+=$appoi_time_minuts;
							if($j>=60)
							{
								$i+=floor($j/60);
								$j=$j%60;
							}

							$hrtime=$i;
							$mntime=$j;
							
							
							


							if($hrtime>12)
							{
								$hrtime=$hrtime-12;
								$tformat="pm";
							}else if($hrtime==12)
							{
								$hrtime=$hrtime;
								$tformat="pm";
							}else
							{
								$hrtime=$i;
								$tformat="am";
							}


							if($mntime==9)
							{
								$mntime="0".$mntime;
							}else if($mntime==0)
							{
								$mntime="00";
							}

							$to_timing="$hrtime:$mntime $tformat";

							$timing=$from_timing." - ".$to_timing;
							
							if($slot_sql_values=="")
							{
								$slot_sql_values=$slot_sql_values."('$did', '$this_date', '$timing', 'morning')";
							}else
							{
								$slot_sql_values=$slot_sql_values.", ('$did', '$this_date', '$timing', 'morning')";
							}

							//echo "$i : $j<br>";
						}
						//echo $slot_sql_values;
					//Morning Slots For Doctor Appointment End
					
					//Evening Slots For Doctor Appointment Start
						$temparr=explode(':', $available_in_eve_from);
						$available_in_eve_from_hr=$temparr[0];
						if(count($temparr)==2)
						{
							$available_in_eve_from_mn=$temparr[1];
						}else
						{
							$available_in_eve_from_mn=0;
						}

						$temparr=explode(':', $available_in_eve_to);
						$available_in_eve_to_hr=$temparr[0];
						if(count($temparr)==2)
						{
							$available_in_eve_to_mn=$temparr[1];
						}else
						{
							$available_in_eve_to_mn=0;
						}

						
						$insert_slot_values="";
						$i=$available_in_eve_from_hr;
						$j=$available_in_eve_from_mn;
						$hrtime=0;
						$mntime=0;
						if($available_in_eve_to_mn>=$appoi_time_minuts)
						{
							$tomn=$available_in_eve_to_mn-$appoi_time_minuts;
							$tohr=$available_in_eve_to_hr;
						}else
						{
							$tomn=$available_in_eve_to_mn+60-$appoi_time_minuts;
							$tohr=$available_in_eve_to_hr-1;
						}
						while($i<$tohr || ($i<=$tohr && $j<=$tomn))
						{
							if($i>12)
							{
								$hrtime=$i-12;
								$tformat="pm";
							}else if($i==12)
							{
								$hrtime=$i;
								$tformat="pm";
							}else
							{
								$hrtime=$i;
								$tformat="am";
							}

							$mntime=$j;


							if($mntime==9)
							{
								$mntime="0".$mntime;
							}else if($mntime==0)
							{
								$mntime="00";
							}

							$from_timing="$hrtime:$mntime $tformat";


							$j+=$appoi_time_minuts;
							if($j>=60)
							{
								$i+=floor($j/60);
								$j=$j%60;
							}

							$mntime=$j;   //minutes 
							
							$hrtime=$i; //hours
							
							if($hrtime>12)
							{
								$hrtime=$hrtime-12;
								$tformat="pm";
							}else if($hrtime==12)
							{
								$hrtime=$hrtime;
								$tformat="pm";
							}else
							{
								$hrtime=$hrtime;
								$tformat="am";
							}


							if($mntime==9)
							{
								$mntime="0".$mntime;
							}else if($mntime==0)
							{
								$mntime="00";
							}

							$to_timing="$hrtime:$mntime $tformat";

							$timing=$from_timing." - ".$to_timing;
							
							if($slot_sql_values=="")
							{
								$slot_sql_values=$slot_sql_values."('$did', '$this_date', '$timing', 'evening')";
							}else
							{
								$slot_sql_values=$slot_sql_values.", ('$did', '$this_date', '$timing', 'evening')";
							}

							//echo "$i : $j<br>";
						}
				                     //Evening Slots For Doctor Appointment End
					///////////////
  echo $sql="INSERT INTO `slot_availability` (`doctor_id`, `date`, `timing`, `slot_shift`) VALUES $slot_sql_values";   //create the slot_availability table
					mysqli_query($connection, $sql) or die(mysqli_error($connection));
			}
}
?>
