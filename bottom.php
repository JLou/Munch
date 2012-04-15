
	<footer>
		<p>
			Copyright &copy; Munch 2012
		</p>
		<p>
			<a href="#">Advertise</a> - 
			<a href="aboutmunch.php">About us</a> - 
					   <?php if(isset($_SESSION['id'])): ?>
					   <a href="home.php">Home</a> -
					   <?php if (isset($_SESSION['admin'])): ?>
					   <a href="admin.php">Admin</a> -
					   <?php endif; ?>
					   <?php else: ?>
					   <a href="index.php">Register</a> -
					   <?php endif; ?>
		       <a href="#">Contact</a> -
		       <a href="#">Privacy Policy</a> -
                       <a href="#">Sitemap</a>
		</p>
	</footer>
</body>
</html>
