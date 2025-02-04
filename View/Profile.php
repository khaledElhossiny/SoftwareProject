<?php
if (session_id() == ''){
	session_start();
}
if($_SESSION['ID']=="")
{
header("Location:../View/Login.php");
}
?>
<!DOCTYPE html>
<html>
<style>
#header {
color: #3c8dbc;
font-family: "Times New Roman", Times, serif;
font-size: 250%;
width: -50%;
}
#simple {
color: black;
font-family: "Times New Roman", Times, serif;
font-size: 160%;
}
#con{
  width: 100%;
  height: 20px;
  padding: 50px 50px;
}
</style>
  <head>
    <meta charset="UTF-8">
    <title>الرئيسية</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
	
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
	</style>
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
          <!--span class="logo-mini"><b>A</b>LT</span-->
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>لوحة التحكم</b></span>
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
<!--===================================================================PAGE CONTENT=================================================== -->
<div class="content-wrapper">
	<div id="con">
	  <div>
	  <label id="header" class="Name">اسم المستخدم</label><br>
	  <label id="simple" class="Name"><?php echo $_SESSION['Username'];?></label>
	  </div>
	  
	  <div>
	  <label id="header" class="age">السن</label><br>
	  <label  id="simple" class="age"><?php echo $_SESSION['Age'];?></label>
	  </div>
	  
	  <div>
	  <label id="header" class="tele">رقم التلفون</label><br>
	  <label  id="simple" class="tele"><?php echo $_SESSION['Mobile'];?></label>
	  </div>
	  
	  <div>
	  <label id="header" class="address">العنوان</label><br>
	  <label  id="simple" class="address"><?php echo $_SESSION['Address'];?></label>
	  </div>
	</div>
</div>	
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
              <p><?phpecho $_SESSION['Username'];?></p>
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

<!--script>
function createTable()
{
  var eTable="<li><a href='../View/SearchUser.php'><i class='fa fa-circle-o'></i> do something </a></li>";
  $('#UserOptions').append(eTable);
}

for(var i=0;i<3;i++)
{
	createTable();
}
</script-->
