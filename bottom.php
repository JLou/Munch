  </div> <!-- Content -->
  <footer id="footer">
    <ul>
      <li><a href="#">Advertise</a></li>
      <li class="border"><a href="aboutmunch.php">About us</a></li>      
      <?php
      if(isset($_SESSION['id']))
	{
	  echo '<li class="border"><a href="home.php">Home</a></li>';      
	  if (isset($_SESSION['admin']))
	    {
	      echo '<li class="border"><a href="admin.php">Admin</a></li>';      
	    }
	}
      else
	{
	  echo '<li class="border"><a href="index.php">Register</a></li>';      
	}
  
      ?>     
      <li class="border"><a href="#">Contact us</a></li>
      <li class="border"><a href="#">Privacy Policy</a></li>
      <li class="border"><a href="#">Sitemap</a></li>
    </ul>
  </footer>
  </body>
</html>
