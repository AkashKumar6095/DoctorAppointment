<!------------------------CALENDAR STARTS------------------------>
<!--Custom CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo $siteroot;?>/css/calendar.css" media="all">					
<?php 
if(isset($_GET['month']))
{
	$month=$_GET['month'];
}else
{
	$month=date('m');
}
if(isset($_GET['year']))
{
	$year=$_GET['year'];
}else
{
	$year=date('Y');
}
$c_date=date($year."-".$month."-1 12:00:00");
$start_day=date("D", strtotime($c_date));

if(strtolower($start_day)=="sun")
{
	$numday=1;
}else if(strtolower($start_day)=="mon")
{
	$numday=2;
}else if(strtolower($start_day)=="tue")
{
	$numday=3;
}else if(strtolower($start_day)=="wed")
{
	$numday=4;
}else if(strtolower($start_day)=="thu")
{
	$numday=5;
}else if(strtolower($start_day)=="fri")
{
	$numday=6;
}else if(strtolower($start_day)=="sat")
{
	$numday=7;
}

$pre_day=$numday-2;


?>
            <!-- calenderSliderMain start--->
            <div class="calenderSliderMain" id="printWrap" style="margin-top: 20px;">
		<!-- calenderSliderIneer start -->
                <div class="calenderSliderIneer">
	            <!-- calenderMainWrap start-->
                    <div class="calenderMainWrap">
			<!--calenderHeading start-->
                        <div class="calenderHeading">
                        	<?php
							if($month==12)
							{
								$nextmonth=1;
								$nextyear=$year+1;
							}else
							{
								$nextmonth=$month+1;
								$nextyear=$year;
							}
							
							if($month==1)
							{
								$previousmonth=12;
								$previousyear=$year-1;
							}else
							{
								$previousmonth=$month-1;
								$previousyear=$year;
							}
							?>
							<div style="float: right; margin-top: 2px;">
							<?php if(($previousmonth>=date("m") && $year>=date('Y')) || $year>date('Y')){?>
                            <a href="<?php echo $siteroot;?>/appoint2.php?did=<?php echo $did;?>&month=<?php echo $previousmonth;?>&year=<?php echo $previousyear;?>" class="prev_date"></a>
                            <?php }?>
                            <time class="text-success"><?php echo date('M',strtotime($c_date));?>,  <?php echo $year;?></time>
                            
                            <a href="<?php echo $siteroot;?>/appoint2.php?did=<?php echo $did;?>&month=<?php echo $nextmonth;?>&year=<?php echo $nextyear;?>" class="next_date"></a>
                            
                            </div>
                           </div>
                        <div class="calenderWrap">
                            <ul class="calHeader">
                                <li>Sun</li>
                                <li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                            </ul>
                            <ul class="calDates">

                                <?php
								$days=cal_days_in_month(CAL_GREGORIAN, $month, $year);
								$prev_month_days=cal_days_in_month(CAL_GREGORIAN, $previousmonth, $previousyear);
								if($month>date('m') & $year>date('Y'))
								{
									$count=0;
									$continueEventDays=0;
									for ($date=1; $date <= $days; $date++)
									{
										$addition_class="";
										$tempdate=date_create($date."-".$month."-".$year);
										$this_date=date_format($tempdate,"dmY");;
										//$this_date=date('dmY', strtotime(date($date)));
										?>
										<li><?php echo $date;?></li>
								<?php }
								}else
								{
									for ($date=$prev_month_days-$pre_day; $date <= $prev_month_days; $date++)
									{ ?>
									<li class="disable"><?php echo $date;?></li>
								<?php }
									$count=0;
									$continueEventDays=0;
									for ($date=1; $date <= $days; $date++)
									{
										$tempdate=date_create($date."-".$month."-".$year);
										$this_date=date_format($tempdate,"dmY");;
										//$this_date=date('dmY', strtotime(date($date)));
										?>
									<li>
                                    
                                    <span style="font-size: 20px; font-weight: normal;"><?php echo $date;?></span>
										
										<?php
										if(strlen($month)<=1)
										{
											$tempmonth="0".$month;
										}else
										{
											$tempmonth=$month;
										}
										if(strlen($date)<=1)
										{
											$tempdate="0".$date;
										}else
										{
											$tempdate=$date;
										}
				 $current_date="$year-$month-$date";  
				 $tempdate=$year."-".$tempmonth."-".$tempdate;
       $sql="SELECT * FROM `slot_availability` WHERE `doctor_id` = '$did'AND`date`='$current_date'AND`status`= 'available'"; //fetches all columns from the slot_availability table where alue of doctor_id are equal to did variable and date are equal to current_date variable and status ='available'
				 $res=mysqli_query($connection, $sql); ////executes queries
				 $slot_count=mysqli_num_rows($res);    //Associative array
				 ?>
						        <!--event_label start-->
							<div class="event_label">
							<?php 
							if($slot_count<=0)
							{
							}else
							{
							  echo '<a href="'.$siteroot.'/lastpage.php?date='.$current_date.'&did='.$did.'"><span class="text"><i class="fa fa-user"></i> '.$slot_count.' Slots available</span></a>';
						        }
							?>
							</div>
							<!--event_label end-->
                                                        </li>
						        <?php }
						         }?>
                             </ul>
                        </div>     
			<!--calenderHeading end-->
                    </div>
                    <!-- calenderMainWrap end -->
                </div><!-- calenderSliderIneer end -->
            </div> <!-- calenderSliderMain end -->
<!------------------------------CALENDAR ENDS------------------------->
