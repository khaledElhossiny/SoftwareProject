<?php
if (session_id() == ''){
	session_start();
}
if($_SESSION['ID']=="")
{
header("Location:../View/Login.php");
}
class EditView
{
	public function display_edit_error_msg($msg)
	{
		echo "<script>
		display_edit_error_msg('$msg');
		</script>";
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>تعديل المستخدم</title>
    <!-- Tell the browser to be responsive to screen width ------------------------------------------------------------>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
	
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  </head>
  <!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
  <!-- the fixed layout is not compatible with sidebar-mini -->
  <body class="skin-blue fixed sidebar-mini" dir="rtl">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="Home.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">مدام اميرة</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      مدام اميرة
                    </p>
                  </li>
                  <!-- Menu Footer-->
                 <!-- Menu Footer-->
                    <li class="user-body">
                    <div class="col-xs-4 text-center" id="delUserDiv">
					
					<script type="text/javascript" src="DeleteUserAuthentication.js"></script>
                    <a href="DeleteUser.php" id="UserText"> مسح الحساب</a>
					  
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="EditUser.php" id="UserText">تعديل الحساب </a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="Profile.php" id="UserText">بيانات الحساب</a>
                    </div>
                  </li>
                  <li class="user-footer">
                      <div class="col-xlg-4 text-center">
                     <a href="Logout.php" name="logout_but" class="btn btn-primary btn-block btn-lg btn-signin">خروج</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>
        </nav>
      </header>

<!--===================================================================SIDEBAR=================================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>المتحكم</p>
              <a href="#"><i class="fa fa-circle text-success"></i> متاح</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="بحث...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">الملاحة الرئيسية</li>
			<li class="treeview active">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>مستخدمين</span>
              </a>
              <ul id="UserOptions" class="treeview-menu">
                <li><a href="../View/SearchUser.php"><i class="fa fa-circle-o"></i> بحث</a></li>
                <li><a href="../View/Register.php"><i class="fa fa-circle-o"></i> اضافة</a></li>
                <li><a href="../View/EditUser.php"><i class="fa fa-circle-o"></i> تعديل</a></li>
                <li class="active"><a href="../View/DeleteUser.php"><i class="fa fa-circle-o"></i> مسح</a></li>
              </ul>
            </li>
			<li class="treeview active">
				<a href="#">
					<i class="fa fa-files-o"></i>
					<span>المخزن</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="../View/SearchProduct.php"><i class="fa fa-circle-o"></i> بحث</a></li>
					<li><a href="../View/AddProduct.php"><i class="fa fa-circle-o"></i> اضافة</a></li>
					<li><a href="../View/EditProduct.php"><i class="fa fa-circle-o"></i> تعديل</a></li>
					<li><a href="../View/DeleteProduct.php"><i class="fa fa-circle-o"></i> مسح</a></li>
				  </ul>
            </li>
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>مقيمين</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="../View/SearchResident.php"><i class="fa fa-circle-o"></i> بحث</a></li>
                <li><a href="../View/AddResident.php"><i class="fa fa-circle-o"></i> اضافة</a></li>
                <li><a href="../View/EditResident.php"><i class="fa fa-circle-o"></i> تعديل</a></li>
                <li class="active"><a href="../View/DeleteResident.php"><i class="fa fa-circle-o"></i> مسح</a></li>
              </ul>
            </li>
			<li class="treeview active">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>متبرعين</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="../View/SearchContributor.php"><i class="fa fa-circle-o"></i> بحث</a></li>
                <li><a href="../View/AddContributor.php"><i class="fa fa-circle-o"></i> اضافة</a></li>
                <li><a href="../View/EditContributor.php"><i class="fa fa-circle-o"></i> تعديل</a></li>
                <li class="active"><a href="../View/DeleteContributor.php"><i class="fa fa-circle-o"></i> مسح</a></li>
              </ul>
            </li>
            
<!--=========================================================END SIDEBAR======================================================-->
              </aside>
            <div class="content-wrapper">
                <h1 class="par" style="margin-right:35%;">تعديل بيانات المستخدم</h1>
<!--===============================================================النوع============================================-->
	<!--form action="../Controller/upload_img_to_server.php" method="get" enctype="multipart/form-data">
		<img style="border-radius:100%; width:100px; margin-right:7%;"
		src="../bootstrap/img/avatar_2x.png" class="profile-img-card" id="ProfileImg"><br><br>
		<span class="productName" style="float:auto;">الصورة الشخصية</span>
		<input type="submit" name="Save_Profile_Img" style="float:auto;" value="حفظ الصورة">
		<label id="check_img" style="float:center; color:red;">dfsjdsdfs</label><br>
		<input class="number" type="file" name="ProfileImg" id="file_name" required>
	</form--><br><br>
	
	<?php
		require_once("../Model/UserModel.php");
		$result=$UserModel=new UserModel($_SESSION['User_ID']);
	?>
	<form action="../Controller/UserController.php" method="post">
		<span class="productName"style="margin-left:165px;">الاسم</span>
		<input class="text" type="text" name="Username" value="<?php echo $_SESSION['Username']; ?>" required><br><br>
		
		<span class="productName"style="margin-left:60px;">كلمة السر الحالية</span>
		<input class="text" type="password" name="OldPassword" onchange="check_password(this.value);" required>
		<label id="password_check_msg" style="float:center; color:red;"></label><br><br>
		
		<span class="productName"style="margin-left:55px;">كلمة السر الجديدة</span>
		<input class="text" type="password" name="Password" required><br><br>
		
		<span class="productName" style="margin-left:10px;">تأكيد كلمة السر الجديدة</span>
		<input class="text" type="password" name="RepeatPassword" required>
		<label id="edit_check_msg" style="float:auto; color:red;"></label><br><br>
		
		<span class="productName" style="margin-left:70px;"> البريد الاكتروني</span>
		<input class="text" type="text" name="Email" value="<?php echo $_SESSION['Email'] ?>" required><br><br>
		
		<input style="width:100px; margin-top:50px; margin-right:45%;" class="numbut"type="submit" name="EditUser" 
		style="float:auto;" value="حفظ التعديل" id="SaveEdit">
    </form>
<!--===========================================================END FORM===============================================================-->
      <!-- Control Sidebar -->
      
          
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
  </body>
</html>

<script>
/* function check_img(imgPath)
{
	xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function () {
            if(this.readyState==0)
            {
                console.log("request not initialized ");
            }
            else if(this.readyState==1)
            {
                console.log("server connection established ");
            }
            else if(this.readyState==2)
            {
                console.log("request received ");
            }
            else if(this.readyState==3)
            {
                console.log("processing request  ");
            }
            else
            if (this.readyState == 4 && this.status == 200) {
                console.log("request finished and response is ready");
                if (this.responseText != "") {
                    var msg_label=document.getElementById("check_img").innerHTML = this.responseText;
                }
                console.log("fsdfsfs"+this.responseText);
            }
        }
        xmlHttp.open('GET', '../Controller/Check_Image.php?img='+imgPath, true);
        xmlHttp.send();
} */

/* function change_img(Img)
{
	var fileName=document.getElementById("file_name").files[0].fullPath; 
	var ImgPath = Img.replace("C:\\fakepath\\", fileName);
	var img=document.getElementById("ProfileImg").src=ImgPath;
	// img.setAttribute("src",ImgPath);
	console.log(ImgPath);
} */
</script>

<script>
function display_edit_error_msg(msg)
{
	var error_label=document.getElementById("edit_check_msg");
	// error_label.innerText ="تاكد من تطابق كلمة السر";
	error_label.innerText =msg;
}

function check_password(password)
{
	xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                //console.log("request finished and response is ready");
                if (this.responseText != "") {
					display_password_error_msg(this.responseText);
                }
				else{
					display_password_error_msg("");
				}
            }
        }
        xmlHttp.open('GET', '../Controller/UserController.php?pass_check='+password, true);
        xmlHttp.send();
}

function display_password_error_msg(msg)
{
	var error_label=document.getElementById("password_check_msg");
	if(msg!="")
	{
		document.getElementById("SaveEdit").disabled=true;
		error_label.innerText =msg;
	}
	else{
		error_label.innerText =' ';
		document.getElementById("SaveEdit").disabled=false;
	}
}
</script>