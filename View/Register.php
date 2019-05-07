<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>تسجيل حساب</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="../bootstrap/css/styles.css">
</head>

<body>
    <div class="row register-form" style="width: 1223px;margin-left: 70px;">
        <div class="col-md-8 offset-md-2" style="width: 815.328px;">
            <form class="custom-form" action="../Controller/UserController.php" method="post">
                <h1><strong>تسجيل حساب دار النور و الأمل</strong></h1><br>
                <div class="form-row form-group">
                    <div class="col-sm-6 input-column">
					<input class="form-control" type="text" name="Username" required></div>
                    <div class="col-sm-4 label-column" style="margin-left: 65px;">
					<label class="col-form-label float-right" for="name-input-field">اسم المستخدم</label></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-6 input-column">
					<input class="form-control" type="email" name="Email" required></div>
                    <div class="col-sm-4 label-column" style="margin-left: 65px;">
					<label class="col-form-label float-right" for="email-input-field">عنوان البريد</label></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-6 input-column">
					<input class="form-control" type="password" name="Password" required></div>
                    <div class="col-sm-4 label-column" style="margin-left: 65px;">
					<label class="col-form-label float-right" for="pawssword-input-field">الرقم السري</label></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-6 input-column">
					<input class="form-control" type="password" name="Password_Check" required></div>
                    <div class="col-sm-4 label-column" style="margin-left: 65px;">
					<label class="col-form-label float-right" for="repeat-pawssword-input-field">تأكيد الرقم السري</label></div>
                </div>
                <div class="form-row form-group">
					<div class="col-sm-6 input-column">
					<select class="form-control" name="UserTypeID" required>
						<?php
						require_once("../Model/JobModel.php");
						$JobModel=new JobModel("");
						$result=$JobModel->Select_All_Jobs();
						for($i = 0; $i < count($result); $i++){
							echo "<option value=".$result[$i]->get_ID().">".$result[$i]->get_Name()."</option>";
						}
						?>
					</select>
					</div>
					<div class="col-sm-4 label-column" style="margin-left: 65px;">
						<label class="col-form-label float-right" for="repeat-pawssword-input-field">الوظيفة</label>
					</div>
				</div>
				<div class="form-row form-group">
                    <div class="col-sm-6 input-column">
					<input class="form-control" type="number" name="Employee_ID" required></div>
                    <div class="col-sm-4 label-column">
                </div>
                    <div class="col">
					<label class="col-form-label" for="dropdown-input-field" style="margin-right: 30px;">رقم الموظف</label></div>
                </div>
				
				<label id="register_check_msg" style="float:center; color:red;"></label><br>
				<input class="btn btn-light submit-button" type="submit" name="Register" value ="تسجيل">
			</form>
        </div>
    </div>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<script>
function display_register_error_msg(msg)
{
	var error_label=document.getElementById("register_check_msg");
	// error_label.innerText ="تاكد من تطابق كلمة السر";
	error_label.innerText =msg;
}
</script>

<?php

class RegisterView
{
	public function display_register_error_msg($msg)
	{
		echo "<script>
		display_register_error_msg('$msg');
		</script>";
	}
}
?>