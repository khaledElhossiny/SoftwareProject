<?php
require_once("../Public/Database/DB.php");
class Inventory_Income_Comment_Model
{
  private $ID,$Inventory_Income_ID,$Comment;
  /*****************************************************SETTERS***************************************/
  public function set_id($id)
  {
	  $this->ID=$id;
  }
  public function set_Inventory_Income_ID($Inventory_Income_ID)
  {
	  $this->Inventory_Income_ID=$Inventory_Income_ID;
  }
  public function set_Comment($Comment)
  {
	  $this->Comment=$Comment;
  }
  
  /*****************************************************GETTERS***************************************/
  public function get_id()
  {
	  return $this->ID;
  }
  public function get_Inventory_Income_ID()
  {
	  return $this->Inventory_Income_ID;
  }
  public function get_Comment()
  {
	  return $this->Comment;
  }
  /****************************************************************FUNCTIONS************************************/
    public function __construct($id)
	{
		if($id!="")
		{
		  $sql="Select * from inventory_income_comments where id=$id";
		  $result=Database::get_instance()->execute($sql);
		  while($row=mysqli_fetch_array($result))
		  {
			$this->ID=$id;
			$this->Inventory_Income_ID=$row['Inventory_Income_ID']; 
			$this->Comment=$row['Comment']; 
		  }
		}
	} 
    
	public function Search_Comments()
	{
	  $sql="SELECT * FROM `inventory_income_comments` WHERE `ID`=".$this->ID;
	  $result=Database::get_instance()->execute($sql);
	  $MyObj= new Inventory_Income_Comment_Model(mysqli_fetch_array($result)["ID"]);
	  return $MyObj;
	}
	public function Insert_Comment(){
      $sql="INSERT INTO `inventory_income_comments`(`Inventory_Income_ID`, `Comment`)
	  VALUES ([value-2],[value-3])";
	  Database::get_instance()->execute($sql);
	}
	public function Edit_Comment()
	{
	  $sql="UPDATE `inventory_income_comments` SET `Comment`='".$this->Comment."' WHERE `Inventory_Income_ID`=".$this->Inventory_Income_ID;
	  Database::get_instance()->execute($sql);
	}
    public function Delete_Comment()
    {
        $sql="DELETE FROM `inventory_income_comments` WHERE `Inventory_Income_ID`=".$this->Inventory_Income_ID;
        Database::get_instance()->execute($sql);
    }
  }

?>
