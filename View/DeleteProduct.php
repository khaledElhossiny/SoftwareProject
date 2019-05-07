<?php
if (session_id() == ''){
	session_start();
}
if($_SESSION['ID']=="")
{
header("Location:../View/Login.php");
}
?>
<html>
<style>
#tableBut
{
	width:75px;
	height:30px;
	float:auto;
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
	<h1 class="par">حذف من المخزن</h1>
<!--===============================================================النوع============================================-->
<span class="productName">بحث عن طريق:</span><br>

	<form action="../Controller/ProductController.php" method="post">
		<span class="productName">اسم الصنف</span>
		<input style ="margin-right:50px;"class="option" type="text" name="name" id="name">
		<input class="numbut"type="submit" name="del_search_by_name" value="بحث" style="width:100px;">
	</form>
	
	<form action="../Controller/ProductController.php" method="post">
		<span  class="productName">نوع الصنف</span>
		<select style ="margin-right:43px;" class="option" name="category">
			<?php
				require_once("../Model/ProductCategoryModel.php");
				$CategoryModel=new ProductCategoryModel("");
				$result=$CategoryModel->selectAllCat();
				for($i = 0; $i < count($result); $i++){
					echo "<option value=".$result[$i]->get_ID().">".$result[$i]->get_name()."</option>";
				}
			?>
		</select>
		<input style ="margin-right:66px;width:100px;"class="numbut"type="submit" name="del_search_by_cat" value="بحث">
	</form>
	
	<table id='t01' class='productTable' style='width:100%;'>
	<?php
		class ProductView
		{
			public function displayProduct($result)
			{
				if($result!=null)
				{
					echo "<tr><th>الصنف</th> <th>نوع الصنف</th> <th>#</th> </tr>";
					for($i=0;$i<sizeof($result);$i++)
					{
						echo"<tr>".
							"<td>".$result[$i]->get_product_name()."</td>".
							"<td>".$result[$i]->get_product_CategoryObj()->get_name()."</td>".
							/* "<td><button id='tableBut' name'delete' value=".$result[$i]->get_product_id(). 
							"onclick='action(this.value)'>مسح</button></td>"; */
							"<td><a href='../Controller/ProductController.php?id=".$result[$i]->get_product_id()."' role='button'>مسح</a>";
					}
					echo "</tr></table>";
				}
			}
		}
	?>
    
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

<script>
function action(prodID)
{
	xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log("request finished and response is ready");
                if (this.responseText != "") {
					console.log(this.responseText);
                }
				/* else{
					display_password_error_msg("");
				} */
            }
        }
        xmlHttp.open('GET', 'ApplyProductDelete.php?&prodID='+prodID, true);
        xmlHttp.send();
}
</script>