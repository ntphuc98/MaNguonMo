<?php
		require_once('../views/header.php');
		require_once("../model/m_products.php");
		$m_products = new M_Products();
		//câu sql với từng kiểu
		$sql_total = "SELECT count(id) as total FROM shoesProducts WHERE ";
		$sql =  "SELECT * FROM shoesProducts WHERE ";
		$name_search = $_GET["search"];
		$link = "search=".$name_search."&";
		$sql_total.=" name LIKE N'%".$name_search."%'";
		$sql .=" name LIKE N'%".$name_search."%'";

		echo '<script type="text/javascript">
					$(document).ready(function() {
					    	document.title="Tìm kiếm: '.$name_search.'";
					    	$("#search").val("'.$name_search.'");
					    	$("#filter").hide();
					    });
					</script>';
				
		$total_row = $m_products->queryTotalProducts($sql_total);
		$total_record = $total_row['total']; // tổng sô record trong table
		//trnag hiển thị
		$current_page =  isset($_GET['page']) ? $_GET['page'] : 1; 

		$limit = 12;
		$total_page = ceil($total_record / $limit); //hàm làm tròn lên.vd 2,3=3
		//kiểm tra nhập page
		if ($current_page > $total_page) {
			$current_page = $total_page;
		}
		if ($current_page < 1) {
			$current_page = 1;
		}
		//tính start
		$start = ($current_page - 1 ) * $limit;
		$sql .= " LIMIT ".$start." , ".$limit;
		
		$data = $m_products->queryProducts($sql);
		require_once("../views/products.php");
		require_once("../views/paging.php");
		require_once("../views/footer.php");
?>