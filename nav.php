<?php if(isset($_SESSION['id'])): ?>
<nav id="topnav" class="clear">
   <ul>
   <li class="home">	<a href="home.php">Home</a></li>			
   <li class="about">	<a href="aboutmunch.php" >About</a></li>			
   <?php 
   $db = Db::getInstance();
if($db->isrestau($_SESSION['id']))
  {
    echo '<li class="profile"><a href="spots.php?id=' . $_SESSION['id'] .'">Profile</a></li>';	
  }
else
  echo '<li class="profile"><a href="profile.php?id=' . $_SESSION['id'] .'">Profile</a></li>';	
?>

<li class="leave">	<a href="index.php?logout=true">Leave</a></li>						 
  </ul>
  </nav>
  <?php endif; ?>