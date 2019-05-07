<?php
require_once("../Public/Database/DB.php");
require_once("../Model/ProductTypeAttributeChoiceModel.php");
class ProductTypeAttributeValueModel
{
	private $ID,$product_type_attribute_choice_ID,$Value,$Is_Deleted;
	
	/********************************************SETTERS*********************************/
    public function set_ID($ID){$this->ID=$ID;}
	public function set_product_type_attribute_choice_ID($product_type_attribute_choice_ID)
	{
		$this->product_type_attribute_choice_ID=$product_type_attribute_choice_ID;
	}
	public function set_Value($Value){$this->Value=$Value;}
	
	/********************************************GETTERS*********************************/
    public function get_ID(){return $this->ID;}
	public function get_product_type_attribute_choice_ID(){return $this->product_type_attribute_choice_ID;}
	public function get_Value(){return $this->Value;}
	public function get_Is_Deleted(){return $this->Is_Deleted;}
	/********************************************FUNCTIONS*********************************/
	public function __construct($id)
	{
		if($id!="")
		{
			$sql="SELECT * FROM `product_type_attribute_value` WHERE ID= ".$id;
			$result=Database::get_instance()->execute($sql);
			while($row=mysqli_fetch_array($result))
			{
				$this->ID=$id;
				$this->product_type_attribute_choice_ID=$row['Product_Type_Attribute_Choice_ID'];
				$this->Value=$row['Value'];
				$this->Is_Deleted=$row['Is_Deleted'];
			}
		}
	}
	
	public function Select_All_Attribute_Values()
	{
		$sql="SELECT * FROM `product_type_attribute_value`";
		$result=Database::get_instance()->execute($sql);
		$i=0;
		$ObjArray;
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new ProductTypeAttributeValueModel($row["ID"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
		return $ObjArray;
	}
	public function search_by_AttributeChoice_ID()
	{
		$sql="SELECT * FROM `product_type_attribute_value` WHERE Product_Type_Attribute_Choice_ID=".$this->product_type_attribute_choice_ID;
		$result=Database::get_instance()->execute($sql);
		$MyObj= new ProductTypeAttributeValueModel(mysqli_fetch_array($result)['ID']);
		return $MyObj;
	}
	public function AddAttributeValue()
	{
		$sql="INSERT INTO `product_type_attribute_value`(`Product_Type_Attribute_Choice_ID`, `Value`, `Is_Deleted`) 
		VALUES (".$this->Product_Type_Attribute_Choice_ID.",".$this->Value.", 0)";
		Database::get_instance()->execute($sql);
	}
	
	public function EditAttributeValue()
	{
		$sql="UPDATE `product_type_attribute_value` SET `Product_Type_Attribute_Choice_ID`=".$this->Product_Type_Attribute_Choice_ID.
		",`Value`=".$this->Value." WHERE ID=".$this->ID;
        Database::get_instance()->execute($sql);
	}
	
	public function DelAttributeValue()
    {
        $sql="UPDATE `product_type_attribute_value` SET `Is_Deleted`=1 WHERE ID=".$this->ID;
		Database::get_instance()->execute($sql);
    }
}
?>