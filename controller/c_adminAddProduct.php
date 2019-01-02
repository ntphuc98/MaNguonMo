<?php
	require_once("../views/header.php");
	if(
		!isset($_SESSION['name']) || 
		!isset($_SESSION['id']) || 
		!isset($_SESSION['role']) ||
		($_SESSION['role']!="1")
	){
		header("location:index.php");
	}else{
		require_once("../views/navAdmin.php");
		//kiểm tra upload file hình ảnh
		if(isset($_FILES["imgUpload"])){
			require_once("c_uploadFile.php");
		}
		require_once("../views/adminAddProductsForm.php");
		require_once("../views/footer.php");
	}
?>