<?php
require_once("../Public/Database/DB.php");
require_once("../Model/ProductCategoryModel.php");
class ProductModel
{
  private $ID;
  private $Name;
  private $Category_ID;
  private $Is_Deleted;
  private $CategoryObj;
  /*****************************************************SETTERS***************************************/
  public function set_product_id($id)
  {
	  $this->ID=$id;
  }
  public function set_product_name($name)
  {
	  $this->Name=$name;
  }
  public function set_category_ID($Category_ID)
  {
	  $this->Category_ID=$Category_ID;
  }
  public function set_Is_Deleted($Is_Deleted)
  {
	  $this->Is_Deleted=$Is_Deleted;
  }
  /*****************************************************GETTERS***************************************/
  public function get_product_id()
  {
	  return $this->ID;
  }
  public function get_product_name()
  {
	  return $this->Name;
  }
  public function get_product_category_ID()
  {
	  return $this->Category_ID;
  }
  public function get_Is_Deleted()
  {
	  return $this->Is_Deleted;
  }
  public function get_product_CategoryObj()
  {
	  return $this->CategoryObj;
  }
  /****************************************************************FUNCTIONS************************************/
	public function __construct($id)
	{
		if($id!="")
		{
		  $sql="Select * from `product` where ID=$id";
		  $result=Database::get_instance()->execute($sql);
		  while($row=mysqli_fetch_array($result))
		  {
		  $this->ID=$id;
		  $this->Name=$row['Name'];
		  $this->Category_ID=$row['Category_Id'];
		  $this->Is_Deleted=$row['Is_Deleted'];		  
		  }
		  $this->CategoryObj=new ProductCategoryModel($this->Category_ID);
		}
	}
	public function Select_All_Product()
	{
		$sql="SELECT * FROM product";
		$result=Database::get_instance()->execute($sql);
		$i=0;
		$ObjArray;
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new ProductModel($row["ID"]);
			if($MyObj->get_Is_Deleted()==0)
			{
				$ObjArray[$i]=$MyObj;
				$i++;
			}
		}
		return $ObjArray;
	}
	
	public function Insert_product(){
		$sql="INSERT INTO `product`(`Name`,`Category_Id`, `Is_Deleted`) VALUES ('".$this->Name."',".$this->Category_ID.",0)";
		Database::get_instance()->execute($sql);
	}
	
	public function search_by_name(){
		$sql="SELECT * FROM `product` WHERE Name like '%".$this->Name."%'";
		$result=Database::get_instance()->execute($sql);
		$i=0;
		$ObjArray=null;
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new ProductModel($row["ID"]);
			if($MyObj->get_Is_Deleted()==0)
			{
				$ObjArray[$i]=$MyObj;
				$i++;
			}
		}
		return $ObjArray;
	}
	
	public function search_by_category(){
		$sql="SELECT * FROM `product` WHERE Category_Id=".$this->Category_ID;
		$result=Database::get_instance()->execute($sql);
		$i=0;
		$ObjArray=null;
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new ProductModel($row["ID"]);
			if($MyObj->get_Is_Deleted()==0)
			{
				$ObjArray[$i]=$MyObj;
				$i++;
			}
		}
		return $ObjArray;
	}
	
	public function editProduct()
	{
		$sql="UPDATE `product` SET  `Name`='".$this->Name."',`Category_Id`=$this->Category_ID where id=$this->ID";
		Database::get_instance()->execute($sql);
	}
	public function delProduct(){
		$sql="UPDATE `product` SET `Is_Deleted`=1 where id=$this->ID";
		Database::get_instance()->execute($sql);
	}
	
}
?>
