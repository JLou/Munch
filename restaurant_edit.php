<?php

include('head.php');
include('Db.php');
include('forms/Restaurant.php');
session_start();
if (isset($_SESSION['id'])) //If we're logged
  {
    $db = Db::getInstance();
    //$db->getUser($_SESSION['id']);
    $id = intval($_SESSION['id']);
    
    //Update
    if(isset($_POST['rest_name']))
      {
	$db->updateRestaurant($id, array('name'        => strip_tags($_POST['rest_name']),
					 'location'    => strip_tags($_POST['rest_location']),
					 'description' => strip_tags($_POST['rest_desc']),
					 ));
      }
    
    $restaurant = $db->getRestaurant($id);
    $form  = new RestaurantForm($restaurant, "edit");
    
    $val = $form->render();
    echo $val;    
  }
else
  {
    echo 'pas co';
  }