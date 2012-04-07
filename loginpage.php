<?php include('head.php'); ?>
<section id="loginform">
<form method="post" name="register" id="register" action="home.php?log=true">
  <table>
    <tr>
      <td><label>Login:</label></td><td><input type="text" id="login" name="login" /></td><td id="plogin"></td>
    </tr>
    <tr>
      <td><label>Password:</label></td><td><input type="password" id="password" name="password" /></td><td id="ppassword"></td>
    </tr>
    <tr><td><input type="submit" /></td></tr>
  </table>
</form>
</section>
<?php include('bottom.php'); ?>
