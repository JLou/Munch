<?php
session_start();
include('Db.php');
if (isset($_SESSION['id']))
   {
     $db = Db::getInstance();
     $db->listBargains();
   }			
else
  {
    header('index.php');
  }