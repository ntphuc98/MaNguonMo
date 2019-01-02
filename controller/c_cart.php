<?php
	require_once("../views/header.php");
	if(!isset($_SESSION['id']) || !isset($_SESSION['name']) || !isset($_SESSION['role'])){
		header('location:c_login.php');
	}else{
		require_once("../model/m_cart.php");
		require_once("../model/m_user.php");

		$idUser = $_SESSION['id'];
		$m_cart = new M_Cart();
		$m_user = new M_User();
		$userInfo = $m_user->queryProfile($idUser);

		if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST["delete"])){
			if ($m_cart->deleteIdCart($_POST["idcart"]) ){

			}
		}

		if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST["update"])){
			$ok = $m_cart->updateCart($_POST["idcart"], $_POST["size"], $_POST["amount"]);
			if($ok){

			}

		}
		$data = $m_cart->queryAllCart($idUser);

		if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST["submitOrder"])){
			$phone = $_POST["phone"];
			$address = $_POST["address"];
			foreach ($data as $row) {
				require_once("../model/m_orders.php");
				$m_oders = new M_Orders();
				$m_oders->insertOrders(array($row["iduser"], $row["idproduct"], $row["size"], $row["amount"], $address, $phone ));
				$m_cart->deleteIdCart($row["idcart"]);
			}
			header("location:c_checkOut.php");
		}
		if($data == false){
			echo '<hr><div class="alert alert-info col-md-4 offset-4" role="alert">
			Không có sản phẩm trong giỏ hàng!
			</div>';
		}else{
			require_once("../views/cart.php");
		}

		require_once("../views/footer.php");
	}
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			document.title = 'Giỏ hàng';
		});
</script>