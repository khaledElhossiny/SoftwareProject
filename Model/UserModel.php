<?php
require_once("../Public/Database/DB.php");
require_once("UserTypeModel.php");
require_once("EmployeeModel.php");
class UserModel extends EmployeeModel
{
  private $ID;
  private $Username;
  private $Password;
  private $Email;
  private $User_Type_ID;
  private $UserTypeObj;
  private $Employee_ID;
  private $EmployeeObj;
  private $Is_Deleted;
  
  /*****************************************************SETTERS***************************************/
  public function set_id($id)
  {
	  $this->ID=$id;
  }
  public function set_Username($Username)
  {
	  $this->Username=$Username;
  }
  public function set_Password($Password)
  {
	  $this->Password=$Password;
  }
  public function set_User_Type_ID($UserTypeID)
  {
	  $this->User_Type_ID=$UserTypeID;
  }
  public function set_Email($Email)
  {
	  $this->Email=$Email;
  }
  public function set_Employee_ID($Employee_ID)
  {
	  $this->Employee_ID=$Employee_ID;
  }
  public function set_Is_Deleted($Is_Deleted)
  {
	  $this->Is_Deleted=$Is_Deleted;
  }
  /*****************************************************GETTERS***************************************/
  public function get_id()
  {
	  return $this->ID;
  }
  public function get_Username()
  {
	  return $this->Username;
  }
  public function get_Password()
  {
	  return $this->Password;
  }
  public function get_UserTypeObj()
  {
	  return $this->UserTypeObj;
  }
  public function get_User_Type_ID()
  {
	  return $this->User_Type_ID;
  }
  public function get_Email()
  {
	  return $this->Email;
  }
  public function get_Employee_ID()
  {
	  return $this->Employee_ID;
  }
  public function get_EmployeeObj()
  {
	  return $this->EmployeeObj;
  }
  public function get_Is_Deleted()
  {
	  return $this->Is_Deleted;
  }
  /****************************************************************FUNCTIONS************************************/
  public function __construct($id)
  {
	  if($id!="")
	  {
		  $sql="SELECT * FROM `user` WHERE ID= ".$id;
		  $result=Database::get_instance()->execute($sql);
		  while($row=mysqli_fetch_array($result))
		  {
			  $this->ID=$id;
			  $this->Username=$row['Username'];
			  $this->Password=$row['Password'];
			  $this->Email=$row['Email'];
			  $this->User_Type_ID=$row['User_Type_ID'];
			  $this->Employee_ID=$row['Employee_ID'];
			  $this->Is_Deleted=$row['Is_Deleted'];
		  }
		  $this->UserTypeObj=new UserTypeModel($this->User_Type_ID);
		  parent::__construct($this->Employee_ID); //init parent constructor
	  }
  }
  
  public function Search_By_Username()
  {
	  $sql="SELECT * FROM `user` WHERE Username= '".$this->Username."'";
	  $result=Database::get_instance()->execute($sql);
		// while($row=mysqli_fetch_array($result))
		if(mysqli_num_rows($result)>=1)
		{
			$row=mysqli_fetch_array($result);
			$MyObj=new UserModel($row['ID']);
			return $MyObj;
		}
  }
  public function Register() //password hashing is done here
  {
	  $sql="INSERT INTO `user`(`Username`, `Password`, `Email`, `User_Type_ID`, `Employee_ID`,`Is_Deleted`)
	  VALUES ('".$this->Username."',sha1('".$this->Password."'),'".$this->Email."',".$this->User_Type_ID.",".$this->Employee_ID.",0)";
	  Database::get_instance()->execute($sql);
  }
  public function Edit()
  {
	 $this->Is_Deleted=0;
	 $sql="UPDATE `user` SET `Username`='".$this->Username."',`Password`='".sha1($this->Password)."',`Email`='".$this->Email."'
	 WHERE ID=".$this->ID;
	 Database::get_instance()->execute($sql);
  }
  public function Del()
  {
	$sql="UPDATE `user` SET `Is_Deleted`= 1 WHERE ID=".$this->ID;
	Database::get_instance()->execute($sql);
  }
  public function Login() //check for username and password existance in DB
  {
	  $sql="SELECT * FROM `user` WHERE Username='".$this->Username."' and Password='".sha1($this->Password)."'";
      /*$DatabaseObject= new Database();
      $result=$DatabaseObject->execute($sql);*/
	  //echo $sql;
	  $result=Database::get_instance()->execute($sql);
      if($result!=null)
	  {
		  while($row=mysqli_fetch_array($result))
		  {
			  $UserObj=new UserModel($row['ID']);
			  return $UserObj;
		  }
	  }
	  else return null;
  }
}
//SELECT * FROM user WHERE Username='admin' AND Password='' or 'a'='a'
?>
