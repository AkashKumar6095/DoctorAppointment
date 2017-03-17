<?php include('header.php');?>
<link rel="stylesheet" type="text/css" href="css/index.css">


	<div class="mainWrap">
		<div class="midWrap">
			<div class="topImageWrap">
				<img src="images/banner.jpg" alt="top Image">
				<div class="topTextWrap">Search for a doctor near you based on speciality</div>
			</div>
			<div class="container">
				<div class="leftContainer">
					<ul class="tabMain">
						<li data-id="#tab1" class="activeTab">Doctor</li>
						<li data-id="#tab2">Dentist</li>
					</ul>
					<div class="tabContainer" id="tab1" style="display: block;">
						<ul class="dantistList">
							<?php
							$sql="SELECT * FROM `doctor_category` WHERE `type` = 'doctor'";
							$res=mysqli_query($connection, $sql);
							while($row=mysqli_fetch_assoc($res))
							{
								$cat_id=$row['cat_id'];
								$cat_name=$row['cat_name'];
							?>
							<li data-id="#rTab<?php echo $cat_id;?>"><?php echo $cat_name;?></li>
							<?php }?>
						</ul>
					</div>
					<div class="tabContainer" id="tab2">
						<ul class="dantistList">
							<?php
							$sql="SELECT * FROM `doctor_category` WHERE `type` = 'dentist'";
							$res=mysqli_query($connection, $sql);
							while($row=mysqli_fetch_assoc($res))
							{
								$cat_id=$row['cat_id'];
								$cat_name=$row['cat_name'];
							?>
							<li data-id="#rTab<?php echo $cat_id;?>"><?php echo $cat_name;?></li>
							<?php }?>
						</ul>
					</div>
				</div>
				<div class="rightContainer">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3507.22142469248!2d77.4824705156392!3d28.472877582481072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cea0f7b91511b%3A0x486f13bd49e5e7ae!2sSharda+University!5e0!3m2!1sen!2sin!4v1479984481743" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				<div class="resultsMainWrap">
					<div class="resultHeading">Index</div>
					<div class="resultWrap">
						<ul class="resultsHeadingWrap">
							<li>Dr. Name</li>
							<li>Clinic Name</li>
							<li>Clinic Address</li>
							<!--<li></li>-->
							<li class="hidden">Distance from location</li>
							<li class="location"></li>
							<li class="hidden">Book An Appointment</li>
						</ul>

						<?php
							$sqlcat="SELECT * FROM `doctor_category`";
							$rescat=mysqli_query($connection, $sqlcat);
							while($rowcat=mysqli_fetch_assoc($rescat))
							{
								$cat_id=$rowcat['cat_id'];
								$cat_name=$rowcat['cat_name'];
							?>
						
						<div class="resultChange" id="rTab<?php echo $cat_id;?>">
							<ul class="resultsList">
								<?php
								$sql="SELECT * FROM `doctors` WHERE `cat_id` = '$cat_id'";
								$res=mysqli_query($connection, $sql);
								while($row=mysqli_fetch_assoc($res))
								{
									
									$d_id=$row['d_id'];
									$doctor_name=$row['d_name'];
									$d_type=$row['d_type'];
									$d_spec=$row['d_spec'];
									$d_qual=$row['d_qual'];
									$d_clname=$row['d_clname'];
									$d_claddr=$row['d_claddr'];

								?>
								<li>
									<ul class="resultsListInner">
										<li><?php echo $doctor_name;?>
											<br>Specialty : <?php echo $cat_name;?> 
											<br>Qualification : <?php echo $d_qual;?>
										</li>
										<li><?php echo $d_clname;?></li>
										<li><?php echo $d_claddr;?></li>
										<li></li>
										<li>
											<a href="<?php echo $siteroot;?>/appoint2.php?did=<?php echo $d_id;?>" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
								<?php }?>
							</ul>
						</div><!-- resultChange end -->
						<?php }?>
						<!-- resultChange end -->
						<div class="resultChange" id="rTab15">
							<ul class="resultsList">
								
							</ul>
						</div><!-- resultChange end -->
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include('footer.php');?>