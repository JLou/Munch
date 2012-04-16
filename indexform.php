<div id="wrapper">
<div id="homeforms">
  <section id="logincontainer">
    <h2>Login</h2>
    <form method="post" name="loginform" id="loginform" action="home.php?log=true">
      <fieldset>
	<div class="tablecontainer">
	<table>
	  <tr>
	    <td><label>Email:</label></td><td><input type="email" id="emailogin" name="emailogin" /></td><td id="pemailogin"></td>
	  </tr>
	  <tr>
	    <td><label>Password:</label></td><td><input type="password" id="passwordlogin" name="passwordlogin" /></td>
	  </tr>
	  <tr><td><input type="submit" class="button" class="pointer" value="Log in"/></td></tr>
	</table>      
	</div>
      </fieldset>
    </form>
  </section>
  <section id="registercontainer">
    <h2>Register</h2>
    <form method="post" name="register" id="userform" action="signup.php">
      <fieldset>
	<div class="tablecontainer">
	<table>
	  <tr>
	    <td class="first"><label for="name">name:</label></td>
	    <td><input type="text" id="name" name="name" /></td>
	    <td class="third" id="pname"></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="surname">surname:</label></td>
	    <td><input type="text" id="surname" name="surname" /></td>
	    <td class="third" id="psurname"></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="birth">day of birth:</label></td>
	    <td><input type="text" id="birth" name="birth" /></td>
	    <td class="third" id="pbirth"></td>
	  </tr>
	  <tr>
	    <td class="first"><label>gender:</label></td>
	    <td><label>M </label><input name="gender" type="radio" value="m" />
	      <label>F </label><input type="radio" name="gender" value="f" /></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="city">city:</label></td>
	    <td><input type="text" id="city" name="city" /></td>
	    <td class="third" id="pcity"></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="email">email:</label></td>
	    <td><input type="email" id="email" name="email" /></td>
	    <td class="third" id="pemail"></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="email2">email re-type:</label></td>
	    <td><input type="email" id="email2" name="email2" /></td>
	    <td class="third" id="pemail2"></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="passwd">password:</label></td>
	  <td><input type="password" id="passwd" name="passwd" /></td>
	  <td class="third" id="ppasswd"></td>
	</tr>
	<tr>
	  <td class="first"><label for="passwd2">password re-type:</label></td>
	  <td><input type="password" id="passwd2" name="passwd2" /></td>
	  <td class="third" id="ppasswd2"></td>
	</tr>
	  <tr id="last"><td><input type="submit" class="button" class="pointer" value="register"/></td></tr>
	</table>
	</div>
      </fieldset>
    </form>
    
    
  <div class="clear"></div> 
  </section>
  <form method="post" name="register" id="restaurantform" action="signup.php?restau=true">
      <fieldset>
	<div class="tablecontainer">
	<table>
	  <tr>
	    <td class="first"><label for="name">company:</label></td>
	    <td><input type="text" id="name" name="name" /></td>
	    <td class="third" id="pname"></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="city">city:</label></td>
	    <td><input type="text" id="city" name="city" /></td>
	    <td class="third" id="pcity"></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="email">email:</label></td>
	    <td><input type="email" id="email" name="email" /></td>
	    <td class="third" id="pemail"></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="email2">email re-type:</label></td>
	    <td><input type="email" id="email2" name="email2" /></td>
	    <td class="third" id="pemail2"></td>
	  </tr>
	  <tr>
	    <td class="first"><label for="passwd">password:</label></td>
	  <td><input type="password" id="passwd" name="passwd" /></td>
	  <td class="third" id="ppasswd"></td>
	</tr>
	<tr>
	  <td class="first"><label for="passwd2">password re-type:</label></td>
	  <td><input type="password" id="passwd2" name="passwd2" /></td>
	  <td class="third" id="ppasswd2"></td>
	</tr>
	  <tr>
	  <td class="first"><label for="tel">tel:</label></td>
	  <td><input type="text" id="tel" name="tel" /></td>
	  <td class="third" id="ptel">ex: 0812345678</td>
	</tr>
	<tr>
	  <td class="first"><label for="address">address:</label></td>
	  <td><input type="text" id="address" name="address" /></td>
	  <td class="third" id="paddress"></td>
	</tr>
	  
	   	    
	
	  <tr id="last"><td><input type="submit" class="button" class="pointer" value="register"/></td></tr>
	
	</table>
	</div>
      </fieldset>
    </form>
  <div class="clear"></div>
</div>
</div>
<script src="js/jquery.js"></script>
    <script src="js/register.js"></script>  

    <script src="js/index.js"></script>
	
