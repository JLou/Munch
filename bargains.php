<?php
session_start();
include('Db.php');
if (isset($_SESSION['id']))
   {
     include('head.php');
     echo '<section id="content" class="bargains"><header id="pagebanner"><h1>Bargains</h1></header>';
     $db = Db::getInstance();
     $db->listBargains();
   }			
else
  {
    header('index.php');
  }
echo '</section>';
include('bottom.php');