<?php
require_once("../Public/Database/DB.php");
class Inventory_Income_Details_Model
{
  private $ID,$Product_ID,$Income_ID,$Amount_Per_Item;
  /*****************************************************SETTERS***************************************/
  public function set_id($id)
  {
	  $this->ID=$id;
  }
  public function set_Product_ID($Product_ID)
  {
	  $this->Product_ID=$Product_ID;
  }
  public function set_Income_ID($Income_ID)
  {
	  $this->Income_ID=$Income_ID;
  }
  public function set_Amount_Per_Item($Amount_Per_Item)
  {
	  $this->Amount_Per_Item=$Amount_Per_Item;
  }
  
  /*****************************************************GETTERS***************************************/
  public function get_id()
  {
	  return $this->ID;
  }
  public function get_Product_ID()
  {
	  return $this->Product_ID;
  }
  public function get_Income_ID()
  {
	  return $this->Income_ID;
  }
  public function get_Amount_Per_Item()
  {
	  return $this->Amount_Per_Item;
  }
  /****************************************************************FUNCTIONS************************************/
    public  function __construct($id)
	{
		if($id!="")
		{
			$sql="Select * from inventory_income_details where id=$id";
			$result=Database::get_instance()->execute($sql);
			while($row=mysqli_fetch_array($result))
			{
			  $this->ID=$id;
			  $this->Product_ID=$row['Product_ID'];
			  $this->Income_ID=$row['Income_ID'];
			  $this->Amount_Per_Item=$row['Amount_Per_Item'];
			}
		}
  } 
    public function Search_By_Income_ID()
  {
	  $sql="SELECT * FROM `inventory_income_details` WHERE `Income_ID`=".$this->Income_ID;
	  $result=Database::get_instance()->execute($sql);
	  $MyObj= new Inventory_Income_Details_Model(mysqli_fetch_array($result)["ID"]);
	  return $MyObj;
  }
  public function Select_All()
  {
		$sql="SELECT * FROM `inventory_income_details`";
		$result=Database::get_instance()->execute($sql);;
		$i=0;
		$ObjArray;
		while ($row = mysqli_fetch_array($result))
		{
			$MyObj= new Inventory_Income_Details_Model($row["ID"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
	  return $ObjArray;
  }
  public function Insert_To_Inventory_Details()
  {
    $sql="INSERT INTO `inventory_income_details`(`Product_ID`, `Income_ID`, `Amount_Per_Item`) 
	VALUES ($this->Product_ID,$this->Income_ID,$this->Amount_Per_Item)";
	Database::get_instance()->execute($sql);
  }
  public function Edit_Inventory_Details()
  {
	$sql="UPDATE `inventory_income_details` SET `Product_ID`=$this->Product_ID,`Income_ID`=$this->Income_ID,
	`Amount_Per_Item`=$this->Amount_Per_Item WHERE `ID`=".$this->ID;
	Database::get_instance()->execute($sql);
  }
  //no delete in this model for business reasons
}

/* MULTI VALUE SQL:

INSERT INTO sales.promotions (
    promotion_name,
    discount,
    start_date,
    expired_date
)
VALUES
    (
        '2019 Summer Promotion',
        0.15,
        '20190601',
        '20190901'
    ),
    (
        '2019 Fall Promotion',
        0.20,
        '20191001',
        '20191101'
    ),
    (
        '2019 Winter Promotion',
        0.25,
        '20191201',
        '20200101'
    ); */

?>
