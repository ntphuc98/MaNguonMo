<?php 
	require_once('common/database.php');
	class M_Products extends Database
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function queryProducts(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT * FROM shoesProducts");
				$stmt->execute();
			}catch(PDOException $e){
		    	echo "Query failed: " . $e->getMessage();
		    }
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			    $stmt=null;
			    $conn=null;
			    return $data;
			}
		}
		function queryDetail($_id){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT * FROM shoesProducts WHERE id=?");
				$stmt->bindValue(1, $_id);
				$stmt->execute();
			}catch(PDOException $e){
		    	echo "Query failed: " . $e->getMessage();
		    }
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
			    $stmt=null;
			    $conn=null;
			    return $data;
			}
		}
		public function queryTypeProducts()
		{
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT * FROM typeProducts");
				$stmt->execute();
			}catch(PDOException $e){
		    	echo "Query failed: " . $e->getMessage();
		    }
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			    $stmt=null;
			    $conn=null;
			    return $data;
			}
		}
		public function queryGenderProducts()
		{
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT * FROM genderProducts");
				$stmt->execute();
			}catch(PDOException $e){
		    	echo "Query failed: " . $e->getMessage();
		    }
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			    $stmt=null;
			    $conn=null;
			    return $data;
			}
		}
	}

 ?>