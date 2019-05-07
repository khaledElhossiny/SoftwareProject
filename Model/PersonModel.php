<?php
require_once("../Public/Database/DB.php");
require_once("AddressModel.php");
class PersonModel
{
  private $ID;
  private $Nat_ID;
  private $Name;
  private $Birth_Date;
  private $Address_ID;
  private $Mobile;
  private $Is_Deleted;
  private $AddressObj;
  /*****************************************************SETTERS***************************************/
  public function set_id($id)
  {
	  $this->ID=$id;
  }
  public function set_Nat_ID($Nat_ID)
  {
	  $this->Nat_ID=$Nat_ID;
  }
  public function set_Name($Name)
  {
	  $this->Name=$Name;
  }
  public function set_Birth_Date($Birth_Date)
  {
	  $this->Birth_Date=$Birth_Date;
  }
    public function set_Address_ID($Address_ID)
  {
	  $this->Address_ID=$Address_ID;
  }
    public function set_Mobile($Mobile)
  {
	  $this->Mobile=$Mobile;
  }
  /*****************************************************GETTERS***************************************/
  public function get_id()
  {
	  return $this->ID;
  }
  public function get_Nat_ID()
  {
	  return $this->Nat_ID;
  }
  public function get_Name()
  {
	  return $this->Name;
  }
  public function get_Birth_Date()
  {
	  return $this->Birth_Date;
  }
    public function get_Address_ID()
  {
	  return $this->Address_ID;
  }
    public function get_Mobile()
  {
	  return $this->Mobile;
  }
  /****************************************************************FUNCTIONS************************************/
    public function __construct($id)
	{
	  if($id!="")
	  {  
		  $sql="Select * from person where id=$id";
		  /*$DBObject=new Database();
		  $result=$DBObject->execute($sql);*/
		  $result=Database::get_instance()->execute($sql);
		  while($row=mysqli_fetch_array($result))
		  {
			  $this->ID=$id;
			  $this->Nat_ID=$row['Nat_ID'];
			  $this->Name=$row['Name'];
			  $this->Birth_Date=$row['Birth_Date'];
			  $this->Address_ID=$row['Address_ID'];
			  $this->Mobile=$row['Mobile'];
		  }
		  //$this->AddressObj=new AddressModel($this->Address_ID);
	  }
	}
	public function get_Address()
	{
		$Address=new AddressModel($this->Address_ID);
		return $Address->get_Name();
	}
	public function Select_By_Nat_ID()
	{
		$sql="SELECT * FROM `person` WHERE Nat_ID=".$this->Nat_ID;
		/*$DBObject=new Database();
		  $result=$DBObject->execute($sql);*/
		  $result=Database::get_instance()->execute($sql);
		$MyObj=null;
		while($row=mysqli_fetch_array($result))
			$MyObj= new PersonModel($row["ID"]);
		return $MyObj;
	}
	public function Select_All_Persons()
	{
		$sql="SELECT * FROM `person`";
		/*$DBObject=new Database();
		$result=$DBObject->execute($sql);*/
		$result=Database::get_instance()->execute($sql);
		$i=0;
		$ObjArray;
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new PersonModel($row["ID"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
		return $ObjArray;
	}
	public function Add()
	{
		$this->Is_Deleted=0;
		$sql="INSERT INTO `person`(`Nat_ID`, `Name`, `Birth_Date`, `Address_ID`, `Mobile`, `Is_Deleted`) 
		VALUES ('".$this->Nat_ID."','".$this->Name."','".$this->Birth_Date."',".$this->Address_ID.",'".$this->Mobile."',".$this->Is_Deleted.")";
		echo $sql;
		/*$DBConnect=new Database();
		$DBConnect->execute($sql);*/
		Database::get_instance()->execute($sql);
	}
    public function Edit()
    {
		$this->Is_Deleted=0;
        $sql="UPDATE `person` SET `Nat_ID`='".$this->Nat_ID."',`Name`='".$this->Name."',`Birth_Date`=".$this->Birth_Date.",`Address_ID`="
		.$this->Address_ID.",`Mobile`='".$this->Mobile."', `Is_Deleted`=".$this->Is_Deleted." WHERE `ID`=".$this->ID;
        echo $sql;
        /*$DBConnect=new Database();
        $DBConnect->execute($sql);*/
		Database::get_instance()->execute($sql);
    }
    public function Del()
    {
        $this->Is_Deleted=1;
        $sql="UPDATE `person` SET `Nat_ID`='".$this->Nat_ID."',`Name`='".$this->Name."',`Birth_Date`=".$this->Birth_Date.",`Address_ID`="
		.$this->Address_ID.",`Mobile`='".$this->Mobile."', `Is_Deleted`=".$this->Is_Deleted." WHERE `ID`=".$this->ID;
        echo $sql;
        /*$DBConnect=new Database();
        $DBConnect->execute($sql);*/
		Database::get_instance()->execute($sql);
    }
}
?>
