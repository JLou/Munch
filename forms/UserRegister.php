    <form method="post" name="register" id="userform" action="signup.php">
      <fieldset>
      	<legend>User Registration</legend>
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
	    <td><input type="text" id="birth" name="birth" />DD/MM/YYYY</td>
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
	<tr>
	  <td class="first"><label for="tos">terms & conditions:</label></td>
	  <td><?php include("tos.php");?></td>
	  <td class="third" id="tos"></td>
	</tr>
	<tr>
          <td class="first"><label for="toscheck">I understand and agree to the terms & conditions</label></td>
	  <td><input type="checkbox" id="toscheck" name="toscheck"/></td>
	  <td class="third" id="tos"></td>
	</tr>
	  <tr id="last"><td><input type="submit" class="button" class="pointer" value="register"/></td></tr>
	</table>
	</div>
      </fieldset>
    </form>
