<?php 

class Db
{
  protected static $_instance = null;
  protected $_pdo;

  protected function __construct($host="sql8.flk1.host-h.net", $user="munchadmin", $pass="SGVnQk28", $dbname="munchdb")
  {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $this->_pdo = new PDO('mysql:host=' . $host.';dbname=' . $dbname, $user, $pass, $pdo_options);
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

  public function updateField($field, $value, $id)
  {
    $query = $this->_pdo->prepare('UPDATE users SET '. $field .'=:field WHERE id=:id');
    $query->execute(array(':field' => $value,
			 ':id' => $id));
  }

  public function addBargain($data, $restaurant_id)
  {
    $query = $this->_pdo->prepare('INSERT INTO bargains(id, restaurant_id, description) VALUES(:id, :restid, :desc)');
    $query->execute(array(':id' => '',
			  ':restid' => $restaurant_id,
			  ':desc' => $data['description']));
  }

  public function listBargains()
  {
    $query = $this->_pdo->query('SELECT b.*, r.name, r.id FROM bargains b LEFT JOIN restaurants r ON b.restaurant_id=r.id ORDER BY b.id DESC LIMIT 3');
    while ($data = $query->fetch())
      {
	echo '<article class="articlebox">';
	echo '<header><h3><a href="spots.php?id='. $data['restaurant_id'] . '">' . $data['name'] . '</a></h3></header>';
	echo '<p>' . $data['description'] . '</p></article>';
      }
  }
  
  public function updatePicture($file, $id)
  {
    $query = $this->_pdo->prepare('UPDATE restaurants SET picture = :picture WHERE id = :id');
    $query->execute(array(':picture' => $file,
			  ':id' => $id));
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

  public function getFullUser($id)
  {
    $query = $this->_pdo->prepare('SELECT * FROM users WHERE id=:id');
    $query->execute(array('id' => $id));
    return $query->fetch();
  }

  public function getRestaurant($id)
  {
    $query = $this->_pdo->prepare('SELECT r.* FROM restaurants r WHERE id = ? ');
    $query->execute(array($id));
    return $query->fetch();    
  }

  public function updateRestaurant($id, $data)
  {
    $query = $this->_pdo->prepare('UPDATE restaurants SET
                                   name = :name, location = :location,
                                   description = :desc,
                                   address     = :address,
                                   tel         = :tel
                                   WHERE id = :id');
    $query->execute(array(':name' => $data['name'],
			  ':location' => $data['location'],
			  ':desc'     => $data['description'],
			  ':address'  => $data['address'],
			  ':tel'      => $data['tel'],
			  ':id'       => $id)
		    );
  }

  public function addSpecial($post, $restid)
  {
    $query = $this->_pdo->prepare('SELECT * FROM specials WHERE restaurant_id=:restid AND date=:date');
    list($day, $month, $year) = split('[/]', strip_tags($post['date']));
    $query->execute(array(':restid' => $restid,
			  ':date' => $year . '/' . $month . '/' . $day));
    if ($query->fetch() == null)
      {
	$query = $this->_pdo->prepare('INSERT INTO specials(id, date, restaurant_id, description, title) VALUES(:id, :date, :restid, :desc, :title)');
	$query->execute(array(':id' => '',
			      ':date' => $year . '/' . $month . '/' . $day,
			      ':title' => strip_tags($post['title']),
			      ':desc' => strip_tags($post['description']),
			      ':restid' => $restid));
	return true;
      }
    else
      return false;
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
  
  function truncate($str, $id, $length=300, $trailing='see more...')
  {
    /*
    ** $str -String to truncate
    ** $length - length to truncate
    ** $trailing - the trailing character, default: "..."
    */
    // take off chars for the trailing
    $length-=mb_strlen($trailing);
    if (mb_strlen($str)> $length)
      {
	// string exceeded length, truncate and add trailing dots
	return mb_substr($str,0,$length) . ' <a href="specials.php?id=' . $id . '">' . $trailing . '</a>';
      }
    else
      {
	// string was already short enough, return the string
	$res = $str;
      }
    
    return $res;
    
  }
  
  public function getSpecialTruncate($id)
  {
    $query = $this->_pdo->prepare('SELECT s.date, s.description, s.title, r.location, r.address, r.tel, r.name, r.id FROM specials s LEFT JOIN restaurants r ON s.restaurant_id=r.id WHERE s.id=:id ORDER BY id');
    $query->execute(array(':id' => $id));;
    $data = $query->fetch();
    return $data;
  }
  
  public function getSpecials($date)
  {
    $query = $this->_pdo->prepare('SELECT s.date, s.description, s.title, s.id as sid, r.location, r.address, r.tel, r.name, r.id FROM specials s LEFT JOIN restaurants r ON s.restaurant_id=r.id WHERE s.date=:date ORDER BY s.id');
    $query->execute(array(':date' => $date));;
    while ($data = $query->fetch())
      {
	echo '<article class="articlebox">';
	echo '<header><h3>' . $data['title'] . "</h3><p>at <a href='spots.php?id=" . $data['id'] . "'>" . $data['name'] . '</a>, ' . $data['location'] . '</p></header>';
	echo $this->truncate('<p class="description">' . $data['description'], $data['sid']);
	echo '</p>';
	echo '</article>';
      }
  }

  public function removeSpecial($id, $rid)
  {
    $query = $this->_pdo->prepare('DELETE FROM specials WHERE id=:id AND restau_id=:rid');
    $query->execute(array('id' => $id),
		    array('rid' => $rid));
  }

  public function getRestaurantSpecials()
  {
    $query = $this->_pdo->prepare('SELECT s.id, s.date, s.title FROM specials s WHERE s.restaurant_id=:id AND s.date >= :date ORDER BY date');
    return $query;
  }
  
  public function getSpecial($id)
  {
    $query = $this->_pdo->prepare('SELECT * FROM specials WHERE id=:id');
    $query->execute(array('id' => $id));
    return $query->fetch();
  }

  public function updateSpecial($id, $post)
  {
    list($day, $month, $year) = split('[/]', strip_tags($post['date']));
    $query = $this->_pdo->prepare('UPDATE specials SET title=:title, date=:date, description=:desc WHERE id=:id');
    $query->execute(array('id' => $id,
			  'title' => $post['title'],
			  'date' => $year . '/' . $month . '/' . $day,
			  'desc' => $post['description']));
			  
  }

  public static function getInstance()
  {
    if( self::$_instance == null)
      {
	 self::$_instance = new Db();
      }
    return self::$_instance; 
  }
  
  public function checkDate($date)
  {
    return preg_match("#^(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/](19|20)\d\d$#", strip_tags($date));
  }
}
