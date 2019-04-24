<!DOCTYPE html>
<html Lang="en">

	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href ="homepage.css" />
		<title>Home-Banner</title>
		
	</head>
		
		
	<body>
		
		<div class="banner" id="banner">
			
			<div class="banner-button banner-button-prev" id="banner-button-prev"></div>
			
			<div class="banner-img" id="banner-img3">
			
			</div>
			
			<div class="banner-img" id="banner-img2">
			
			</div>
			
			<div class="banner-img" id="banner-img1">
			
			</div>
			
			<div class="banner-button banner-button-next" id="banner-button-next"></div>
			
		</div>
		
		
		
		
		<script>
			var bannerIndex = 1;
			var bannerTimer = 5000;
			
			window.onload = function() {
				bannerLoop();
			}
			
			var startBannerLoop = setInterval( function() {
				bannerLoop();
			}, bannerTimer);
			
			document.getElementById("banner").onmouseenter = function() {
				clearInterval(startBannerLoop);
			}
			
			document.getElementById("banner").onmouseleave = function() {
				startBannerLoop = setInterval( function() {
					bannerLoop();
				}, bannerTimer);
			}
			
			
			document.getElementById("banner-button-next").onclick = function () {
				bannerLoop();
			}
			
			document.getElementById("banner-button-prev").onclick = function () {
				if( bannerIndex == 1)
				{
					bannerIndex = 2;
				}
				else if( bannerIndex == 2)
				{
					bannerIndex = 3;
				}
				else if( bannerIndex == 3)
				{
					bannerIndex = 1;
				}
				bannerLoop();
			}
			
			function bannerLoop()
			{
				if( bannerIndex == 1 )
				{
					document.getElementById("banner-img2").style.opacity = "0";
					
					setTimeout( function(){
						document.getElementById("banner-img1").style.right = "0px";
						document.getElementById("banner-img1").style.zIndex = "1000";
					
						document.getElementById("banner-img2").style.right = "0px";
						document.getElementById("banner-img2").style.zIndex = "1500";
					
						document.getElementById("banner-img3").style.right = "0px";
						document.getElementById("banner-img3").style.zIndex = "500";
					}, 500);
					
					setTimeout( function() {
						document.getElementById("banner-img2").style.opacity = "1";
					}, 1000);
				
				bannerIndex = 2;	
				}
				
				else if( bannerIndex == 2 )
				{
					document.getElementById("banner-img3").style.opacity = "0";
					
					setTimeout( function(){
						document.getElementById("banner-img2").style.right = "0px";
						document.getElementById("banner-img2").style.zIndex = "1000";
					
						document.getElementById("banner-img3").style.right = "0px";
						document.getElementById("banner-img3").style.zIndex = "1500";
					
						document.getElementById("banner-img1").style.right = "0px";
						document.getElementById("banner-img1").style.zIndex = "500";
					}, 500);
					
					setTimeout( function() {
						document.getElementById("banner-img3").style.opacity = "1";
					}, 1000);
				
				bannerIndex = 3;	
				}
				
				else if( bannerIndex == 3 )
				{
					document.getElementById("banner-img1").style.opacity = "0";
					
					setTimeout( function(){
						document.getElementById("banner-img3").style.right = "0px";
						document.getElementById("banner-img3").style.zIndex = "1000";
					
						document.getElementById("banner-img1").style.right = "0px";
						document.getElementById("banner-img1").style.zIndex = "1500";
					
						document.getElementById("banner-img2").style.right = "0px";
						document.getElementById("banner-img2").style.zIndex = "500";
					}, 500);
					
					setTimeout( function() {
						document.getElementById("banner-img1").style.opacity = "1";
					}, 1000);
				
				bannerIndex = 1;	
				}
				
			}
		</script>
		
	</body>
</html>
