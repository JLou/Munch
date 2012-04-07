<?php session_start();
include('head.php'); 
if (!isset($_SESSION['id']))
{?>
<section id="registerform">
  <button type="button" id="buttonregister" class="title">register</button>
  <div class="formcontainer">
    <form method="post" name="register" id="register" action="signup.php">
      <table>
      <tr>
	  <td class="first"><label>Login:</label></td><td><input type="text" id="login" name="login" /><br /></td><td class="third" id="plogin"></td></tr>
      <tr>
	  <td class="first"><label>Name:</label></td><td><input type="text" id="name" name="name" /><br /></td><td class="third" id="pname"></td></tr>
	<tr><td class="first"><label>Surname:</label></td><td><input type="text" id="surname" name="surname" /></td><td class="third" id="psurname"></td></tr>
	<tr>
	  <td class="first"><label>Email:</label></td><td><input type="text" id="email" name="email" /></td><td class="third" id="pemail"></td>
	</tr>
	<tr>
	  <td class="first"><label>Password:</label></td><td><input type="password" id="password" name="password" /></td><td class="third" id="ppassword"></td>
	</tr>
	<tr>
	  <td class="first"><label>Repeat password:</label></td><td><input type="password" id="password2" name="password2" /></td><td class="third" id="ppassword2"></td>
	</tr> 
	<script src="js/jquery.js"></script>
	<script src="js/register.js"></script>  
	<tr><td><button type="submit">register</button></td></tr>
      </table>
    </form>
  </div>
  </section>
<?php
}
else
{
	header('Location: home.php');
}
?>

<?php include('bottom.php'); ?>
