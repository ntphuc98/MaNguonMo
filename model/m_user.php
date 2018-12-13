<?php 
	require_once('common/database.php');

class M_User extends Database
{	
	private $userName;
	private $pass;
	private $name;
	private $email;
	private $sex;
	private $birthday;
	private $phone;
	private $address;
	function __construct()
	{
		parent::__construct();
	}
	function queryUserName($_userName){
		$this->userName = $_userName;
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT username FROM users WHERE username=:username");
			$stmt->bindValue(":username", $this->userName);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "Query failed: " . $e->getMessage();
	    }
	    if($stmt->rowCount() == 0){ //không có
	    	$stmt=null;
	    	$conn=null;
	    	return 0;
	    }else{ //có
		    $stmt=null;
		    $conn=null;
		    return 1;
		}
	}

	function queryUser($_username, $_pass){
		$this->userName = trim($_username);
		$this->pass = md5($_pass);
		$conn =parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('SELECT id, name, role FROM users WHERE username = :username AND password = :pass');
			$stmt->bindValue(':username', $this->userName);
			$stmt->bindValue(':pass', $this->pass);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "Query failed: " . $e->getMessage();
	    }

	    $row = $stmt->rowCount();
	    
	    if($row == 0 ){
	    	$stmt=null;
	    	$conn=null;
	    	return 0;
	    }else{
	    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    $stmt=null;
		    $conn=null;
		    return $data;
	    }
	}
	//name, username, email, sex, birthday, phone, crtime
	public function insertUser($userArr=array())
	{
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('INSERT INTO users (name, username, email, sex, birthday, phone, address, password) VALUES ( N'.'?'.', ?, ?, ?, ?, ?, ?, ?)');
			$stmt->execute($userArr);
			$stmt=null;
			$conn=null;
			return true;
		}catch(PDOException $e){
	    	echo "Lỗi insert: " . $e->getMessage();
	    }
		$stmt=null;
		$conn=null;
		return false;
	}
	function queryProfile($_id){
		$conn =parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('SELECT name, username, email, sex, birthday, phone, address FROM users WHERE id = :id');
			$stmt->bindValue(':id', $_id);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "Query failed: " . $e->getMessage();
	    }

	    $row = $stmt->rowCount();
	    
	    if($row == 0 ){
	    	$stmt=null;
	    	$conn=null;
	    	return 0;
	    }else{
	    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    $stmt=null;
		    $conn=null;
		    return $data;
	    }
	}
	function updateProfile($profileArr = array()){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('UPDATE users SET sex=? , birthday=? , phone=? , address=N'.'?'.' WHERE id=? ');
			$stmt->execute($profileArr);
		}catch(PDOException $e){
	    	echo "Lỗi update: " . $e->getMessage();
	    }
	    if($stmt->rowCount() > 0){
			$stmt=null;
			$conn=null;
			return true;
	    }
		$stmt=null;
		$conn=null;
		return false;
	}
}
 ?>