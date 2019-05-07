<?php
require_once("../Public/Database/DB.php");
class ProductTypeAttributeChoiceModel
{
	//cant put the expiry date value on the prod category bec some products have expiry date and some havent so EAV is with prod
	private $ID,$Product_ID,$Product_Type_Attribute_ID,$Is_Deleted;
	
	/********************************************SETTERS*********************************/
    public function set_ID($ID){$this->ID=$ID;}
	public function set_Product_ID($Product_ID){$this->Product_ID=$Product_ID;}
	public function set_Product_Type_Attribute_ID($Product_Type_Attribute_ID){$this->Product_Type_Attribute_ID=$Product_Type_Attribute_ID;}
	/********************************************GETTERS*********************************/
	public function get_ID(){return$this->ID;}
	public function get_Product_ID(){return $this->Product_ID;}
	public function get_Product_Type_Attribute_ID(){return $this->Product_Type_Attribute_ID;}
	public function get_Is_Deleted(){return $this->Is_Deleted;}
	
	/********************************************FUNCTIONS*********************************/
	public function __construct($id)
	{
		if($id!="")
		{
			$sql="SELECT * FROM `product_type_attribute_choice` WHERE ID= ".$id;
			$result=Database::get_instance()->execute($sql);
			while($row=mysqli_fetch_array($result))
			{
				$this->ID=$id;
				$this->Product_ID=$row['Product_ID'];
				$this->Product_Type_Attribute_ID=$row['Product_Type_Attribute_ID'];
				$this->Is_Deleted=$row['Is_Deleted'];
			}
		}
	}
	
	public function Select_All_Attribute_Choices()
	{
		$sql="SELECT * FROM `product_type_attribute_choice` WHERE Product_Type_Attribute_ID=".$this->Product_Type_Attribute_ID;
		$result=Database::get_instance()->execute($sql);
		$i=0;
		$ObjArray=null;
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new ProductTypeAttributeChoiceModel($row["ID"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
		return $ObjArray;
	}
	public function search_by_ProductCategory_ID()
	{
		$sql="SELECT * FROM `product_type_attribute_choice` WHERE Product_ID=".$this->Product_ID;
		$result=Database::get_instance()->execute($sql);
		$MyObj= new ProductTypeAttributeChoiceModel(mysqli_fetch_array($result)['ID']);
		return $MyObj;
	}
	public function Add()
	{
		$sql="INSERT INTO `product_type_attribute_choice` (`Product_ID`, `Product_Type_Attribute_ID`, `Is_Deleted`) 
		VALUES (".$this->Product_ID.",".$this->Product_Type_Attribute_ID.", 0)";
		Database::get_instance()->execute($sql);
	}
	
	public function Edit()
	{
		$sql="UPDATE `product_type_attribute_choice` SET `Product_ID`=".$this->Product_ID.",`Product_Type_Attribute_ID`=
		".$this->Product_Type_Attribute_ID." WHERE `ID`= ".$this->ID."";
        Database::get_instance()->execute($sql);
	}
	
	public function Del()
    {
        $sql="UPDATE `product_type_attribute_choice` SET `Is_Deleted`=1 WHERE `ID`= ".$this->ID."";
		Database::get_instance()->execute($sql);
    }
}
?>