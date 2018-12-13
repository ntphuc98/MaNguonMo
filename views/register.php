<?php 
	require_once('header.php');
 ?>

 <?php
 	require_once('../controller/c_user.php');
 	$usernameErr ='';
	$nameErr = ''; 
	$emailErr ='';
	$passErr ='';
	$pass2Err ='';
	$username = '';
	$name = '';
	$email = '';
 	if(($_SERVER['REQUEST_METHOD'] == 'POST')){
 		$username = $_POST['username'];
 		$name = $_POST['name'];
 		$email = $_POST['email'];
 		$pass = $_POST['pass'];
 		$pass2 = $_POST['pass2'];
 		$c_user = new C_User();
 		$errArr = $c_user->regUser($name, $username, $email, $pass, $pass2);

 		if($errArr== null){
			echo "<script type='text/javascript'>
            $(document).ready(function() {
                $('.register').html(function(){
                	return '<h2>Đăng ký tài khoản thành công<h2><br/><a href=\'account.php\' alt=\'Đăng nhập\' ><input class=\'btn btn-success btn-lg\' type=submit value=\'Đăng nhập\'></a>';
                	});
            });
          </script>";
 		}else{
 			$usernameErr = $errArr['username'] ;
			$nameErr = $errArr['name'];
			$emailErr = $errArr['email'];
			$passErr = $errArr['pass'];
			$pass2Err = $errArr['pass2'];
 		}
 		
	}
 ?>


	<!--container-->	
	<div class="container">
		<div class="register">
			<h2>Đăng ký</h2>		
			<div class="register-top">
 
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					<div>	
						<span>Tài khoản: (*)</span>
						<input type="text" name="username" id="username" required minlength=6 maxlength="50">
							<span class='text-danger'><?=$usernameErr?></span>
				</div>
				<div> 	
					<span>Họ tên: (*)</span>
					<input type="text" name="name" id="name" required minlength=10 maxlength="50">
					<span class='text-danger'><?=$nameErr?></span>
				</div>
				<div> 	
					<span>Email: (*)</span>
					<input type="email" name="email" id="email" required maxlength="100"> 
					<span class='text-danger'><?=$emailErr?></span>
				</div>
							<div> 
								<span >Mật khẩu: (*)</span>
								<input type="password" name="pass" id="pass" required minlength=6 maxlength="100">
								<span class='text-danger'><?=$passErr?></span>
							</div>
							<div> 
								<span >Nhập lại mật khẩu: (*)</span>
								<input type="password" name="pass2" id="pass2" required minlength=6 maxlength="100">
								<span class='text-danger'><?=$pass2Err?></span>
							</div>
							<input type="submit" value="Đăng ký">
				</form>
			</div>
			<!-- end register-top -->
		</div>
		<!-- end register  -->
	</div>
	<!--end container-->

<!--footer-->
<?php 
	require_once('footer.php');
 ?>

 <?php 
 	echo "<script>$('#username').val('$username')</script>";
 	echo "<script>$('#email').val('$email')</script>";
 	echo "<script>$('#name').val('$name')</script>";
  ?>