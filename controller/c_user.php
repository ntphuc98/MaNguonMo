<?php 
	require_once('../model/m_user.php');
	require_once('../model/validation.php');

class C_User
{
	public function loginUser($_username, $_pass)
	{
		//model
		
		$errArr = array('usernameErr' => null, 'passErr' => null);
		$m_Login = new M_User();
		$had = $m_Login->queryUserName($_username);
		$user = $m_Login->queryUser($_username, $_pass);
		if ($had == 0) {
			$errArr['usernameErr'] = 'Tài khoản / Email không chính xác!';

			return $errArr;
		}elseif($user == 0){
			$errArr['usernameErr'] = "<script>$('#username').val('$_username')</script>";
			$errArr['passErr'] = 'Mật khẩu không chính xác!';
			return $errArr;
		}else{

			$_SESSION['id'] = $user['id'];
			$_SESSION['name'] = $user['name'];
			$_SESSION['role'] = $user['role'];

			return null;
		}
	}
	public function regUser($_name, $_username, $_email, $_pass, $_pass2)
	{
		$errArr = array(
	 		'username'=>null,
	 		'name'=>null,
	 		'email'=>null,
	 		'pass'=>null,
	 		'pass2'=>null
 		);

		$vali = new Validation();

		//test input
		$username = $vali->test_input($_username);
		$name = $vali->test_input($_name);
		$email =$vali->test_input($_email);
		$pass = $vali->test_input($_pass);
		$pass2 = $vali->test_input($_pass2);
		// //check value
		$errArr['username'] = $vali->checkUserName($username);
		$errArr['name'] = $vali->checkName($name);
		$errArr['email'] = $vali->checkEmail($email);
		$errArr['pass'] = $vali->checkPass($pass);
		$errArr['pass2'] = $vali->checkPass2($pass, $pass2);
		if(
			($errArr['username'] == null) && 
			($errArr['name'] == null) && 
			($errArr['email'] == null) &&
			($errArr['pass'] == null) && 
			($errArr['pass2'] == null)
		){
			$m_user = new M_User();
			$userArr = array(ucwords($name), $username, $email, null, null, null, null,md5($pass));
			//chuyển đổi tên viết hoa chữ đầu và md5 pass
			$m_user->insertUser($userArr);
			return null;
		}else{
			return $errArr;
		}
	}
	public function showProfile($_id)
	{
		
		$m_User = new M_User();
		$m_Profile = $m_User->queryProfile($_id);
		if($m_Profile == 0){
			return 0;
		}else{
			return $m_Profile;
		}
	}
	public function updateProfile($profileArr = array())
	{
		$m_User = new M_User();
		$ok = $m_User->updateProfile($profileArr);
		if($ok){
			echo "<script>alert('Cập nhật thành công!')</script>";
		}else{
			echo "<script>alert('Cập nhật thành công!')</script>";
		}
	}
	public function outUser()
	{
		if (isset($_SESSION['name'])) 
			unset($_SESSION['name']);
		if (isset($_SESSION['id'])) 
			unset($_SESSION['id']);
		if (isset($_SESSION['role'])) 
			unset($_SESSION['role']);
	}
}

 ?>