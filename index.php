<?php

if(!$_GET['q']){
	$url="index2.php";
}else{
	$url=$_GET['q'].".php";
}
;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Infaq Listrik untuk Masjid dan Mushola</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--
Template 2051 Spot Light
http://www.tooplate.com/view/2051-spot-light
-->
	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="custom/css/style.css">
	<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="css/galleriffic-2.css" type="text/css" />

	<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="js/jquery.galleriffic.js"></script>
    
    <script type="text/javascript" src="js/jquery.opacityrollover.js"></script>
    <!-- We only want the thunbnails to display when javascript is disabled -->
    <script type="text/javascript">
    document.write('<style>.noscript { display: none; }</style>');
    </script>
    
</head>
<body id="home">
<div id="tooplate_wrapper">
    <div id="tooplate_header">
        <div id="tooplate_menu">
            <ul>
                <li><a <?php if($url=="index2.php"){echo "href='' class='current'";}else{echo "href='?q=index2'";};; ?>><span></span>Donasi</a></li>
                <li><a <?php if($url=="admin/table.php"){echo "href='' class='current'";}else{echo "href='?q=admin/table'";}; ?><span></span>About Us</a></li>
                <li><a href="gallery.html"><span></span>Gallery</a></li>
                <li><a href="blog.html"><span></span>Blog</a></li>
                <li><a href="contact.html"><span></span>Contact</a></li>
            </ul>    	
        </div> <!-- end of tooplate_menu -->  

    </div> <!-- end of header -->
	
	<div id="header" class="header">
		<center><h1 class="page-header">Infaq Listrik <small>Masjid dan Mushola</small> </h1> </center>
	</div>
	
    <div id="tooplate_main">
    	     
        <div id="tooplate_content">
       	  <div class="col_fw">
			  <?php include $url; ?>

			</div>
        </div> <!-- end of content -->

		<div id="tooplate_sidebar">
        	<div class="sidebar_box" id="aprove">
				<div class="sidebar_header">	
					<h2>Infaq yang diaprove</h2>
				</div>
                <div class="news_box">
                    <h3 class="aprovenohp">Donec eu orci dolor</h3>
                    <p class="aprovenama">Integer eros augue, auctor vel scelerisque at, pellentesque sit amet odio. </p>
                </div>
                
			</div>            
        </div> <!-- end of sidebar -->
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
    
</div> <!-- end of wrapper -->
<div id="tooplate_footer_wrapper">
    <div id="tooplate_footer">
        Copyright © 2017 <a href="#">Company Name</a>
        <!-- <div class="cleaner"></div> -->
    </div>
</div>    

		<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '960px', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 5,
					preloadAhead:              10,
					enableTopPager:            false,
					enableBottomPager:         false,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             false,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});
			});
		</script>
</body>
</html>