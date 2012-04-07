<?php 

class Db
{
  protected static $_instance = null;
  protected $_pdo;

  protected function __construct($host="localhost", $user="root", $pass="steaksteak", $dbname="munch")
  {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $this->_pdo = new PDO('mysql:host=localhost;dbname=' . $dbname, $user, $pass, $pdo_options);
  }

  public function isAdmin($id)
  {
    try
      {
	$query = $this->_pdo->prepare('SELECT id, admin FROM users WHERE id = ?');
	$query->execute(array($id));
	$user = $query->fetch();
	
	return $user['admin'];
      }
    catch(Exception $e)
      {
	die('Error: ' + $e->getMessage());
      }
  }

  public function isrestau($id)
  {
    try
      {
	$query = $this->_pdo->prepare('SELECT id, checked FROM restaurants WHERE id = ?');
	$query->execute(array($id));
	$user = $query->fetch();
	
	return $user['checked'];
      }
    catch(Exception $e)
      {
	die('Error: ' + $e->getMessage());
      }
  }
  
  public function getUser($id)
  {
    $query = $this->_pdo->prepare('SELECT id, admin FROM users WHERE id = ?');
    $query->execute(array($id));
    return $query->fetch();
  }

  public function getRestaurant($id)
  {
    $query = $this->_pdo->prepare('SELECT * FROM restaurants WHERE id = ?');
    $query->execute(array($id));
    return $query->fetch();    
  }

  public function updateRestaurant($id, $data)
  {
    $query = $this->_pdo->prepare('UPDATE restaurants SET
                                   name = :name, location = :location,
                                   description = :desc
                                   WHERE id = :id');
    $query->execute(array(':name' => $data['name'],
			  ':location' => $data['location'],
			  ':desc'     => $data['description'],
			  ':id'       => $id)
		    );
  }


  public function query($query)
  {
    return $this->_pdo->query($query);
  }

  public function prepare($query)
  {
    return $this->_pdo->prepare($query);
  }
  
  public function addUser($name, $surname, $year, $month, $day, 
		 $gender, $city, $email, $passwd, $restaurant) 
  {
    $query = $db->prepare('INSERT INTO users(id, name, surname, birth, gender, city, email, passwd, restaurant, admin) 
                           VALUES(:id, :name, :surname, :birth, :gender, :city, :email, :passwd, :restaurant, :admin)');
      list($day, $month, $year) = split('[/]', strip_tags($_POST['birth']));
      $query->execute(array('id' => '',
			    'name' => strtolower(strip_tags($_POST['name'])),
			    'surname' => strtolower(strip_tags($_POST['surname'])),
			    'birth' => $year . '/' . $month . '/' . $day,
			    'gender' => $gender,
			    'city' => strtolower(strip_tags($_POST['city'])),
			    'email' => strip_tags($_POST['email']),
			    'passwd' => MD5($_POST['passwd']),
			    'restaurant' => isset($_POST['restaurant']),
			    'admin' => false));
      $query = $db->query('SELECT id FROM users WHERE id = LAST_INSERT_ID()');
      $idd = $query->fetch();

  }

  public static function getInstance()
  {
    if( self::$_instance == null)
      {
	 self::$_instance = new Db();
      }
    return self::$_instance; 
  }
}
