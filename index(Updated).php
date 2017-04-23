<?php include('header.php');?>
<!--CUSTOM CSS-->
<link rel="stylesheet" type="text/css" href="css/index.css">
        <!--mainWrap start-->
	<div class="mainWrap">
		<!--midWrap start-->
		<div class="midWrap">
		 <!--Header Image  -->
			<div class="topImageWrap">
				<img src="images/banner.jpg" alt="top Image">
				<div class="topTextWrap">Search for a doctor near you based on speciality</div>
			</div>				
			<div class="container" id="ourdoctor">
				<div class="leftContainer">
					<ul class="tabMain">
						<li data-id="#tab1" class="activeTab">Doctor</li>
						<li data-id="#tab2">Dentist</li>
					</ul>
					<div class="tabContainer" id="tab1" style="display: block;">
						<ul class="dantistList">
							<?php
							$sql="SELECT * FROM `doctor_category` WHERE `type` = 'doctor'"; //fetch all categories in doctor type from doctor_category table where type is doctor
							$res=mysqli_query($connection, $sql);      //executes queries
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
							$sql="SELECT * FROM `doctor_category` WHERE `type` = 'dentist'"; //fetch all columns from doctor_category table where type is dentist
							$res=mysqli_query($connection, $sql);    //executes queries
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
					<div id="map" style="width: 100%; height: 350px;"></div>
				</div>
				<div class="resultsMainWrap">
					<div class="resultHeading">Index</div>
					<div class="resultWrap">
						<ul class="resultsHeadingWrap">
							<li>Dr. Name</li>
							<li>Clinic Name</li>
							<li>Clinic Address</li>
							<!--<li></li>-->
							<!-- <li class="hidden">Distance from location</li> -->
							<!-- <li class="location"></li> -->
							<li class="hidden">Book An Appointment</li>
						</ul>

						<?php
							$sqlcat="SELECT * FROM `doctor_category`"; //fetch all columns from doctor_category table
							$rescat=mysqli_query($connection, $sqlcat); //executes queries
							while($rowcat=mysqli_fetch_assoc($rescat))
							{
								$cat_id=$rowcat['cat_id'];
								$cat_name=$rowcat['cat_name'];
							?>
						
						<div class="resultChange" id="rTab<?php echo $cat_id;?>">
							<ul class="resultsList">
								<?php
								$sql="SELECT * FROM `doctors` WHERE `cat_id` = '$cat_id'"; //fetch all columns from doctors table where values in cat_id are equal to $cat_id
								$res=mysqli_query($connection, $sql);                     //executes queries
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
										<li style="width: 0; display: none;"></li>
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
	
	<script>

//map to detect location

		var x = document.getElementById("map");
		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else { 
				x.innerHTML = "Geolocation is not supported by this browser.";
			}
		}
		
		
		function getAddress(lat, long)
		{
			var geocoder = new google.maps.Geocoder();
			latitude = lat;
			longitude = long;
			
			/*latitude = "51.51957909999999";
			longitude = "-0.1424882000000025";*/
			var latLng = new google.maps.LatLng(latitude,longitude);
			geocoder.geocode({       
					latLng: latLng     
					}, 
					function(responses) 
					{     
					   if (responses && responses.length > 0) 
					   {        
						   //alert(responses[6].formatted_address);     
						   var response_address=responses[6].formatted_address;
						   var arr=response_address.split(',');
						   if(arr.length<=1)
						   {
							   alert("Unable to find your location!");
						   }else
						   {
							   var city=arr[0];
							   $("#auto_location").val(city);
							   $(".detectbtn.detecting").removeClass("detecting");
						   }
					   } 
					   else 
					   {       
						 alert('Not getting Any address for given latitude and longitude.');     
					   }   
					}
			);
		}
		
		var lati=28.5275198;
		var longi=77.0688967;
		function showPosition(position) {
			lati=position.coords.longitude;
			longi=position.coords.longitude;
			//lati=28.5275198;
			//longi=77.0688967;
			//alert(lat);
			initMap();	
			//getAddress(lat, long);
		}

		
		
		$(window).on("load", function(){
			getLocation();	
		})
		
		
		/*$("#auto_location").on("input", function(event) {
            event.preventDefault();
			var location=$.trim($(this).val());
			if(location.length>1)
			{
				var t=$(".locationWrap").offset().top+45;
				var l=$(".locationWrap").offset().left;
				var w=$(".locationWrap").outerWidth();
				$(".search_results").css("top", t).css("left", l).width(w);
							
			}else
			{
				$(".search_results").hide();
			}
        });*/
		
		
		
		
		
/////////////////////////



      function initMap() {
        var mapDiv = document.getElementById('map');
        var map = new google.maps.Map(mapDiv, {
            center: {lat: lati, lng: longi},
            zoom: 10,
			 styles: [ { "elementType": "labels", "stylers": [ { "visibility": "on" } ] },{ "featureType": "water", "elementType": "geometry.fill", "stylers": [ { "visibility": "on" }, { "color": "#bcccff" } ] } ]
			 			 
        });
		
		
			 // declare the icons
		var iconBase = '<?php echo $siteroot;?>/images/';
        

        function addMarker(feature) {
          	var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
			title: feature.title,
            map: map
          });
		  var tooltipdata;
		  var infowindow = new google.maps.InfoWindow({
	      content: tooltipdata
	    });
		  google.maps.event.addListener(marker, 'click', function() {
		  	infowindow.setContent("<b>"+this.get('title')+"</b>");
		  	
	      	infowindow.open(map,marker);
	    });

        }
		var features = [	  
			  <?php
			  $begin=1;
			  $pokeicons=array();
			  $j=0;
				$sql="SELECT * FROM `doctors`";      //fetch all columns from the doctors table
								$res=mysqli_query($connection, $sql); //executes queries
								while($row=mysqli_fetch_assoc($res))
								{
									
									$d_id=$row['d_id'];
									$doctor_name=$row['d_name'];
									$d_type=$row['d_type'];
									$d_spec=$row['d_spec'];
									$d_qual=$row['d_qual'];
									$d_clname=str_replace("'", "`", $row['d_clname']);
									$d_claddr=str_replace("'", "`", $row['d_claddr']);
									$d_lat=$row['d_latitude'];
									$d_long=$row['d_longitude'];
									$pimg="clinic_icon.png";	
								$title=$d_clname;
						
							if(trim($d_lat)!="" && trim($d_long)!="")
							{
								if(trim($pimg)!="")
								{
									$j++;
									
									$mapicon=$pimg;
									array_push($pokeicons,$mapicon);
						
				?>
          <?php echo $begin==0?",":"";?>{
            position: new google.maps.LatLng(<?php echo $d_lat;?>, <?php echo $d_long;?>),
            type: 'clinic',
			title: '<?php echo $title;?>'
          }
		  <?php $begin=0;}}}?>
        ];
		var icons = {
          clinic: {
            icon: iconBase + 'clinic_icon.png'
          }
        };

        for (var i = 0, feature; feature = features[i]; i++) {
          addMarker(feature);
        }

		 

		
      }
    </script>
    
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBD9b6rAoC3JPWIO9PwhKtq90snNSw38zI&callback=initMap"">
    </script>



<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 

<?php include('footer.php');?>
