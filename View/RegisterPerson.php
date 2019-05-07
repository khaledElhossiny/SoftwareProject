<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
    <title>RegisterPerson</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="../bootstrap/css/styles.css">
</head>

<body>
    <div class="row register-form" style="width: 1223px;margin-left: 70px;">
        <div class="col-md-8 offset-md-2" style="width: 815.328px;">
            <form class="custom-form" action="../Controller/PersonController.php" method="post">
                <h1><br><strong>تسجيل دار النور و الأمل</strong><br></h1>
                <div class="form-row form-group">
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="Nat_ID" required></div>
                    <div class="col-sm-4 label-column" style="margin-left: 65px;"><label class="col-form-label float-right" for="name-input-field">الرقم القومي</label></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="Name" required></div>
                    <div class="col-sm-4 label-column" style="margin-left: 65px;"><label class="col-form-label float-right" for="email-input-field">الإسم</label></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-6 input-column"><input class="form-control" type="date" name="Age" required></div>
                    <div class="col-sm-4 label-column" style="margin-left: 65px;"><label class="col-form-label float-right" for="pawssword-input-field">تاريخ الميلاد</label></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="Mobile" required></div>
                    <div class="col-sm-4 label-column" style="margin-left: 65px;"><label class="col-form-label float-right" for="repeat-pawssword-input-field">رقم الهاتف</label></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-6 input-column"><input class="form-control" type="number" name="Salary" required></div>
                    <div class="col-sm-4 label-column" style="margin-left: 65px;"><label class="col-form-label float-right" for="repeat-pawssword-input-field">المرتب</label></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-6 input-column"><input class="form-control" type="date" name="Date" required></div>
                    <div class="col-sm-4 label-column" style="margin-left: 65px;"><label class="col-form-label float-right" for="repeat-pawssword-input-field">تاريخ التوظيف</label></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-6 input-column">
					<select class="form-control" name="AddressID" id="AddressID" required>
						<optgroup label="This is a group">
							<option value="1" selected="">الاسكندرية</option>
							<option value="2">القاهرة</option>
							<option value="3">الفيوم</option>
						</optgroup>
					</select>
					</div>
                    <div class="col-sm-4 label-column" style="margin-left: 65px;">
					<label class="col-form-label float-right" for="repeat-pawssword-input-field">محل الإقامة</label></div>
        </div>
        <div class="form-row form-group">
            <div class="col-sm-6 input-column">
			<select class="form-control" name="Job_ID">
				<optgroup label="This is a group">
					<!--?php
						require_once("../Controller/JobController.php");
						$JobControllerObject=new JobController();
						$result=$JobControllerObject->Select_All_Jobs();
						for($i=0;$i<count($result);$i++)
							echo "<option name= 'category' value='".$result[$i]->get_ID()."'> '".$result[$i]->get_Name()."'</option>";
						?-->
						<option value="1" selected="">إداري</option>
						<option value="2">مشرفة</option>
						<option value="3">عاملة</option>
				</optgroup>
			</select>
			</div>
            <div class="col-sm-4 label-column" style="margin-left: 65px;">
				<label class="col-form-label float-right" for="repeat-pawssword-input-field">الوظيفة</label>
			</div>
		</div>
	<input class="btn btn-light submit-button" type="submit" name="Register" value ="تسجيل">
	</form>
    </div>
    </div>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>