<?php
require_once("../Public/Database/DB.php");
class Inventory_Income_Type_Model
{
	private $ID,$Type;
	
	/********************************************SETTERS*********************************/
    public function setIncomeID($ID){$this->ID=$ID;}
	public function setIncomeType($Type){$this->Type=$Type;}

	/********************************************GETTERS*********************************/
	
    public function getIncomeID(){return $this->ID;}
	public function getIncomeType(){return $this->Type;}
	
	/********************************************FUNCTIONS*********************************/
	public  function __construct($id)
	{
		if($id!="")
		{
		  $sql="Select * from inventory_income_type where ID=$id";
		  $result=Database::get_instance()->execute($sql);
		  while($row=mysqli_fetch_array($result))
		  {
			$this->ID=$id;
			$this->Type=$row['Type'];
		  }
		}
	}
	public function addType()
	{
		$sql="INSERT INTO `inventory_income_Type`(`Type`) VALUES ('".$this->Type."')";
		Database::get_instance()->execute($sql);
	}
	public function Select_All_Inventory_Model()
	{
		$sql="SELECT * FROM `inventory_income_table`";
		$result=Database::get_instance()->execute($sql);
		$i=0;
		$ObjArray;
		while ($row = mysqli_fetch_array($result))
		{
		$MyObj= new Inventory_Income_Model($row["ID"]);
		$ObjArray[$i]=$MyObj;
		$i++;
		}
		return $ObjArray;
	}
    public function Edit()
	{
		$sql="UPDATE `inventory_income_type` SET `Type`=".$this->Type." WHERE ".$this->ID;
		Database::get_instance()->execute($sql);
	}
    public function DelType()
	{
		$sql="DELETE FROM `inventory_income_type` WHERE ".$this->ID;
		Database::get_instance()->execute($sql);
	}
}
?>
