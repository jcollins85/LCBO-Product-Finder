<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>STLTO Finder</title> 
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	   
		<link rel="stylesheet" type="text/css" href="stylesheet.css">

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCJWrw6KDTIkPrFaJMtBYEeGpB8bogEUI&sensor=true&libraries=geometry"></script>
	    <script type="text/javascript" src="https://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"> </script>	    
	    <script type="text/javascript" src="js/function.js"></script>

		<?php 

		// Your Google Analytics Account Number
		$GAAccount = "UA-26457662-1";

		?>

		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo $GAAccount; ?>']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>	    

	</head>

	<? 
        $location = $_GET['location'];
        $expire=time()+60*60*24*30;
        setcookie("stltofinder", $location, $expire);	
    ?>		

	<body>
		<div id="fb-root"></div>

		<div id="container" class="">

			<div id="location-container">
				<form id="location-finder" action="<?=$_SERVER['PHP_SELF']; ?>" method="GET">
					<? if (!isset($_COOKIE['stltofinder'])) : ?>										
						<span>enter your postal code or city </span><input type="text" id="text-input" name="location" class="postal_code"><input type="image" class="enter-btn" src="images/enter_btn.png" name="submit" value="&nbsp;"></a> 						
					<? else: ?>
						<span>enter your postal code or city </span>
							<?
								if(isset($_GET['location']))
									{ ?>
										<input type="text" id="text-input" name="location" class="postal_code" value="<?= $_GET['location']; ?>"><input type="image" class="enter-btn" src="images/enter_btn.png" name="submit" value="&nbsp;"></a> 
								<? 	}
								 else 
								 	{ ?>
										<input type="text" id="text-input" name="location" class="postal_code" value="<?= $_COOKIE['stltofinder']; ?>"><input type="image" class="enter-btn" src="images/enter_btn.png" name="submit" value="&nbsp;"></a> 	
								<?  };
							?>					

					<? endif; ?>
				</form>
			</div>

			<div id="map-container">
				<div class="loading"><img src="images/loading.gif" /></div>				
			</div>

			<div id="list-container">
				<h3>Stores near you</h3>

				<div id="table-container">

					<table class="closest-stores">
						<tr>
							<th class="map-header">Map #</th>
							<th class="info-header">Store Information</th>
							<th class="availability-header">STLTO Availability</th>
							<th class="distance-header">Distance</th>
							<th class="request-header">Request STLTO</th>
						</tr>

						<tr class="store-data">
							<td class="map-num" id="map0">								
							</td>

							<td >
								
								<p id="store-address0"></p>
								<p id="store-city0"></p>
								<p id="store-postal0"></p>
								<p id="store-phone0"></p>
							</td>

							<td>
								<p id="store-red0"></p>
								<p id="store-white0"></p>
							</td>	

							<td><p id="store-distance0"></p></td>	

							<td><p id="store-request0"></p></td>					
						</tr>

						<tr class="store-data">
							<td class="map-num" id="map1">
								
							</td>

							<td class="store-info">
								
								<p id="store-address1"></p>
								<p id="store-city1"></p>
								<p id="store-postal1"></p>
								<p id="store-phone1"></p>
							</td>

							<td>
								<p id="store-red1"></p>
								<p id="store-white1"></p>
							</td>	

							<td><p id="store-distance1"></p></td>	

							<td><p id="store-request1"></p></td>					
						</tr>

						<tr class="store-data">
							<td class="map-num" id="map2">
								
							</td>

							<td class="store-info">
								
								<p id="store-address2"></p>
								<p id="store-city2"></p>
								<p id="store-postal2"></p>
								<p id="store-phone2"></p>
							</td>

							<td>
								<p id="store-red2"></p>
								<p id="store-white2"></p>
							</td>	

							<td><p id="store-distance2"></p></td>	

							<td><p id="store-request2"></p></td>					
						</tr>																		

						<tr class="grey-row">
							<td colspan="5"></td>
						</tr>
					</table>

				</div>
			</div>

			<a href="http://www.stltowine.com" target="_blank"><div id="site-link"></div></a>
			<div id="kpdi-link">This application is in no way sponsored, endorsed or administered by, or associated with, Facebook. By using this application, you hereby release and hold harmless Facebook from any and all liability associated with this application. This page powered by <a href="http://www.kpd-i.com" id="kpdi" target="_blank">KPDi.</a></div>

			<div class="share-container">
				<div id="share" style="margin:5px 0px 0px -2px; width: 80px; display: inline-block;">
					<a href=""><img id="share_btn" src="images/share_btn.png" alt="fb_share"></a>
				</div>

				<a href="javascript:popup_share('http://twitter.com/home?status=Find%20STLTO%20wine%20at%20your%20local%20LCBO.%20http://on.fb.me/R5pubd', '500', '300')">
					<img id="twitter_btn" src="images/twitter_btn.png" alt="twitter_share">
				</a>

			</div>
		</div>

		<div class="infobox-wrapper">
		    <div id="infobox">
		        
		    </div>
		</div>		

    <script type="text/javascript">

    	var allstores = [];
    	var redstores = [];
    	var whitestores = [];
    	var closeststores = [];
    	var closest_data = [];
    	var next_page = 1;
    	var red_next_page = 1;
    	var white_next_page = 1;

		$(document).ready(function() {

			getStores(next_page, function() { 

				whiteWine(white_next_page, function() { 

					redWine(red_next_page, finish);

				});

			});		 			

			$('#location-finder').submit(function() {
				if ( $('.postal_code').val() !== '')
					{
						
					}
				else ( $('.city').val() !== '')
					{
						
					}	
			});

		});

		function popup_share(url, width, height)
			{
				day = new Date();
				id = day.getTime();
				eval("page" + id + " = window.open(url, '" + id + "', 'toolbar=0,scrollbars=1,location=1,statusbar=0,menubar=0,resizable=0,width=" + width + ", height=" + height + ", left = 363, top = 144');");
			}


		function getStores(page, finished_callback) {
			$.ajax({
			    type:'GET',				
			    url:"https://lcbo.kpd-i.com/stores?per_page=100&page=" + page,
			    success:function(all_stores) {			    				    	
		            
			    all_stores = $.parseJSON(all_stores);
			    // Loop through the items
		            for(var i=0, l=all_stores.result.length; i < l; ++i)
		            {

 						var sunday_open = msmTo12time(all_stores.result[i].sunday_open);
 						var sunday_close = msmTo12time(all_stores.result[i].sunday_close);
 						var monday_open = msmTo12time(all_stores.result[i].monday_open);
 						var monday_close = msmTo12time(all_stores.result[i].monday_close);
 						var tuesday_open = msmTo12time(all_stores.result[i].tuesday_open);
 						var tuesday_close = msmTo12time(all_stores.result[i].tuesday_close);
 						var wednesday_open = msmTo12time(all_stores.result[i].wednesday_open);
 						var wednesday_close = msmTo12time(all_stores.result[i].wednesday_close);
 						var thursday_open = msmTo12time(all_stores.result[i].thursday_open);
 						var thursday_close = msmTo12time(all_stores.result[i].thursday_close);
 						var friday_open = msmTo12time(all_stores.result[i].friday_open);
 						var friday_close = msmTo12time(all_stores.result[i].friday_close);
 						var saturday_open = msmTo12time(all_stores.result[i].saturday_open);
 						var saturday_close = msmTo12time(all_stores.result[i].saturday_close);

		            	var store = {	
			            	 name : all_stores.result[i].name,
			            	 address_1 : all_stores.result[i].address_line_1,
			            	 address_2 : all_stores.result[i].address_line_2,
			            	 city : all_stores.result[i].city,
			            	 postal_code : all_stores.result[i].postal_code,
			            	 phone : all_stores.result[i].telephone,
			            	 lat : all_stores.result[i].latitude,
			            	 long : all_stores.result[i].longitude,
			            	 id : all_stores.result[i].store_no,
			            	 sun_open : sunday_open,
			            	 sun_close : sunday_close,
			            	 mon_open : monday_open,
			            	 mon_close : monday_close,
			            	 tues_open : tuesday_open,
			            	 tues_close : tuesday_close,
			            	 wed_open : wednesday_open,
			            	 wed_close : wednesday_close,
			            	 thurs_open : thursday_open,
			            	 thurs_close : thursday_close,
			            	 fri_open : friday_open,
			            	 fri_close : friday_close,	
			            	 sat_open : saturday_open,
			            	 sat_close : saturday_close
			            };

		            	allstores.push(store);		            	
		            }


					
		            if (all_stores.pager.next_page == null)
						{
							finished_callback();
						}
					else
						{
						   next_page = next_page + 1;

						   getStores(next_page, finished_callback);
						}
			    },
			    //dataType:'jsonp'
			});
		}

		function whiteWine(page, cb) {
			$.ajax({
			    type:'GET',
			    url:"https://lcbo.kpd-i.com/products/232322/stores?per_page=100&page=" + page,
			    //data:"callback=setJSON",
			    success:function(white) {			    	
				white = $.parseJSON(white);
		            // Loop through the items
		            for(var i=0, l=white.result.length; i < l; ++i)
		            {
		            	var whitestore = {
		            		quantity : white.result[i].quantity,
		            		id : white.result[i].id
		            	};
		            	
		            	whitestores.push(whitestore);
		            }

		            //$('#store-white').html(stores.join('<br />'));

		            if (white.pager.next_page == null)
						{
							cb();
						}
					else
						{
						   white_next_page = white_next_page + 1;

						   whiteWine(white_next_page, cb);
						}
			    },
			    //dataType:'jsonp'
			});

			
		}		

		function redWine(page, finished_callback) {
			$.ajax({
			    type:'GET',
			    url:"https://lcbo.kpd-i.com/products/232272/stores?per_page=100&page=" + page,
			    //data:"callback=setJSON",
			    success:function(red) {
		red = $.parseJSON(red);
		            // Loop through the items
		            for(var i=0, l=red.result.length; i < l; ++i)
		            {
		            	var redstore = {
		            		quantity : red.result[i].quantity,
		            		id : red.result[i].id
		            	};
		            	
		            	redstores.push(redstore);
		            }

		            //$('#store-red').html(stores.join('<br />'));

		            if (red.pager.next_page == null)
						{
							finished_callback();
						}
					else
						{
						   red_next_page = red_next_page + 1;

						   redWine(red_next_page, finished_callback);
						}		            
			    },
			    //dataType:'jsonp'
			});
		}

		function finish()
		{

			//redwine(function(red_next_page) { 

		 		//whitewine(function(white_next_page) { 
		
					plot_points();

		  		//});
		 	//});		 
		};			

		initialize = function(locationx, locationy)
		{
			var shadow = new google.maps.MarkerImage('images/shadow_marker.png',		        
		        new google.maps.Point(0,0),
		        new google.maps.Size(46, 50),
		        new google.maps.Point(50, 100)
    		);


			var green = 'images/green_marker.png';
			var amber = "images/default_marker.png";
			var red = 'images/default_marker.png';

		    var mapOptions = {
		        center: new google.maps.LatLng(locationx, locationy),
		        zoom: 13,
		        scrollwheel: false,
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    };		    

		    var map = new google.maps.Map(document.getElementById("map-container"), mapOptions);	

			$('#map0').click(function(){				
			    var b = new google.maps.LatLng($(this).attr('lat'), $(this).attr('long'));
			    map.setCenter(b);
			});			    				    

			$('#map1').click(function(){				
			    var b = new google.maps.LatLng($(this).attr('lat'), $(this).attr('long'));
			    map.setCenter(b);
			});	

			$('#map2').click(function(){				
			    var b = new google.maps.LatLng($(this).attr('lat'), $(this).attr('long'));
			    map.setCenter(b);
			});	

		    var infobox = new InfoBox({
		         content: document.getElementById("infobox"),
		         disableAutoPan: false,
		         maxWidth: 150,
		         pixelOffset: new google.maps.Size(-140, 0),
		         zIndex: null,
		         boxStyle: {
		            background: "url('images/store_bg.png') no-repeat",		            
		            width: "495px",
		            height: "310px"		            
		        },
		        closeBoxMargin: "-15px 0px 0px 0px",
		        closeBoxURL: "/images/close_btn.png",
		        infoBoxClearance: new google.maps.Size(25, 25, 25, 25)
		    });

		    var marker, i;

		    $.each(allstores, function(index, store){
		    	var stlto_red = -1;
		    	var stlto_white = -1;

				$.each(whitestores, function(i, whitestore) { 
					 if (store.id == whitestore.id ) {
					  	stlto_white = whitestore.quantity;					  	
					};

				});

				$.each(redstores, function(i, redstore) { 
					 if (store.id == redstore.id ) {
					  	stlto_red = redstore.quantity;					  	
					};

				});

				if(stlto_red == 0 && stlto_white == 0){
			    	marker = new google.maps.Marker({
				    position: new google.maps.LatLng(store.lat, store.long),
				    map: map,
				    title: store.name,
				    icon: red,
				    shadow: shadow 
					});


		   			var name = store.name.replace(/&/, "");
		   				name = name.replace(/\s+/g, " ");						

					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function(){
							infobox.setContent('<h3>LCBO Store #' + store.id + '</h3>'+
			    								'<div class="availability none">'+
										    		'<span>Sorry there is no STLTO Red or STLTO White at this location.</span>'+								    		
									    		'</div>'+
									    		'<div class="request-stlto">'+
									    			'<a href="request.php?address=' + store.address_1 + '&name=' + name + '&city=' + store.city + '&postal=' + store.postal_code + '&phone=' + store.phone + '"><img src="images/req_btn.png" /></a>' +
									    		'</div>' +
										    	'<div class="store-details">'+
										    		store.address_1 + '<br/>'+										    		
										    		store.city + ', ' + store.postal_code + '<br />'+
										    		'Telephone: ' + store.phone +
										    	'</div>'+
										    	'<div class="store-hours">'+
										    		'<h4>Hours of Operation</h4>'+
										    		'<span class="day">Sunday: </span><span class="hours">' + store.sun_open + ' - ' + store.sun_close + '</span><br/>'+
										    		'<span class="day">Monday: </span><span class="hours">' + store.mon_open + ' - ' + store.mon_close + '</span><br/>'+
										    		'<span class="day">Tuesday: </span><span class="hours">' + store.tues_open + ' - ' + store.tues_close + '</span><br/>'+
										    		'<span class="day">Wednesday: </span><span class="hours">' + store.wed_open + ' - ' + store.wed_close + '</span><br/>'+
										    		'<span class="day">Thursday: </span><span class="hours">' + store.thurs_open + ' - ' + store.thurs_close + '</span><br/>'+
										    		'<span class="day">Friday: </span><span class="hours">' + store.fri_open + ' - ' + store.fri_close + '</span><br/>'+
										    		'<span class="day">Saturday: </span><span class="hours">' + store.sat_open + ' - ' + store.sat_close + '</span>'+
										    	'</div>'
										    );
							infobox.open(map, marker);
							//infowindow.open(map,marker);
						}
					})(marker, i));
				}

				else if(stlto_red == -1 && stlto_white == -1){
			    	marker = new google.maps.Marker({
				    position: new google.maps.LatLng(store.lat, store.long),
				    map: map,
				    title: store.name,
				    icon: red 
					});

		   			var name = store.name.replace(/&/, "");
		   				name = name.replace(/\s+/g, " ");						

					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function(){
							infobox.setContent('<h3>LCBO Store #' + store.id + '</h3>'+
			    								'<div class="availability none">'+
										    		'<span>This location does not carry STLTO wine.</span>'+										    		
									    		'</div>'+
									    		'<div class="request-stlto">'+
									    			'<a href="request.php?address=' + store.address_1 + '&name=' + name + '&city=' + store.city + '&postal=' + store.postal_code + '&phone=' + store.phone + '"><img src="images/req_btn.png" /></a>' +
									    		'</div>' +									    		
										    	'<div class="store-details">'+
										    		store.address_1 + '<br/>'+										    		
										    		store.city + ', ' + store.postal_code + '<br />'+
										    		'Telephone: ' + store.phone +
										    	'</div>'+
										    	'<div class="store-hours">'+
										    		'<h4>Hours of Operation</h4>'+
										    		'<span class="day">Sunday: </span><span class="hours">' + store.sun_open + ' - ' + store.sun_close + '</span><br/>'+
										    		'<span class="day">Monday: </span><span class="hours">' + store.mon_open + ' - ' + store.mon_close + '</span><br/>'+
										    		'<span class="day">Tuesday: </span><span class="hours">' + store.tues_open + ' - ' + store.tues_close + '</span><br/>'+
										    		'<span class="day">Wednesday: </span><span class="hours">' + store.wed_open + ' - ' + store.wed_close + '</span><br/>'+
										    		'<span class="day">Thursday: </span><span class="hours">' + store.thurs_open + ' - ' + store.thurs_close + '</span><br/>'+
										    		'<span class="day">Friday: </span><span class="hours">' + store.fri_open + ' - ' + store.fri_close + '</span><br/>'+
										    		'<span class="day">Saturday: </span><span class="hours">' + store.sat_open + ' - ' + store.sat_close + '</span>'+
										    	'</div>'
										    );
							infobox.open(map, marker);
							//infowindow.open(map,marker);
						}
					})(marker, i));
				}

				else if (stlto_red == -1 && stlto_white == 0){
			    	marker = new google.maps.Marker({
				    position: new google.maps.LatLng(store.lat, store.long),
				    map: map,
				    title: store.name,
				    icon: red 
					});

		   			var name = store.name.replace(/&/, "");
		   				name = name.replace(/\s+/g, " ");					

					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function(){
							infobox.setContent('<h3>LCBO Store #' + store.id + '</h3>'+
			    								'<div class="availability none">'+	
			    									'<span>Sorry, there is no STLTO Red or STLTO White at this location.</span><br/>'+							    												    												    		
									    		'</div>'+
									    		'<div class="request-stlto">'+
									    			'<a href="request.php?address=' + store.address_1 + '&name=' + name + '&city=' + store.city + '&postal=' + store.postal_code + '&phone=' + store.phone + '"><img src="images/req_btn.png" /></a>' +
									    		'</div>' +										    		
										    	'<div class="store-details">'+
										    		store.address_1 + '<br/>'+										    		
										    		store.city + ', ' + store.postal_code + '<br />'+
										    		'Telephone: ' + store.phone +
										    	'</div>'+
										    	'<div class="store-hours">'+
										    		'<h4>Hours of Operation</h4>'+
										    		'<span class="day">Sunday: </span><span class="hours">' + store.sun_open + ' - ' + store.sun_close + '</span><br/>'+
										    		'<span class="day">Monday: </span><span class="hours">' + store.mon_open + ' - ' + store.mon_close + '</span><br/>'+
										    		'<span class="day">Tuesday: </span><span class="hours">' + store.tues_open + ' - ' + store.tues_close + '</span><br/>'+
										    		'<span class="day">Wednesday: </span><span class="hours">' + store.wed_open + ' - ' + store.wed_close + '</span><br/>'+
										    		'<span class="day">Thursday: </span><span class="hours">' + store.thurs_open + ' - ' + store.thurs_close + '</span><br/>'+
										    		'<span class="day">Friday: </span><span class="hours">' + store.fri_open + ' - ' + store.fri_close + '</span><br/>'+
										    		'<span class="day">Saturday: </span><span class="hours">' + store.sat_open + ' - ' + store.sat_close + '</span>'+
										    	'</div>'
										    );
							infobox.open(map, marker);
							//infowindow.open(map,marker);
						}
					})(marker, i));
				}

				else if (stlto_red == 0 && stlto_white == -1){
			    	marker = new google.maps.Marker({
				    position: new google.maps.LatLng(store.lat, store.long),
				    map: map,
				    title: store.name,
				    icon: red
					});

		   			var name = store.name.replace(/&/, "");
		   				name = name.replace(/\s+/g, " ");					

					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function(){
							infobox.setContent('<h3>LCBO Store #' + store.id + '</h3>'+
			    								'<div class="availability none">'+	
			    									'<span>Sorry, there is no STLTO Red or STLTO White at this location.</span><br/>'+							    												    		
									    		'</div>'+
									    		'<div class="request-stlto">'+
									    			'<a href="request.php?address=' + store.address_1 + '&name=' + name + '&city=' + store.city + '&postal=' + store.postal_code + '&phone=' + store.phone + '"><img src="images/req_btn.png" /></a>' +
									    		'</div>' +										    		
										    	'<div class="store-details">'+
										    		store.address_1 + '<br/>'+										    		
										    		store.city + ', ' + store.postal_code + '<br />'+
										    		'Telephone: ' + store.phone +
										    	'</div>'+
										    	'<div class="store-hours">'+
										    		'<h4>Hours of Operation</h4>'+
										    		'<span class="day">Sunday: </span><span class="hours">' + store.sun_open + ' - ' + store.sun_close + '</span><br/>'+
										    		'<span class="day">Monday: </span><span class="hours">' + store.mon_open + ' - ' + store.mon_close + '</span><br/>'+
										    		'<span class="day">Tuesday: </span><span class="hours">' + store.tues_open + ' - ' + store.tues_close + '</span><br/>'+
										    		'<span class="day">Wednesday: </span><span class="hours">' + store.wed_open + ' - ' + store.wed_close + '</span><br/>'+
										    		'<span class="day">Thursday: </span><span class="hours">' + store.thurs_open + ' - ' + store.thurs_close + '</span><br/>'+
										    		'<span class="day">Friday: </span><span class="hours">' + store.fri_open + ' - ' + store.fri_close + '</span><br/>'+
										    		'<span class="day">Saturday: </span><span class="hours">' + store.sat_open + ' - ' + store.sat_close + '</span>'+
										    	'</div>'
										    );
							infobox.open(map, marker);
							//infowindow.open(map,marker);
						}
					})(marker, i));
				}								

				else if (stlto_white == 0 || stlto_white == -1){
			    	marker = new google.maps.Marker({
				    position: new google.maps.LatLng(store.lat, store.long),
				    map: map,
				    title: store.name,
				    icon: green
					});

		   			var name = store.name.replace(/&/, "");
		   				name = name.replace(/\s+/g, " ");					

					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function(){
							infobox.setContent('<h3>LCBO Store #' + store.id + '</h3>'+
			    								'<div class="availability">'+	
			    									'<span class="bottles">No bottles</span> of STLTO White<br/>'+								    		
										    		'<span class="bottles">' + stlto_red + ' Bottles</span> of STLTO Red'+									    		
									    		'</div>'+
									    		'<div class="request-stlto">'+
									    			'<a href="request.php?address=' + store.address_1 + '&name=' + name + '&city=' + store.city + '&postal=' + store.postal_code + '&phone=' + store.phone + '"><img src="images/req_btn.png" /></a>' +
									    		'</div>' +										    		
										    	'<div class="store-details">'+
										    		store.address_1 + '<br/>'+
										    		store.name + '<br />'+
										    		store.city + ', ' + store.postal_code + '<br />'+
										    		'Telephone: ' + store.phone +
										    	'</div>'+
										    	'<div class="store-hours">'+
										    		'<h4>Hours of Operation</h4>'+
										    		'<span class="day">Sunday: </span><span class="hours">' + store.sun_open + ' - ' + store.sun_close + '</span><br/>'+
										    		'<span class="day">Monday: </span><span class="hours">' + store.mon_open + ' - ' + store.mon_close + '</span><br/>'+
										    		'<span class="day">Tuesday: </span><span class="hours">' + store.tues_open + ' - ' + store.tues_close + '</span><br/>'+
										    		'<span class="day">Wednesday: </span><span class="hours">' + store.wed_open + ' - ' + store.wed_close + '</span><br/>'+
										    		'<span class="day">Thursday: </span><span class="hours">' + store.thurs_open + ' - ' + store.thurs_close + '</span><br/>'+
										    		'<span class="day">Friday: </span><span class="hours">' + store.fri_open + ' - ' + store.fri_close + '</span><br/>'+
										    		'<span class="day">Saturday: </span><span class="hours">' + store.sat_open + ' - ' + store.sat_close + '</span>'+
										    	'</div>'
										    );
							infobox.open(map, marker);
							//infowindow.open(map,marker);
						}
					})(marker, i));
				}				

				else if (stlto_red == 0 || stlto_red == -1){
			    	marker = new google.maps.Marker({
				    position: new google.maps.LatLng(store.lat, store.long),
				    map: map,
				    title: store.name,
				    icon: green 
					});

		   			var name = store.name.replace(/&/, "");
		   				name = name.replace(/\s+/g, " ");					

					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function(){
							infobox.setContent('<h3>LCBO Store #' + store.id + '</h3>'+
			    								'<div class="availability">'+	
			    									'<span class="bottles">No bottles</span> of STLTO Red<br/>'+								    		
										    		'<span class="bottles">' + stlto_white + ' Bottles</span> of STLTO White'+								    		
									    		'</div>'+
									    		'<div class="request-stlto">'+
									    			'<a href="request.php?address=' + store.address_1 + '&name=' + name + '&city=' + store.city + '&postal=' + store.postal_code + '&phone=' + store.phone + '"><img src="images/req_btn.png" /></a>' +
									    		'</div>' +										    		
										    	'<div class="store-details">'+
										    		store.address_1 + '<br/>'+
										    		store.name + '<br />'+
										    		store.city + ', ' + store.postal_code + '<br />'+
										    		'Telephone: ' + store.phone +
										    	'</div>'+
										    	'<div class="store-hours">'+
										    		'<h4>Hours of Operation</h4>'+
										    		'<span class="day">Sunday: </span><span class="hours">' + store.sun_open + ' - ' + store.sun_close + '</span><br/>'+
										    		'<span class="day">Monday: </span><span class="hours">' + store.mon_open + ' - ' + store.mon_close + '</span><br/>'+
										    		'<span class="day">Tuesday: </span><span class="hours">' + store.tues_open + ' - ' + store.tues_close + '</span><br/>'+
										    		'<span class="day">Wednesday: </span><span class="hours">' + store.wed_open + ' - ' + store.wed_close + '</span><br/>'+
										    		'<span class="day">Thursday: </span><span class="hours">' + store.thurs_open + ' - ' + store.thurs_close + '</span><br/>'+
										    		'<span class="day">Friday: </span><span class="hours">' + store.fri_open + ' - ' + store.fri_close + '</span><br/>'+
										    		'<span class="day">Saturday: </span><span class="hours">' + store.sat_open + ' - ' + store.sat_close + '</span>'+
										    	'</div>'
										    );
							infobox.open(map, marker);
							//infowindow.open(map,marker);
						}
					})(marker, i));
				}

				else if (stlto_red < 20 || stlto_white < 20 && stlto_red > 0 || stlto_white > 0){
			    	marker = new google.maps.Marker({
				    position: new google.maps.LatLng(store.lat, store.long),
				    map: map,
				    title: store.name,
				    icon: green 
					});

					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function(){
							infobox.setContent('<h3>LCBO Store #' + store.id + '</h3>'+
			    								'<div class="availability">'+										    		
										    		'<span class="bottles">'+ stlto_red + ' Bottles</span> of STLTO Red<br/>'+
										    		'<span class="bottles">' + stlto_white + ' Bottles</span> of STLTO White'+								    		
									    		'</div>'+
												'<div class="call-ahead">' +
													'<span>Call to reserve your bottle: </span><span class="bottles">' + store.phone + '</span>'+
												'</div>' +									    		
										    	'<div class="store-details">'+
										    		store.address_1 + '<br/>'+
										    		store.name + '<br />'+
										    		store.city + ', ' + store.postal_code + '<br />'+
										    		'Telephone: ' + store.phone +
										    	'</div>'+
										    	'<div class="store-hours">'+
										    		'<h4>Hours of Operation</h4>'+
										    		'<span class="day">Sunday: </span><span class="hours">' + store.sun_open + ' - ' + store.sun_close + '</span><br/>'+
										    		'<span class="day">Monday: </span><span class="hours">' + store.mon_open + ' - ' + store.mon_close + '</span><br/>'+
										    		'<span class="day">Tuesday: </span><span class="hours">' + store.tues_open + ' - ' + store.tues_close + '</span><br/>'+
										    		'<span class="day">Wednesday: </span><span class="hours">' + store.wed_open + ' - ' + store.wed_close + '</span><br/>'+
										    		'<span class="day">Thursday: </span><span class="hours">' + store.thurs_open + ' - ' + store.thurs_close + '</span><br/>'+
										    		'<span class="day">Friday: </span><span class="hours">' + store.fri_open + ' - ' + store.fri_close + '</span><br/>'+
										    		'<span class="day">Saturday: </span><span class="hours">' + store.sat_open + ' - ' + store.sat_close + '</span>'+
										    	'</div>'
										    );
							infobox.open(map, marker);
							//infowindow.open(map,marker);
						}
					})(marker, i));
				}
				
				else {
			    	marker = new google.maps.Marker({
				    position: new google.maps.LatLng(store.lat, store.long),
				    map: map,
				    title: store.name,
				    icon: green 
					});

					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function(){
							infobox.setContent('<h3>LCBO Store #' + store.id + '</h3>'+
			    								'<div class="availability">'+
										    		'<span class="bottles">'+ stlto_red + ' Bottles</span> of STLTO Red<br/>'+
										    		'<span class="bottles">' + stlto_white + ' Bottles</span> of STLTO White'+
									    		'</div>'+
										    	'<div class="store-details">'+
										    		store.address_1 + '<br/>'+
										    		store.name + '<br />'+
										    		store.city + ', ' + store.postal_code + '<br />'+
										    		'Telephone: ' + store.phone +
										    	'</div>'+
										    	'<div class="store-hours">'+
										    		'<h4>Hours of Operation</h4>'+
										    		'<span class="day">Sunday: </span><span class="hours">' + store.sun_open + ' - ' + store.sun_close + '</span><br/>'+
										    		'<span class="day">Monday: </span><span class="hours">' + store.mon_open + ' - ' + store.mon_close + '</span><br/>'+
										    		'<span class="day">Tuesday: </span><span class="hours">' + store.tues_open + ' - ' + store.tues_close + '</span><br/>'+
										    		'<span class="day">Wednesday: </span><span class="hours">' + store.wed_open + ' - ' + store.wed_close + '</span><br/>'+
										    		'<span class="day">Thursday: </span><span class="hours">' + store.thurs_open + ' - ' + store.thurs_close + '</span><br/>'+
										    		'<span class="day">Friday: </span><span class="hours">' + store.fri_open + ' - ' + store.fri_close + '</span><br/>'+
										    		'<span class="day">Saturday: </span><span class="hours">' + store.sat_open + ' - ' + store.sat_close + '</span>'+
										    	'</div>'
										    );
							infobox.open(map, marker);
							//infowindow.open(map,marker);
						}
					})(marker, i));
				};

		    });

			closest_stores(locationx, locationy);

		}

		function plot_points(){
			    <? if (isset($_GET['location'])) { ?>

			        var geocoder = new google.maps.Geocoder();
			        var result = "";
			        geocoder.geocode( { 'address': '<?= $_REQUEST['location'] ?>', 'region': 'CA' }, function(results, status) {
			            if (status == google.maps.GeocoderStatus.OK) 
			            {
			                initialize(results[0].geometry.location.Ya, results[0].geometry.location.Za);
			            } 
			            else 
			            {
			                alert("Unable to find address: " + status);
			            }
			        });

			    <? } else { ?>
			        	
			        	initialize(43.750389, -79.249449);

			        <? }; ?>    	

		};	

		function closest_stores(locx, locy) {
			var closest_data = [];

		    for(var i=0, l=allstores.length; i < l; ++i)		    	
		       	{
		       		var d = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(locx, locy), new google.maps.LatLng(allstores[i].lat, allstores[i].long));

	            	var storedistance = {
		            		distance : d,
		            		id : allstores[i].id,
		   					name : allstores[i].name,
			            	address_1 : allstores[i].address_1,
			            	address_2 : allstores[i].address_2,
			            	city :allstores[i].city,
			            	postal_code : allstores[i].postal_code,
			            	phone : allstores[i].phone,
			            	lat : allstores[i].lat,	            		
			            	long : allstores[i].long
		            	};
		            	
		            	closeststores.push(storedistance);
		        };

		    var orderedDistances = sortDistances(closeststores);

		   	for(var i=0, l=3; i < l; ++i)
		   		{
		   			var reds = 0;
		   			var whites = 0;

		   			document.getElementById('map' + i).setAttribute("lat", orderedDistances[i].lat);
		   			document.getElementById('map' + i).setAttribute("long",orderedDistances[i].long);
					$('#store-address' + [i]).html(orderedDistances[i].address_1);	
		   			$('#store-name' + [i]).html(orderedDistances[i].name);		   			
		   			$('#store-city' + [i]).html(orderedDistances[i].city + ", " + orderedDistances[i].postal_code);		   			
		   			$('#store-phone' + [i]).html(orderedDistances[i].phone);
		   			$('#store-distance' + [i]).html((Math.ceil(orderedDistances[i].distance / 1000) + 'km'));
		   			$('#map' + [i]).html('<img class="marker" src="images/marker_' + [i] + '.png" />')

		   			for(var x=0, y=whitestores.length; x < y; ++x) {
		   					if(whitestores[x].id == orderedDistances[i].id)
		   					{
		   						$('#store-white' + [i]).html(whitestores[x].quantity + ' of STLTO White');
		   						whites = whitestores[x].quantity;		   						
		   					}
		   			};

		   			for(var z=0, q=redstores.length; z < q; ++z) {
		   					if(redstores[z].id == orderedDistances[i].id)
		   					{
		   						$('#store-red' + [i]).html(redstores[z].quantity + ' of STLTO Red');		   						
		   						reds = redstores[z].quantity;
		   					}
		   			};

		   			if(reds > 0 || whites > 0){
		   				$('#store-request' + [i]).html('<img src="images/request_grey_btn.png" />');
		   			}
		   			else {
		   				var name = orderedDistances[i].name.replace(/&/, "");
		   				name = name.replace(/\s+/g, " ");
		   				$('#store-request' + [i]).html('<a href="request.php?address=' + orderedDistances[i].address_1 + '&name=' + name + '&city=' + orderedDistances[i].city + '&postal=' + orderedDistances[i].postal_code + '&phone=' + orderedDistances[i].phone + '"><img src="images/request_btn.png" /></a>');		   				
		   			};		   			

		   		};	   	
		}

		function sortDistances(object) {

			for (i in object) {

				for (k in object) {

					if (object[i].distance < object[k].distance) {

						var temp = object[i].distance;
						var temp2 = object[i].id;
						var temp3 =	object[i].name;
					    var temp4 =	object[i].address_1;
					    var temp5 =	object[i].address_2;
					    var temp6 = object[i].city;
					    var temp7 = object[i].postal_code;
					    var temp8 = object[i].phone;
					    var temp9 = object[i].lat;
					    var temp10 = object[i].long;

						object[i].distance = object[k].distance;
						object[i].id = object[k].id;
						object[i].name = object[k].name;
						object[i].address_1 = object[k].address_1;
						object[i].address_2 = object[k].address_2;
						object[i].city = object[k].city;
						object[i].postal_code = object[k].postal_code;
						object[i].phone = object[k].phone;
						object[i].lat = object[k].lat;
						object[i].long = object[k].long;

						object[k].distance = temp;
						object[k].id = temp2;
						object[k].name = temp3;
						object[k].address_1 = temp4;
						object[k].address_2 = temp5;
						object[k].city = temp6;
						object[k].postal_code = temp7;
						object[k].phone = temp8;
						object[k].lat = temp9;
						object[k].long = temp10;
					}

				}				
			}

			return object;
		}

		function msmTo24time(msm) {
		  var hour = msm / 60;
		  var mins = msm % 60;
		  return [hour, mins];
		}		

		function msmTo12time(msm) {
		  var mins;
		  var time = msmTo24time(msm),
		      h24  = time[0],
		      h12  = (0 == h24 ? 12 : (h24 > 12 ? (h24 - 10) - 2 : h24)),
		      ampm = (h24 >= 12 ? 'pm' : 'am');

		      if (time[1] == 0){
		      		mins = "00";		      	
		      }
		      else{
		      		mins = time[1];
		      };

		  return h12 + ':' + mins + ampm;
		}	

	</script>

	</body>

    <script>
        // <![CDATA[

        (function() {
           var e = document.createElement('script');
           e.src = 'https://connect.facebook.net/en_US/all.js';
           e.async = true;
           document.getElementById('fb-root').appendChild(e);
        }());

		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=428783303826348";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

    </script>

	
</html>
