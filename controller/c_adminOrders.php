<?php
	require_once("../views/header.php");
	if(
		!isset($_SESSION['name']) || 
		!isset($_SESSION['id']) || 
		!isset($_SESSION['role']) ||
		($_SESSION['role']!="1")
	){
		header("location:index.php");
	}
	require_once("../model/m_orders.php");
	require_once("../views/navAdmin.php");
	
	$m_order = new M_Orders();
	$sql = "SELECT orders.id as idorder, orders.iduser as iduser, orders.idproduct as idproduct, orders.size as size, orders.amount as amount, orders.address as address, orders.phone as phone, orders.status as status, orders.updateTime as updateTime, shoesProducts.name as name,  shoesProducts.img as img, shoesProducts.cost as cost , users.name as nameuser FROM orders , shoesProducts, users WHERE shoesProducts.id=orders.idproduct and users.id=orders.iduser";
	//edit
	if(isset($_GET["edit"])){
		$idOrder = $_GET["edit"];
		//update
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["update"]) ){
			$m_order->updateOrderAdmin(
				array( 
				$_POST["size"], 
				$_POST["amount"], 
				$_POST["phone"], 
				$_POST["address"],
				$_POST["status"],
				$idOrder
			)
			);
				echo '<div class="col-md-4 offset-4 alert alert-success" role="alert">Cập nhật thành công!</div>';
		}
		//delete
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["delete"]) ){
			$m_order->deleteIdOrder($idOrder);
				echo '<div class="col-md-4 offset-4 alert alert-success" role="alert">Xóa đơn thành công!</div>';
		}
		//load form
		$sqlEdit = $sql." AND orders.id=".$idOrder." LIMIT 1";
		$data = $m_order->queryOrdersUser($sqlEdit);
		
		require_once("../views/adminOrdersForm.php");

	}else{
		//load data
		$data = $m_order->queryOrdersUser($sql);
		require_once("../views/adminOrders.php");
	}
	require_once("../views/footer.php");
?>
<script type="text/javascript">
	    $(document).ready(function() {
	        document.title = 'Quản trị Orders';
	    });
	</script>