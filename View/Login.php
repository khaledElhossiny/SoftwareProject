<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
	<link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/Google-Style-Login.css">
    <link rel="stylesheet" href="../bootstrap/css/styles.css">
</head>

<body>
    <div class="login-card">
		<label class="float-right" id="form_title" style="margin-right: 85px;">
			<strong>دار النور و الأمل</strong>
		</label>
		<img src="../bootstrap/img/avatar_2x.png" class="profile-img-card">
		<label id="login_check_msg" style="float:right; color:red;"></label><br>
        <form action="../Controller/UserController.php" method="post" class="form-signin">
			<span class="reauth-email"></span>
			<input class="form-control float-right" name="user_name" type="text" placeholder="اسم المستخدم" id="username_field">
			<input class="form-control float-right" name="user_password" type="password" required="" placeholder="كلمة السر" id="inputPassword">
			<div class="checkbox">
				<div class="form-check float-right">
					<input class="form-check-input" type="checkbox" id="formCheck-2">
					<label class="form-check-label float-right" for="formCheck-2">حفظ الدخول</label>
				</div>
			</div>
			<button name="Login" class="btn btn-primary btn-block btn-lg btn-signin" type="submit">دخول</button>
		</form>
		<a class="float-right forgot-password" href="#">نسيت كلمة السر؟</a>
	</div>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<script>
function display_login_error_msg()
{
	var error_label=document.getElementById("login_check_msg");
	error_label.innerText ="بيانات خاطئة";
}
</script>

<?php
if (session_id() == ''){
    session_start();
}

class LoginView
{
	public function display_login_error_msg()
	{
		echo "<script>
		display_login_error_msg();
		</script>";
	}
}
?>