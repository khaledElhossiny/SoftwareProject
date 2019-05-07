<?php
require_once("../Public/Database/DB.php");
class AddressModel
{
	private $ID,$Name,$Parent_ID,$Parent_Obj;
	
	/********************************************SETTERS*********************************/
    public function set_ID($ID){$this->ID=$ID;}
	public function set_Name($Name){$this->Name=$Name;}
    public function set_Parent_ID($Parent_ID){$this->Parent_ID=$Parent_ID;}
	/********************************************GETTERS********************************/
    public function get_ID(){return $this->ID;}
	public function get_Name(){return $this->Name;}
    public function get_Parent_ID(){return $this->Parent_ID;}
	/********************************FUNCTIONS********************************************/
	public function __construct($id)
	{
	  if($id!="")
	  {
		  $sql="Select * from address where ID=$id";
		  $result=Database::get_instance()->execute($sql);
		  while($row=mysqli_fetch_array($result))
		  {
			  $this->ID=$id;
			  $this->Name=$row['Name'];
              $this->Parent_ID=$row['Parent_ID'];
		  }
	}
    
    }
  public function Select_All_Address()
  {
      
	  $sql="SELECT * FROM `address`";
	  $result=Database::get_instance()->execute($sql);
      $i=0;
		$ObjArray;
		while ($row = mysqli_fetch_array($result))
		{
			$MyObj= new AddressModel($row["ID"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
	  return $ObjArray;
  }
  }
?>