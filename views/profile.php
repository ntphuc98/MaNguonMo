<?php 
	require_once('header.php');
	if(!isset($_SESSION['id']) || !isset($_SESSION['name']) || !isset($_SESSION['role'])){
		header('location:index.php');
	}
?>
<?php
	require_once('../controller/c_user.php');
	$id = $_SESSION['id'];
	$c_User = new C_User();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$sex = null;
		$birthday = null;
		$phone = null;
		$address = null;

		if (isset($_POST['sex'])){
			$sex = $_POST['sex'];
		}
		if (isset($_POST['birthday'])){
			$birthday = $_POST['birthday'];
		}
		if (isset($_POST['phone'])){
			$phone = $_POST['phone'];
		}
		if (isset($_POST['address'])){
			$address = $_POST['address'];
		}
		$c_User = new C_User();
		$c_User->updateProfile(array($sex, $birthday, $phone, (ucwords($address)), $id));

	}
?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3" 
				style="border: 2px solid;border-color:#333;;border-radius: 15px;
				margin-top: 3px ;margin-bottom: 3px ;padding:10px;">
				<div class="col-md-8 col-md-offset-2">
					<form action="profile.php" method="POST" >
							<div class="form-group">
								<h2 align="center">Thông tin cá nhân</h2>
							</div>
							<div class="form-group">
								<label for="name">Họ tên: </label>
								<input type="text" class="form-control" name="name" id='name' disabled>
							</div>
							<div class="form-group">
								<label for="username">Tài khoản: </label>
								<input type="text" class="form-control" name="username" id='username' disabled>
							</div>
							<div class="form-group">
								<label for="email">Email: </label>
								<input type="text" class="form-control" name="email" id='email' disabled>
							</div>
							<div class="form-group">
								<label >Giới tính: </label><br/>
								<label for="male"><input type="radio" class="single-bottom" name="sex" id="male" value="Nam">Nam</input></label>
								<label for="female"><input type="radio" class="single-bottom" name="sex" id="female" value="Nữ">Nữ</input></label>
							</div>
							<div class="form-group">
								<label for="birthday">Ngày sinh: </label>
								<input type="date" class="form-control" name="birthday" id="birthday" >
							</div>
							<div class="form-group">
								<label for="phone">Số điện thoại: </label>
								<input type="number" class="form-control" name="phone" id="phone" maxlength="15">
							</div>
							<div class="form-group">
								<label for="address">Địa chỉ: </label>
								<textarea class="form-control" name="address" id="address" ></textarea>
							</div>
							<div class="form-group">
								<div class="col-sm-4 col-sm-offset-4">
									<button type="submit" class="btn btn-success btn-md">Cập nhật</button>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php 
	require_once('footer.php');
		$profileArr = $c_User->showProfile($id);
	if($profileArr == 0){
		header('location:index.php');
	}else{
		echo "<script>$('#name').val('".$profileArr['name']."')</script>";
		echo "<script>$('#username').val('".$profileArr['username']."')</script>";
		echo "<script>$('#email').val('".$profileArr['email']."')</script>";
		if(strcmp($profileArr['sex'], 'Nam') == 0){
			echo "<script>$('#male').attr('checked', true);$('#female').attr('checked', false);</script>";
		}elseif(strcmp($profileArr['sex'], 'Nữ') == 0){
			echo "<script>$('#male').attr('checked', false);$('#female').attr('checked', true);</script>";
		}
		echo "<script>$('#birthday').val('".$profileArr['birthday']."')</script>";
		echo "<script>$('#phone').val('".$profileArr['phone']."')</script>";
		echo "<script>$('#address').val('".$profileArr['address']."')</script>";

	}
?>