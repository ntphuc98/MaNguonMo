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
	require_once("../model/m_user.php");
	require_once("../views/navAdmin.php");
	require_once("../views/adminStatistics.php");
	require_once("../views/footer.php");
?>
<script type="text/javascript">
	    $(document).ready(function() {
	        document.title = 'Thống kê';
	    });
	</script>