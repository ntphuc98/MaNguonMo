<?php
	require_once("common/database.php");
	/**
	 * 
	 */
	class M_Products extends Database
	{
		function __construct()
		{
			parent::__construct();
		}
		function queryProducts($_sql){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare($_sql);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryProducts failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
	    		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return$data;
		    }
		}
		function queryTotalProducts($_sql){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare($_sql);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryTotalProducts failed: " . $e->getMessage();
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
	    function queryDetails($id){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT * FROM shoesProducts WHERE id=:id LIMIT 1");
				$stmt->bindValue(":id", $id);
				$stmt->execute();
			}catch(PDOException $e){
				echo "QueryDetail failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
	    		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return$data;
		    }
		}
		function updateProducts($productArr = array()){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("UPDATE shoesProducts SET name=N"."?"." , gender=N"."?"." , types=N"."?"." , cost=? , img=?, describes=N"."?"." , updateTime=now() WHERE id=? LIMIT 1");
				
				$stmt->execute($productArr);
			}catch(PDOException $e){
		    	echo "Lỗi updateProducts: " . $e->getMessage();
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
		function deleteIdProducts($idProduct){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("DELETE FROM carts WHERE idproduct=:id LIMIT 1; DELETE FROM orders WHERE idproduct=:id LIMIT 1; DELETE FROM shoesProducts WHERE id=:id LIMIT 1");
				$stmt->bindValue(':id', $idProduct);
				$stmt->execute();
			}catch(PDOException $e){
				echo "deleteIdCart failed: " . $e->getMessage();
		    }
		    if($stmt->rowCount() > 0){
		    	$stmt=null;
				$conn=null;
				return true;
		    }else{
				$stmt=null;
				$conn=null;
				return false;
		    }
		}
	}
?>