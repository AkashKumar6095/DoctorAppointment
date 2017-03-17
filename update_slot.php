<?php include('conn.php');?>
<?php
/*
hit url
http://127.0.0.1/doctor2/update_slot.php?date=2017-02-17
*/
$date_g = @$_GET['date'];
	$sql_doctor="SELECT * FROM `doctors`";
	$res_doctor=mysqli_query($connection, $sql_doctor);
	while($row=mysqli_fetch_assoc($res_doctor))
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

									$sqlcat="SELECT * FROM `doctor_category` WHERE `cat_id` = '$catid'";
									$rescat=mysqli_query($connection, $sqlcat);
									$rowcat=mysqli_fetch_assoc($rescat);
									$cat_name=$rowcat['cat_name'];

									


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

				$sql="SELECT * FROM `slot_availability` WHERE `doctor_id` = '$did' AND `date` = '$this_date'";
				$res=mysqli_query($connection, $sql);
				$count=mysqli_num_rows($res);

				if($count<=0)
				{
					
					
						$insert_slot_values="";
						$i=$available_in_morn_from_hr;
						$j=$available_in_morn_from_mn;
						
						

						if($available_in_morn_to_mn>=$appoi_time_minuts)
						{
							$tomn=$available_in_morn_to_mn-$appoi_time_minuts;
							$tohr=$available_in_morn_to_hr;
						}else
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



						///evening slots
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

							$mntime=$j;
							
							$hrtime=$i;
							


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
				
					///////////////

				
					echo $sql="INSERT INTO `slot_availability` (`doctor_id`, `date`, `timing`, `slot_shift`) VALUES $slot_sql_values";
					mysqli_query($connection, $sql) or die(mysqli_error($connection));
			}
}
?>
