<?php
require_once("../Model/UserModel.php");
require_once("../Model/Security/Security.php");
if (session_id() == ''){
    session_start();
}
if(isset($_POST['Login']))
{
	$UserControllerObject=new UserController();
	$SecurityModelObj=new Security();
	//$UserControllerObject->Login();
	$UserControllerObject->Login(
	$SecurityModelObj->BlockSQLInjection($_POST['user_name']),
	$SecurityModelObj->BlockSQLInjection($_POST['user_password']));
	exit();
}
else if(isset($_POST['ViewUser']))
{
	$UserControllerObject=new UserController();
	$UserControllerObject->Search_User($_SESSION['ID']);
	exit();
}
else if(isset($_POST['Register']))
{
	$UserControllerObject=new UserController();
	if($UserControllerObject->User_Already_Exists($_POST['Username'])==false)
	{
		// echo "true";
		$UserControllerObject->Register($_POST['Username'],$_POST['Password']
		,$_POST['Password_Check'],$_POST['Email'],$_POST['UserTypeID'],$_POST['Employee_ID']);
	}
	else{
		// echo "false";
			require_once("../View/Register.php");
			$RegisterView=new RegisterView();
			$RegisterView->display_register_error_msg("هذا الاسم مستخدم, برجاء تغيير الاسم");
	}
	exit();
}
else if(isset($_POST['EditUser']))
{
	if($_POST['Password']==$_POST['RepeatPassword'])
	{
		$UserControllerObject=new UserController();
		$UserControllerObject->Edit($_SESSION['User_ID'], $_POST['Username'],$_POST['Password'],$_POST['Email']);
	}
	else
	{
		require_once("../View/EditUser.php");
		$EditView=new EditView();
		$EditView->display_edit_error_msg("تاكد من تطابق كلمة السر");
		exit();
	}
}
else if(isset($_GET['pass_check'])) //used in edit user
{
	$UserControllerObject=new UserController();
	$UserControllerObject->check_password($_GET['pass_check']);
	exit();
}
else if(isset($_GET['DeleteUser']))
{
	if($_SESSION['Password']==sha1($_GET['Password']))
	{
		$UserControllerObject=new UserController();
		$UserControllerObject->Del($_SESSION['User_ID']);
	}else 
	{
		require_once("../View/DeleteUser.php");
		$delUserView=new DeleteUserView();
		$delUserView->display_del_error_msg("كلمة السر غير صحيحة, سيتم إالغاء المحاولة");
		exit();
	}
}
class UserController
{	
	public function check_password($pass)
	{
		if($_SESSION['Password']!=sha1($pass))
		{
			echo json_encode("كلمة السر غير صحيحة",JSON_UNESCAPED_UNICODE);
		}
	}
	public function Login($username,$password)
	{
		$UserModel=new UserModel("");
		$UserModel->set_Username($username);
		$UserModel->set_Password($password);
		$LoginObj=$UserModel->Login();
		if($LoginObj!=null)
		{
			if($LoginObj->get_Is_Deleted()==0)
			{
				$_SESSION['ID'] = $LoginObj->get_ID();
				$_SESSION['User_ID'] = $LoginObj->get_id();
				$_SESSION['Username'] = $LoginObj->get_Username();
				$_SESSION['Password'] =$LoginObj->get_Password();
				$_SESSION['Email'] = $LoginObj->get_Email();
				$_SESSION['Age'] = date("Y-m-d")-$LoginObj->get_Birth_Date(); //through employee enheriting person
				$_SESSION['Mobile'] = $LoginObj->get_Mobile(); //through employee enheriting person
				$_SESSION['Address'] = $LoginObj->get_Address(); //through employee enheriting person
				$_SESSION['UserTypeID'] = $LoginObj->get_User_Type_ID();
				// $_SESSION['UserPages'] = $LoginObj->get_UserPages_Obj()->get_Page_Obj()->get_Page_Address();
				header("Location:../View/Home.php");
				exit();
			}
			else 
			{
				require_once("../View/Login.php");
				exit();
			}
		}
		else
		{
			require_once("../View/Login.php");
			$LoginView=new LoginView();
			$LoginView->display_login_error_msg();
			exit();
		}
	}
	public function User_Already_Exists($username)
	{
		$UserModel=new UserModel("");
		$UserModel->set_Username($username);
		$result=$UserModel->Search_By_Username();
		if($result!=null)
		{
			return true;
		}
	}
	public function Register($Username,$Password,$Password_Check,$Email,$UserTypeID,$EmployeeID)/***************************************/
	{
			if($Password==$Password_Check)
			{
				$UserModelObj=new UserModel("");
				$UserModelObj->set_Username($Username);
				$UserModelObj->set_Password($Password);
				$UserModelObj->set_Email($Email);
				$UserModelObj->set_User_Type_ID($UserTypeID);
				$UserModelObj->set_Employee_ID($EmployeeID);
				$UserModelObj->Register();
				header("Location:../View/Login.php");
				exit();
			}
			else
			{
				require_once("../View/Register.php");
				$RegisterView=new RegisterView();
				$RegisterView->display_register_error_msg("تاكد من تطابق كلمة السر");
			}
	}
	public function Search_User($id)
	{
		$UserModelObj=new UserModel($id);
		return $UserModelObj;
	}
	public function Select_All_Users()
	{
		$UserModelObj=new UserModel("");
		return $UserModelObj->Select_All_Users();
	}
	public function Edit($ID, $Username, $Password, $Email)
	{
		$UserModelObj=new UserModel("");
		$UserModelObj->set_id($ID);
		$UserModelObj->set_Username($Username);
		$UserModelObj->set_Password($Password);
		$UserModelObj->set_Email($Email);
		$UserModelObj->Edit();
		$_SESSION['Username']=$Username;
		$_SESSION['Password']=$Password;
		$_SESSION['Email']=$Email;
		header("Location:../View/EditUser.php");
		exit();
	}
	public function Del($CurrentUserID)
	{
		$UserModelObj=new UserModel("");
		$UserModelObj->set_id($CurrentUserID);
		$UserModelObj->Del();
		// $this->logout();
		header("Location:../View/Logout.php");
	}
	
	public function logout()
	{
		session_destroy();
		header("Location:../View/Login.php");
		exit(); //stops the current php script
	}
}
?>
