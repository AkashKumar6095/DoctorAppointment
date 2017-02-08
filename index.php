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
							<li data-id="#rTab1" class="doctorActive">Ophthalmologist (Eye Specialist)</li>
							<li data-id="#rTab2">Cardiologist (Heart Specialist)</li>
							<li data-id="#rTab3">Gastroenterologist (Liver disorder)</li>
							<li data-id="#rTab4">Gynecologist (Women Health) </li>
							<li data-id="#rTab5">Urologist (Urinary Problems) </li>
							<li data-id="#rTab6">Dermatologist (Skin Specialist)</li>
							<li data-id="#rTab7"> Psychiatrist (Mental illness)</li>
							<li data-id="#rTab8">Ear Nose Throat (ENT Specialist)</li>
							<li data-id="#rTab9">Neurologist (Neurological Disorder)</li>
						</ul>
					</div>
					<div class="tabContainer" id="tab2">
						<ul class="dantistList">
							<li data-id="#rTab10" class="doctorActive">Dentist</li>
							<li data-id="#rTab11">Orthodontist </li>
							<li data-id="#rTab12">Endodontist </li>
							<li data-id="#rTab13">Prosthodontist </li>
							<li data-id="#rTab14">Pediatric Dentist </li>
							<li data-id="#rTab15">Implantologist </li>
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
						<div class="resultChange" id="rTab1">
							<ul class="resultsList">
								<li>
									<ul class="resultsListInner">
										<li>Dr. Naveen 
											<br>Speciality : Ophthalmologist (Eye Specialist) 
											<br>Qualification : MBBS 
										</li>
										<li>Patel Clinic</li>
										<li>70 Purvi Marg Vasant Kunj
											<br>New Delhi -110070 </li>
										<li>0.7 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
							</ul>
						</div><!-- resultChange end -->
						<div class="resultChange" id="rTab2">
							<ul class="resultsList">
								<li>
									<ul class="resultsListInner">
										<li>Dr. Sumit Singh
											<br>Speciality : Cardiologist (Heart Specialist)
											<br>Qualification: MBBS, MD
										</li>
										<li>Ross Clinic</li>
										<li>28, First Floor, B-10, DDA Market,
											<br> Vasant Kunj, New Delhi-110070 </li>
										<li>0.6 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
								<li>
									<ul class="resultsListInner">
										<li>Dr Sachin Chawla
											<br>Speciality : Cardiologist (Heart Specialist)
											<br>Qualification: MBBS, MD
										</li>
										<li>Dr Chawla Clinic</li>
										<li>Chawla Clinic, Shop No. 1, B-8 , Sector B,
											<br>Vasant Kunj, New Delhi, Delhi 110070</li>
										<li>0.8 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
							</ul>
						</div><!-- resultChange end -->
						<div class="resultChange" id="rTab3">
							<ul class="resultsList">
								<li>
									<ul class="resultsListInner">
										<li>Dr Ajay Singhal
											<br>Speciality : Gastroenterologist ( Liver disorder)
											<br>Qualification : MBBS, MD, DM (Gastroenterology) 
										</li>
										<li>Singhal Clinic</li>
										<li>B-8 , Sector B, Vasant Kunj, 
											<br>New Delhi -110070 </li>
										<li>0.7 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
								<li>
									<ul class="resultsListInner">
										<li>Dr Naman
											<br>Speciality : Gastroenterologist ( Liver disorder)
											<br>Qualification : MBBS, MD, DM (Gastroenterology) 
										</li>
										<li>Bansal Clinic</li>
										<li>Sector B, Pocket 1,
											<br>Vasant Kunj, New Delhi-110070</li>
										<li>0.8 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
							</ul>
						</div><!-- resultChange end -->
						<div class="resultChange" id="rTab4">
							<ul class="resultsList">
								<li>
									<ul class="resultsListInner">
										<li>Dr Sanjay Kumar
											<br>Speciality : Gynecologist (Women Healthcare)
											<br>Qualification : MBBS, MS(Obs & Gynae) 
										</li>
										<li>Sanjay Women & Child Care</li>
										<li>Sector-D, Pkt-6, Santushti Apt. Vasant Kunj,
											<br>New Delhi-110070</li>
										<li>0.4 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
							</ul>
						</div><!-- resultChange end -->
						<div class="resultChange" id="rTab5">
							<ul class="resultsList">
								<li>
									<ul class="resultsListInner">
										<li>Dr Arjun Bharadwaj
											<br>Speciality : Urologist (Urinary problems)
											<br>Qualification : MBBS, MS, M.CH 
										</li>
										<li>Dr Bharadwaj-Urologist</li>
										<li>Sector-D, Pkt-6, Santushti Apt. Vasant Kunj,
											<br>New Delhi-110070</li>
										<li>1.5 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
							</ul>
						</div><!-- resultChange end -->
						<div class="resultChange" id="rTab6">
							<ul class="resultsList">
								<li>
									<ul class="resultsListInner">
										<li>Dr Ajit Garg
											<br>Speciality : Dermatologist ( Skin Problems)
											<br>Qualification : MBBS, MD (Skin & VD) 
										</li>
										<li>The Derma Clinic</li>
										<li>First Floor, Vasant Plaza Vasant Kunj,
											<br>New Delhi-110070.</li>
										<li>1.2 KM.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
								<li>
									<ul class="resultsListInner">
										<li>Dr Ravi Jindal
											<br>Speciality : Dermatologist ( Skin Specialist)
											<br>Qualification : MBBS, M DERM, D.N.B
										</li>
										<li>Ravi Skin Clinic</li>
										<li>C-8, Vasant Kunj Road, Vasant Kunj,
											<br>New Delhi, Delhi 110070</li>
										<li>1.6 KM.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
								<li>
									<ul class="resultsListInner">
										<li>Dr Krishna Sharma
											<br>Speciality : Dermatologist ( Skin Specialist)
											<br>Qualification : MBBS, MD, FAMS, FRCP
										</li>
										<li>Dr Krishna Skin Clinic</li>
										<li>sector D pocket 4, Vasant Kunj, 
											<br>New Delhi, Delhi 110070</li>
										<li>1.9 KM.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
							</ul>
						</div><!-- resultChange end -->
						<div class="resultChange" id="rTab7">
							<ul class="resultsList">
								<li>
									<ul class="resultsListInner">
										<li>Dr Anjali Kashyap
											<br>Speciality : Psychiatrist ( Mental Illness)
											<br>Qualification : MBBS, MD, Diploma in CBT
										</li>
										<li>Dr Anjali Kashyap Psychiatry Centre</li>
										<li>B-64 Sector B, Vasant Kunj, 
											<br>New Delhi, Delhi 110070</li>
										<li>1.1 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
								<li>
									<ul class="resultsListInner">
										<li>Dr Sachin Rao
											<br>Speciality : Psychiatrist ( Mental Illness)
											<br>Qualification : MBBS, MD, Diploma in CBT
										</li>
										<li>Rao Skin Speciality Clinic</li>
										<li>B-11, Opposite Adhyant school, Vasant Kunj, Pocket 7, Sector C, 
											<br>Vasant Kunj, New Delhi 110070</li>
										<li>1.4 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
							</ul>
						</div><!-- resultChange end -->
						<div class="resultChange" id="rTab8">
							<ul class="resultsList">
								<li>
									<ul class="resultsListInner">
										<li>Dr Geeta Khatri
											<br>Speciality : Eyes Nose Throat (ENT Specialist)
											<br>Qualification : M.B.B.S, M.S.(ENT), DLO (England) 
										</li>
										<li>Khatri Dental Clinic</li>
										<li>B-56, Pocket-B Sector-4, Vasant Kunj
											<br>New Delhi -110070</li>
										<li>0.6 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
								<li>
									<ul class="resultsListInner">
										<li>Dr Arun Aggarwal
											<br>Speciality : Eyes Nose Throat (ENT Specialist)
											<br>Qualification : M.B.B.S, M.S.(ENT Surgery)
										</li>
										<li>Aggarwal Multi Dental Speciality Centre</li>
										<li>D - 2 / 2482, Vasant Kunj,
											<br>New Delhi -110070</li>
										<li>1.0 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
							</ul>
						</div><!-- resultChange end -->
						<div class="resultChange" id="rTab9">
							<ul class="resultsList">
								<li>
									<ul class="resultsListInner">
										<li>Dr Nitin Saini
											<br>Speciality : Neurologist (Neurological Disorder)											
											<br>Qualification : MBBS, DCH, ​MD(General Medicine)
										</li>
										<li>Saini Neuro Centre</li>
										<li>A-65 Sector- A, Pocket-B
											<br>New Delhi -110070 </li>
										<li>1.8 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
							</ul>
						</div><!-- resultChange end -->
						<div class="resultChange" id="rTab10">
							<ul class="resultsList">
								<li>
									<ul class="resultsListInner">
										<li>Dr. Anuj Gulati
											<br>Speciality : Dentist
											<br>Qualification : BDS, MDS, FICOI (USA)
										</li>
										<li>Multi Specialty Clinic</li>
										<li>C-22, Pocket C, Sector-6, Vasant Kunj
											<br>New Delhi -110070 </li>
										<li>0.9 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
							</ul>
						</div><!-- resultChange end -->
						<div class="resultChange" id="rTab11">
							<ul class="resultsList">
								<li>
									<ul class="resultsListInner">
										<li>Dr Ashish Bedi
											<br>Speciality : Orthodontist
											<br>Qualification : MDS (Orthodontist) 
										</li>
										<li>Dr Bedi's Dental And Orthodontist Clinic</li>
										<li> B-92, Westend Marg, Near JSS College, Vasant Kunj
											<br>New Delhi -110070 </li>
										<li>0.7 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
							</ul>
						</div><!-- resultChange end -->
						<div class="resultChange" id="rTab12">
							<ul class="resultsList">
								<li>
									<ul class="resultsListInner">
										<li>Dr Anil Dikshit
											<br>Speciality : Endodontist
											<br>Qualification : BDS, MDS, FRSH (UK)
										</li>
										<li>Dr Dikshit Advance Dental Speciality Centre</li>
										<li>B-76, Sector-B , Vasant Kunj
											<br>New Delhi -110070 </li>
										<li>0.7 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
							</ul>
						</div><!-- resultChange end -->
						<div class="resultChange" id="rTab13">
							<ul class="resultsList">
								<li>
									<ul class="resultsListInner">
										<li>Dr Sandeep Narang
											<br>Speciality : Prosthodontist
											<br>Qualification : BDS, MDS, FPFA (USA)
										</li>
										<li>Dental Clinic Centre</li>
										<li> Shop No-5, Church Road, Vasant Kunj 
											<br>New Delhi -110070 </li>
										<li>0.9 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
							</ul>
						</div><!-- resultChange end -->
						<div class="resultChange" id="rTab14">
							<ul class="resultsList">
								<li>
									<ul class="resultsListInner">
										<li>Dr Mohit Kohli
											<br>Speciality : Pediatric Dentist
											<br>Qualification : BDS, MDS , FAGE 
										</li>
										<li>Dr Mohit Kohli Clinic</li>
										<li>C-66, Westend Marg, Vasant Kunj
											<br>New Delhi -110070 </li>
										<li>1.1 K.M.</li>
										<li>
											<a href="#" target="_blank" class="bookAnA">Book An Appointment</a>
										</li>
									</ul>
								</li>
							</ul>
						</div><!-- resultChange end -->
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