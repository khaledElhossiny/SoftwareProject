<?php
require_once("../Public/Database/DB.php");
class ProductCategoryModel
{
  private $ID;
  private $Name;
  private $Is_Deleted;
  /*****************************************************SETTERS***************************************/
  public function set_product_id($id)
  {
	  $this->ID=$id;
  }
  public function set_category_name($name)
  {
	  $this->Name=$name;
  }
  public function set_Is_Deleted($Is_Deleted)
  {
	  $this->Is_Deleted=$Is_Deleted;
  }
  /*****************************************************GETTERS***************************************/
  public function get_ID()
  {
	  return $this->ID;
  }
  public function get_name()
  {
	  return $this->Name;
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
			$sql="SELECT * FROM `product_category` WHERE ID= ".$id;
			$result=Database::get_instance()->execute($sql);
			while($row=mysqli_fetch_array($result))
			{
				$this->ID=$id;
				$this->Name=$row['Name'];
				$this->Is_Deleted=$row['Is_Deleted'];
			}
		}
  }
  public function Insert_product_category()
  {
    $sql="INSERT INTO `product_category`(`Name`,`Is_Deleted`) VALUES ('".$this->Name."',0)";
	$result=Database::get_instance()->execute($sql);
 }
	public function selectAllCat()
	{
		$sql="SELECT * FROM `product_category`";
		$result=Database::get_instance()->execute($sql);
		$i=0;
		$ObjArray;
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new ProductCategoryModel($row["ID"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
		return $ObjArray;
	}
	public function editProduct()
	{
		$sql="UPDATE `product_category` SET `Name`='".$this->Name."' where ID=$this->ID";
		Database::get_instance()->execute($sql);
	}
	public function delProduct()
	{
		$sql="UPDATE `product_category` SET `Is_Deleted`=1 where ID=$this->ID";
		Database::get_instance()->execute($sql);
	}
}
?>
