<?php
require_once("../Public/Database/DB.php");
require_once("Inventory_Income_Type_Model.php");
class Inventory_Income_Model
{
  private $ID;
  private $Income_Source_Name;
  private $Receipt_No;
  private $Rcp_Date;
  private $Income_Type_ID;
  private $IncomeTypeObj;
  /*****************************************************SETTERS***************************************/
  public function set_id($id)
  {
	  $this->ID=$id;
  }
  public function set_Income_Source_Name($Income_Source_Name)
  {
	  $this->Income_Source_Name=$Income_Source_Name;
  }
  public function set_Receipt_No($Receipt_No)
  {
	  $this->Receipt_No=$Receipt_No;
  }
  public function set_Rcp_Date($Rcp_Date)
  {
	  $this->Rcp_Date=$Rcp_Date;
  }
    public function set_Income_Type_ID($Income_Type_ID)
  {
	  $this->Income_Type_ID=$Income_Type_ID;
  }
  
  /*****************************************************GETTERS***************************************/
  public function get_id()
  {
	  return $this->ID;
  }
  public function get_Income_Source_Name()
  {
	  return $this->Income_Source_Name;
  }
  public function get_Receipt_No()
  {
	  return $this->Receipt_No;
  }
  public function get_Rcp_Date()
  {
	  return $this->Rcp_Date;
  }
    public function get_Income_Type_ID()
  {
	  return $this->Income_Type_ID;
  }
    public function get_IncomeTypeObj()
  {
	  return $this->IncomeTypeObj;
  }
  /****************************************************************FUNCTIONS************************************/
    public  function __construct($id)
  {
	  if($id!="")
	  {
		  $sql="Select * from inventory_income_table where id=$id";
		  $result=Database::get_instance()->execute($sql);
		  while($row=mysqli_fetch_array($result))
		  {
			  $this->ID=$id;
			  $this->Income_Source_Name=$row['Income_Source_Name'];
			  $this->Receipt_No=$row['Receipt_No'];
			  $this->Rcp_Date=$row['Rcp_Date'];
			  $this->Income_Type_ID=$row['Income_Type_ID'];
		  }
		  $this->IncomeTypeObj=new Inventory_Income_Type_Model($this->Income_Type_ID);
	  }
  } 
    
  public function Insert_To_Inventory(){
    $sql="INSERT INTO `inventory_income_table`(`Income_Source_Name`, `Receipt_No`, `Rcp_Date`, `Income_Type_ID`)
	VALUES ('".$this->Income_Source_Name."',".$this->Receipt_No.",'".$this->Rcp_Date."',".$this->Income_Type_ID.")";
	Database::get_instance()->execute($sql);
  }
  public function Edit_Inventory()
  {
	$sql="UPDATE `inventory_income_table` SET `Income_Source_Name`='".$this->Income_Source_Name."',`Receipt_No`=".$this->Receipt_No.",
	   `Rcp_Date`='".$this->Rcp_Date."',`Income_Type_ID`=".$this->Income_Type_ID." WHERE ID= ".$this->ID."";
	Database::get_instance()->execute($sql);
  }
  public function Search_In_Inventory()
  {
	$sql="SELECT * FROM inventory_income_table WHERE Receipt_No= ".$this->Receipt_No.",'".$this->Rcp_Date."' ";
	$result=Database::get_instance()->execute($sql);
	$MyObj= new Inventory_Income_Model(mysqli_fetch_array($result)["ID"]);
	return $MyObj;  
  }
  public function Select_All_Inventory_Model()
  {
	$sql="SELECT * FROM `inventory_income_table`";
	$result=Database::get_instance()->execute($sql);
	$i=0;
	$ObjArray;
	while ($row = mysql_fetch_array($result))
	{
	$MyObj= new Inventory_Income_Model($row["ID"]);
	$ObjArray[$i]=$MyObj;
	$i++;
	}
	return $ObjArray;
  }
  
  //class has no delete for bussiness rules data consistency reasons
  }

?>
