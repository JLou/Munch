<section id="logincontainer">
  <button type="button" class="title" id="buttonloginform">login</button><br />
   <div class="formcontainer">
    <form method="post" name="loginform" id="loginform" action="home.php?log=true">
      <table>
	<tr>
	  <td><label>Email:</label></td><td><input type="email" id="emailogin" name="emailogin" /></td><td id="pemailogin"></td>
	</tr>
	<tr>
	  <td><label>Password:</label></td><td><input type="password" id="passwordlogin" name="passwordlogin" /></td>
	</tr>
	<tr><td><input type="submit"/></td></tr>
      </table>
    </form>
  </div>
</section>
<section id="registercontainer">
  <button type="button" id="buttonregister" class="title">register</button>
  <div class="formcontainer">
    <form method="post" name="register" id="registerform" action="signup.php">
      <table>
	<tr>
	  <td class="first"><label>name:</label></td>
	  <td><input type="text" id="name" name="name" /></td>
	  <td class="third" id="pname"></td>
	</tr>
	<tr>
	  <td class="first"><label>surname:</label></td>
	  <td><input type="text" id="surname" name="surname" /></td>
	  <td class="third" id="psurname"></td>
	</tr>
	<tr>
	  <td class="first"><label>day of birth:</label></td>
	  <td><input type="text" id="birth" name="birth" /></td>
	  <td class="third" id="pbirth"></td>
	</tr>
	<tr>
	  <td class="first"><label>gender:</label></td>
	  <td><label>M </label><input name="gender" type="radio" value="m" />
	    <label>F </label><input type="radio" name="gender" value="f" /></td>
	</tr>
	<tr>
	  <td class="first"><label>city:</label></td>
	  <td><input type="text" id="city" name="city" /></td>
	  <td class="third" id="pcity"></td>
	</tr>
	<tr>
	  <td class="first"><label>email:</label></td>
	  <td><input type="email" id="email" name="email" /></td>
	  <td class="third" id="pemail"></td>
	</tr>
	<tr>
	  <td class="first"><label>email re-type:</label></td>
	  <td><input type="email" id="email2" name="email2" /></td>
	  <td class="third" id="pemail2"></td>
	</tr>
	<tr>
	  <td class="first"><label>password:</label></td>
	  <td><input type="password" id="passwd" name="passwd" /></td>
	  <td class="third" id="ppasswd"></td>
	</tr>
	<tr>
	  <td class="first"><label>password re-type:</label></td>
	  <td><input type="password" id="passwd2" name="passwd2" /></td>
	  <td class="third" id="ppasswd2"></td>
	</tr>
	<tr>
	  <td class="first"></td>
	  <td>If you're a restaurant, fill in the following inputs:</td>
	</tr>
	<tr>
	  <td class="first"><label>tel:</label></td>
	  <td><input type="text" id="tel" name="tel" /></td>
	  <td class="third" id="ptel">ex: 0812345678</td>
	</tr>
	<tr>
	  <td class="first"><label>address:</label></td>
	  <td><input type="text" id="address" name="address" /></td>
	  <td class="third" id="paddress"></td>
	</tr>
	  
	   	    
	<script src="js/jquery.js"></script>
	<script src="js/register.js"></script>  
	<tr id="last"><td><button type="submit">register</button></td></tr>
	<div id="headform">
	<label>Restaurant: </label><input method="post" type="checkbox" id="restaurant" name="restaurant"/>
	<span class="pointer" id="bubble">What is it?</span>
	<p id="talkbubble">Create a restaurant account, add specials, and update your profile page.</p></div>

      </table>
    </form>
    
  </div>
  <script src="js/index.js"></script>
  <div class="clear"></div> 
</section>
