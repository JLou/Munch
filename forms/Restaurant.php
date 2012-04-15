<?php

class RestaurantForm 
{
  protected  $_data;
  protected $_action;
  public function __construct($data, $action="create")
  {
    $this->_data = $data;
    //$this->_action = in_array($action, array('create','edit')) ? $action : "create";

    
  }

  public function render()
  {
    $output = '<div class="formcontainer">
    <form method="post" name="' . $this->_action . 'restaurantform" 
id="restaurantform" action="restaurant_edit.php">
<fieldset>
<legend>Update your profile</legend>
      <table>';
    $output .= '<tr>
	  <td><label>Name:</label></td>
          <td><input type="text" id="rest_name" name="rest_name" 
               value="'. $this->_data['name'] .'" />
          </td></tr>';
    $output .= '<tr>
	  <td><label>Location:</label></td>
          <td><input type="text" id="rest_location" name="rest_location" 
               value="'. $this->_data['location'] .'" />
          </td></tr>';
    $output .= '<tr>
<td><label for="rest_address">Address</label></td>
<td><input type="text" name="rest_address" id="rest_address"
value="' . $this->_data['address'] . '"/></td>
</tr>
<tr>
<td><label for="rest_tel">Phone</label></td>
<td><input type="text" name="rest_tel" id="rest_tel"
value="' . $this->_data['tel']  . '"/></td>
</tr>';
    $output .= '<tr>
	  <td><label>Description:</label></td>
          <td><textarea id="rest_desc" name="rest_desc" >'
            . $this->_data['description'] . '</textarea></td>
	</tr>';
    $output .=	'<tr><td><input type="submit" value="edit page" class="button"/></td></tr>';
    $output .= '</table></fieldset></form></div>';
    return $output;
  }
}