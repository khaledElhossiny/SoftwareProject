<?php
require_once("../Public/Database/DB.php");
require_once("JobModel.php");
require_once("PersonModel.php");
class EmployeeModel extends PersonModel
{
  private $ID;
  private $Job_ID;
  private $JobObj;
  private $Salary;
  private $Recruitment_Date;
  private $Person_ID;

  /*****************************************************SETTERS***************************************/
  public function set_id($id)
  {
	  $this->ID=$id;
  }
  public function set_Job_ID($Job_ID)
  {
	  $this->Job_ID=$Job_ID;
  }
  public function set_Salary($Salary)
  {
	  $this->Salary=$Salary;
  }
  public function set_Recruitment_Date($Recruitment_Date)
  {
	  $this->Recruitment_Date=$Recruitment_Date;
  }
  public function set_Person_ID($Person_ID)
  {
	  $this->Person_ID=$Person_ID;
  }
  
  
  /*****************************************************GETTERS***************************************/
  public function get_id()
  {
	  return $this->ID;
  }
  public function get_Job_ID()
  {
	  return $this->Job_ID;
  }
  public function get_Salary()
  {
	  return $this->Salary;
  }
  public function get_Recruitment_Date()
  {
	  return $this->Recruitment_Date;
  }
  public function get_Person_ID()
  {
	  return $this->Person_ID;
  }
  public function get_JobObj()
  {
	  return $this->JobObj;
  }
  /****************************************************************FUNCTIONS************************************/
  public function __construct($id)
  {
    if($id!="")
	  {
		  $sql="Select * from employee where id=".$id;
		  /* $DBObject=new Database();
		  $result=$DBObject->execute($sql); */
		  $result=Database::get_instance()->execute($sql);
		  while($row=mysqli_fetch_array($result))
		  {
			  $this->ID=$id;
			  $this->Job_ID=$row['Job_ID'];
			  $this->Salary=$row['Salary'];
			  $this->Recruitment_Date=$row['Recruitment_Date'];
			  $this->Person_ID=$row['Person_ID'];
		  }
		  $this->JobObj=new JobModel($this->Job_ID);
		  //$this->PersonObj=new PersonModel($this->Person_ID);
		  parent::__construct($this->Person_ID);
	  }
  }
  public function Insert_Employee(){
      $sql="INSERT INTO `employee`(`Job_ID`,`Salary`,`Recruitment_Date`,`Person_ID`)
	VALUES (".$this->Job_ID.",".$this->Salary.",'".$this->Recruitment_Date."',".$this->Person_ID.")";
	  echo $sql;
	  /*$DatabaseObject = new Database();
	  $DatabaseObject->execute($sql);*/
	  Database::get_instance()->execute($sql);
  }
  public function edit_Employee()
  {
	  $sql="UPDATE `employee` SET `Job_ID`='".$this->Job_ID."',`Salary`='".$this->Salary."',`Recruitment_Date`='".$this->Recruitment_Date."',`Person_ID`='".$this->Person_ID."' WHERE ID= ".$this->ID."";
	  echo $sql;
	  /*$DatabaseObject = new Database();
	  $DatabaseObject->execute($sql);*/
	  Database::get_instance()->execute($sql);
  }
  public function Search_In_Employee()
  {
	  $sql="SELECT * FROM employee WHERE ID= ".$this->ID." ";
	  echo $sql;
	  /*$DatabaseObject= new Database();
	  $result=$DatabaseObject->execute($sql);*/
	  $result=Database::get_instance()->execute($sql);
	  return $result;
      
  }
  public function Select_All_Emplyees()
  {
      
	  $sql="SELECT * FROM `employee`";
	  /*$DatabaseObject= new Database();
	  $result=$DatabaseObject->execute($sql);*/
	  $result=Database::get_instance()->execute($sql);
      $i=0;
		$ObjArray;
		while ($row = mysql_fetch_array($result))
		{
			$MyObj= new EmployeeModel($row["ID"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
	  return $ObjArray;
  }
    public function del_Employee()
    {
        $sql="DELETE FROM `employee` WHERE `ID`= ".$this->ID."";
        echo $sql;
        /*$DBConnect=new Database();
        $DBConnect->execute($sql);*/
		Database::get_instance()->execute($sql);
    }
  }
  
?>
