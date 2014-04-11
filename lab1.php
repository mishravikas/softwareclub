<?php

// Error reporting:
error_reporting(E_ALL^E_NOTICE);

include "connect.php";
include "comment.class.php";


/*
/	Select all the comments and populate the $comments array with objects
*/

$comments = array();
$result = mysql_query("SELECT * FROM comments ORDER BY id ASC");

while($row = mysql_fetch_assoc($result))
{
	$comments[] = new Comment($row);
}

?>


<!DOCTYPE HTML>
<!--
	Verti 2.5 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>No Sidebar - Verti by HTML5 UP</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,800" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Oleo+Script:400" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="styles.css" />
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->
	</head>
	<body class="no-sidebar">

		<!-- Header Wrapper -->
<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">
						
							<!-- Header -->
								<header id="header">
								
									<!-- Logo -->
										<div id="logo">
											<h1><a href="#" id="logo">Software Club</a></h1>
											<span>BITS Pilani Goa Campus</span>
										</div>
									
									<!-- Nav -->
										<nav id="nav">
											<ul>
												<li class="current_page_item"><a href="index.html">Home</a></li>
												<li><a href="labs.html">Labs</a></li>
												
											</ul>
										</nav>
								
								</header>

						</div>
					</div>
				</div>
			</div>
		
		<!-- Main Wrapper -->
			<div id="main-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u skel-cell-important">

							<!-- Content -->
								<div id="content">
									<article class="last">

										<h2>No Sidebar</h2>

										<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus. 
										Praesent semper mod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat. 
										Aliquam luctus et mattis lectus sit amet pulvinar. Nam turpis nisi 
										consequat etiam lorem ipsum dolor sit amet nullam.</p>
										
										<h3>Comments</h3>
											<div id="main">

<?php

/*
/	Output the comments one by one:
*/

foreach($comments as $c){
	echo $c->markup();
}

?>

<div id="addCommentContainer">
	<p>Add a Comment</p>
	<form id="addCommentForm" method="post" action="">
    	<div>
        	<label for="name">Your Name</label>
        	<input type="text" name="name" id="name" />
            
            <label for="email">Your Email</label>
            <input type="text" name="email" id="email" />
            
            <label for="url">Website (not required)</label>
            <input type="text" name="url" id="url" />
            
            <label for="body">Comment Body</label>
            <textarea name="body" id="body" cols="20" rows="5"></textarea>
            
            <input type="submit" id="submit" value="Submit" />
        </div>
    </form>
</div>

</div>
									</article>
								</div>

						</div>
					</div>
				</div>
			</div>

		<!-- Footer Wrapper -->
			<div id="footer-wrapper">
				<footer id="footer" class="container">
					<div class="row">
						<div class="3u">
						
							<!-- Links -->
								<section class="widget-links">
									<h2>Random Stuff</h2>
									<ul class="style2">
										<li><a href="#">Etiam feugiat condimentum</a></li>
										<li><a href="#">Aliquam imperdiet suscipit odio</a></li>
										<li><a href="#">Sed porttitor cras in erat nec</a></li>
										<li><a href="#">Felis varius pellentesque potenti</a></li>
										<li><a href="#">Nullam scelerisque blandit leo</a></li>
									</ul>
								</section>
						
						</div>
						<div class="3u">
						
							<!-- Links -->
								<section class="widget-links">
									<h2>Random Stuff</h2>
									<ul class="style2">
										<li><a href="#">Etiam feugiat condimentum</a></li>
										<li><a href="#">Aliquam imperdiet suscipit odio</a></li>
										<li><a href="#">Sed porttitor cras in erat nec</a></li>
										<li><a href="#">Felis varius pellentesque potenti</a></li>
										<li><a href="#">Nullam scelerisque blandit leo</a></li>
									</ul>
								</section>
						
						</div>
						<div class="3u">
						
							<!-- Links -->
								<section class="widget-links">
									<h2>Random Stuff</h2>
									<ul class="style2">
										<li><a href="#">Etiam feugiat condimentum</a></li>
										<li><a href="#">Aliquam imperdiet suscipit odio</a></li>
										<li><a href="#">Sed porttitor cras in erat nec</a></li>
										<li><a href="#">Felis varius pellentesque potenti</a></li>
										<li><a href="#">Nullam scelerisque blandit leo</a></li>
									</ul>
								</section>
						
						</div>
						<div class="3u">
						
							<!-- Contact -->
								<section class="widget-contact last">
									<h2>Contact Us</h2>
									<ul>
										<li><a href="#" class="fa fa-twitter solo"><span>Twitter</span></a></li>
										<li><a href="#" class="fa fa-facebook solo"><span>Facebook</span></a></li>
										<li><a href="#" class="fa fa-dribbble solo"><span>Dribbble</span></a></li>
										<li><a href="#" class="fa fa-google-plus solo"><span>Google+</span></a></li>
									</ul>
									<p>1234 Fictional Road Suite #5432<br />
									Nashville, Tennessee 00000-0000<br />
									(800) 555-0000</p>
								</section>
						
						</div>
					</div>
					<div class="row">
						<div class="12u">
							<div id="copyright">
								&copy; Untitled. All rights reserved. | Images: <a href="http://fotogrph.com/">fotogrph</a> | Design: <a href="http://html5up.net/">HTML5 UP</a>
							</div>
						</div>
					</div>
				</footer>
			</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
	</body>
</html>