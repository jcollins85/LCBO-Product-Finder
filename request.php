<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>STLTO Finder</title> 
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	   
		<link rel="stylesheet" type="text/css" href="stylesheet.css">

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCCJWrw6KDTIkPrFaJMtBYEeGpB8bogEUI&sensor=true&libraries=geometry"></script>
	    <script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"> </script>	    
	    <script type="text/javascript" src="js/function.js"></script>
	</head>	

	<body>

		<?
			$raw_name = $_GET['name'];
			$address = $_GET['address'];
			$name = str_replace(" ", " & ", $raw_name);
			$city = $_GET['city'];
			$postal = $_GET['postal'];
			$phone = $_GET['phone'];
		?>

		<div id="fb-root"></div>

		<div id="container" class="">

			<div id="request-container">
				<h2 class="request-h2">Request some STLTO at your LCBO</h2>

				<form id="request-form" action="?m=unibond&c=FrontEnd&a=contact_us" method="post">

					<div class="input">
						<span class="form-label">First Name<span class="required">* </span>:</span> 
						<input class="single-input" type="text" id="fname"> 
						<span class="error" id="name-error1"></span><br/>
					</div>

					<div class="input">
						<span class="form-label">Last Name<span class="required">* </span>:</span> 
						<input class="single-input" type="text" id="lname"> 
						<span class="error" id="name-error2"></span><br/>
					</div>

					<div class="input">
						<span class="form-label">Email Address<span class="required">* </span>:</span> 
						<input class="single-input" type="text" id="email"> 
						<span class="error" id="email-error"></span><br/>
					</div>

					<div class="input">
						<span class="form-label">Comments:</span> <textarea id="comments"></textarea>
					</div>

					<div class="input">
						<span class="form-label">Desired Product<span class="required">* </span>:</span> 

						<div class="stlto-red-option">
							<input id="red-box" type="checkbox" value="1">
						</div>

						<div class="stlto-white-option">
							<input id="white-box" type="checkbox" value="1"> 
						</div>

						<span class="error" id="wine-error"></span>

					</div>

					<div class="input">
						<span class="form-label">LCBO Location:</span> 	

						<div class="requested-location">							
							<p id="address"></p>
							<p id="name"></p>
							<p id="city"></p>
							<p id="phone"></p>
						</div>

					<!--
						<div class="select-store">
							<a href=""><img src="images/selectstore_btn.png"></a>
						</div>
					-->

					</div>

					<div class="input">
						<div class="subscribe">
							<input type="submit" class="submit-button" id="subscribe" value="&nbsp;" />
						</div>

						<div class="back">
							<a href="index.php"><img src="images/back_btn.png" /></a>
						</div>
					</div>
				</form>	

				<div class="post-submit" style="display:none">

					<h2>Thanks for your request!</h2>

					<div class="thank-you">
						<p class="thank-you-message">Share your love of STLTO with your friends.</p>

						<div id="share" style="margin:5px 0px 0px -2px; width: 80px; display: inline-block;">
							<a href=""><img id="share_btn" src="images/share_btn.png" alt="fb_share"></a>
						</div>

						<div class="back post-success">
							<a href="index.php"><img src="images/back_btn.png" /></a>
						</div>
					</div>
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

		<script>

		$(document).ready(function() {

			var red = 0;
			var white = 0;

			$('#request-form').submit(function() {
				var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

				$('.error').html("");

				if ( document.getElementById('red-box').checked){
					red = 1;					
				};

				if ( document.getElementById('white-box').checked){
					white = 1;
				};

				if ($('#fname').val() == '')
				{
					$('#name-error1').html("Please enter your first name.");					
					return false;
				}		
				else if ($('#lname').val() == '')
				{
					$('#name-error2').html("Please enter your last name.");					
					return false;
				}
				else if ( $('#email').val() == '')
				{
					$('#email-error').html("Please enter an email address.");
					return false;
				}	
				else if (!pattern.test($('#email').val()) )
				{
					$('#email-error').html("Please enter a valid email address.");
					return false;
				}
						
				else if (red !== 1 && white !== 1 )
				{
					$('#wine-error').html("Please select a wine.");					
					return false;
				}				
				else{
					$.ajax({
						url: 'submit.php',
						data: 'ajax=true&email=' + escape($('#email').val()) + '&fname=' + $('#fname').val() + '&lname=' + $('#lname').val() + '&comments=' + $('#comments').val() + '&location=' + '<?= $raw_name ?>' + ',' + '<?= $address ?>' + '&red=' + red + '&white=' + white, 
						success: function(msg) {
							if(msg == 'true')
							{
								
							}
							else{
								//$('#response').html(msg);
							}
						}
					});					

				$('#request-form').hide();
				$('.request-h2').hide();
				$('.post-submit').show();
				//$('#fineprint').css('margin-top','4px');
				return false;
				}
			//});
			});

				$('#address').html('<?= $address ?>');	
		   		$('#name').html('<?= $name ?>');		   			
		   		$('#city').html('<?= $city ?>' + ", " + '<?= $postal ?>');		   			
		   		$('#phone').html('<?= $phone ?>');
		});

			function popup_share(url, width, height)
				{
					day = new Date();
					id = day.getTime();
					eval("page" + id + " = window.open(url, '" + id + "', 'toolbar=0,scrollbars=1,location=1,statusbar=0,menubar=0,resizable=0,width=" + width + ", height=" + height + ", left = 363, top = 144');");
				}

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

	</body>
	
</html>				