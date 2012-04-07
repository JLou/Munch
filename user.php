<?php
function isAdmin($id)
{
  try
    {
      $db = Db::getInstance();
      
      $query = $db->prepare('SELECT id, admin FROM users WHERE id = ?');
      $query->execute(array($id));
      $user = $query->fetch();
      
      return $user['admin'];
    }
  catch(Exception $e)
    {
      die('Error: ' + $e->getMessage());
    }
}

function isrestau($id)
{
  try
    {
      $db = Db::getInstance();
      
      $query = $db->prepare('SELECT id, checked FROM restaurants WHERE id = ?');
      $query->execute(array($id));
      $user = $query->fetch();
      
      return $user['checked'];
    }
  catch(Exception $e)
    {
      die('Error: ' + $e->getMessage());
    }
}
?>


