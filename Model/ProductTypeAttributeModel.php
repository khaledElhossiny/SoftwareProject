<?php
require_once("../Public/Database/DB.php");
class ProductTypeAttributeModel
{
	private $ID,$Attribute_Name,$Is_Deleted;
	
	/********************************************SETTERS*********************************/
    public function set_Attribute_ID($ID){$this->ID=$ID;}
	public function set_Attribute_Name($Attribute_Name){$this->Attribute_Name=$Attribute_Name;}
	/********************************************GETTERS*********************************/
    public function get_Attribute_ID(){return $this->ID;}
	public function get_Attribute_Name(){return $this->Attribute_Name;}
	public function get_Is_Deleted(){return $this->Is_Deleted;}
	/********************************************FUNCTIONS*********************************/
	public function __construct($id)
	{
		if($id!="")
		{
			$sql="SELECT * FROM `product_type_attribute` WHERE ID= ".$id;
			$result=Database::get_instance()->execute($sql);
			while($row=mysqli_fetch_array($result))
			{
				$this->ID=$id;
				$this->Attribute_Name=$row['Attribute_Name'];
				$this->Is_Deleted=$row['Is_Deleted'];
			}
		}
	}
	
	public function Select_All_Attributes()
	{
		$sql="SELECT * FROM `product_type_attribute`";
		$result=Database::get_instance()->execute($sql);
		$i=0;
		$ObjArray;
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new ProductTypeAttributeModel($row["ID"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
		return $ObjArray;
	}
	
	public function AddTypeAttribute()
	{
		$sql="INSERT INTO `product_type_attribute` (`Attribute_Name`, `Is_Deleted`) 
		VALUES ('".$this->Attribute_Name."',0)";
		Database::get_instance()->execute($sql);
	}
	
	public function EditTypeAttribute()
	{
		$sql="UPDATE `product_type_attribute` SET `Attribute_Name`='".$this->Attribute_Name."' WHERE `ID`= ".$this->ID."";
        Database::get_instance()->execute($sql);
	}
	
	public function DelTypeAttribute()
    {
        $sql="UPDATE `product_type_attribute` SET `Is_Deleted`=1 WHERE `ID`= ".$this->ID."";
		Database::get_instance()->execute($sql);
    }
}
?>