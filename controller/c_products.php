<?php 
	require_once('../model/m_products.php');

	class C_Products
	{
		function loadProducts(){
			$m_Products = new M_Products();
			$data = $m_Products->queryProducts();
			return $data;
		}
		function loadGenderProducts(){
			$m_Products = new M_Products();
			$data = $m_Products->queryGenderProducts();
			return $data;
		}
		function loadTypeProducts(){
			$m_Products = new M_Products();
			$data = $m_Products->queryTypeProducts();
			return $data;
		}
		function loadDetail($_id){
			$m_Products = new M_Products();
			$data = $m_Products->queryDetail($_id);
			return $data;
		}
	}
 ?>