<?php include_once('Db.php');?>
		<div id="wrapper">		
			<nav id="topnav" class="clear">
				<ul>
					<li class="home">	<a href="home.php">Home</a></li>			
					<li class="about">	<a href="aboutmunch.php" >About</a></li>			
		   <?php 
		   $db = Db::getInstance();
if(isset($_SESSION['id']) && $db->isrestau($_SESSION['id']))
  {
    echo '<li class="profile"><a href="spots.php?id=' . $_SESSION['id'] .'">Profile</a></li>';	
		   }?>
		   
					<li class="leave">	<a href="index.php?logout=true">Leave</a></li>						 
				</ul>
			</nav>
			<div class="clear"></div>
			<div id="slider">			
			  <img id="a" class="current" value="1" src="images/slider/slider1.png"/>						<img id="a" value="2" class="next" src="images/slider/slider2.png"/>								<img id="a" value="3" src="images/slider/slider3.png"/>
			  <img id="a" value="4" src="images/slider/slider4.png"/>
			  <nav id="slidernav">
					<ul>
						<li class="current" value="1">1</li>
						<li value="2">2</li>
						<li value="3">3</li>
						<li value="4">4</li>
					</ul>				
				</nav>
			</div>
  <?php if (isset($_SESSION['id']) && $db->isAdmin($_SESSION['id'])) {
					?>
					  <p class="backlink"><a href="admin.php">Admin</a></p>
  <?php } ?>
			<div id="specials">
				<div id="lcol" class="homecol">
					<a href="specials.php"><img src="images/home/specials.png" alt="Specials"/></a><br/>
					<a href="spots.php"><img src="images/home/spots.png" alt="Spots"/></a><br/>
					<a href="advertise.php"><img src="images/home/advertise.png" alt="Advertise"/></a>
				</div>
				<div id="rcol" class="homecol">
					<a href="bargains.php"><img src="images/home/bargains.png" alt="Bargains"/></a><br/>
					<a href="week.php"><img src="images/home/week.png" alt="Week"/></a><br/>
					<a href="contact.php"><img src="images/home/contact.png" alt="Contact"/></a>
				</div>			
  <div id="adcol" class="homecol">
				<div class="pub">
					pub	
					pub
					pub
					pub
					pub
					pub
					pub
					pub
					pub
				</div>
				<div class="pub"></div>
				<div class="pub"></div>
				<div class="pub"></div>
				<div class="pub"></div>
			</div>
		</div>
			</div>
			
	</div> <!-- /Wrapper -->
