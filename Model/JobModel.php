<?php
require_once("../Public/Database/DB.php");
class JobModel
{
	private $ID;
	private $Name;
    private $isDeleted;
	
	/********************************************SETTERS********************************/
    public function set_ID($ID){$this->ID=$ID;}
	public function set_Name($Name){$this->Name=$Name;}
    public function set_isDeleted($isDeleted){$this->isDeleted=$isDeleted;}
	/********************************************GETTERS*********************************/
    public function get_ID(){return $this->ID;}
	public function get_Name(){return $this->Name;}
    public function get_isDeleted(){return $this->isDeleted;}
	/********************************FUNCTIONS********************************************/
	public function __construct($id)
	{
	  if($id!="")
	  {
		  $sql="Select * from job where ID=$id";
		  /* $DBObject=new Database();
		  $result=$DBObject->execute($sql); */
		  $result=Database::get_instance()->execute($sql);
		  while($row=mysqli_fetch_array($result))
		  {
			  $this->ID=$id;
			  $this->Name=$row['Name'];
			  $this->isDeleted=$row['Is_Deleted'];
		  }
	  }
	}
    public function Insert_To_Job(){
      $sql="INSERT INTO `job`(`Name`,`Is_Deleted`)
	VALUES ('".$this->Name."',0)";
	 /*  echo $sql;
	  $DatabaseObject = new Database();
	  $DatabaseObject->execute($sql); */
	  Database::get_instance()->execute($sql);
  }
  public function edit_In_Job()
  {
	  $sql="UPDATE `Job` SET `Name`='".$this->Name."' WHERE ID= ".$this->ID."";
	  /* echo $sql;
	  $DatabaseObject= new Database();
	  $DatabaseObject->execute($sql); */
	  Database::get_instance()->execute($sql);
  }
  public function Search_In_Job()
  {
	  $sql="SELECT * FROM job WHERE Name= ".$this->Name." ";
	  /* echo $sql;
	  $DatabaseObject= new Database();
	  $result=$DatabaseObject->execute($sql); */
	  $result=Database::get_instance()->execute($sql);
	  return $result;
      
  }
  public function Select_All_Jobs()
  {
      
	  $sql="SELECT * FROM `job`";
	  /* $DatabaseObject= new Database();
	  $result=$DatabaseObject->execute($sql); */
	  $result=Database::get_instance()->execute($sql);
      $i=0;
		$ObjArray;
		while ($row = mysqli_fetch_array($result))
		{
			$MyObj= new JobModel($row['ID']);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
	  return $ObjArray;
  }
    public function delete_job()
    {
        $sql="UPDATE `Job` SET `Is_Deleted`=1 WHERE ID= ".$this->ID."";
        /* echo $sql;
        $DBConnect=new Database();
        $DBConnect->execute($sql); */
		Database::get_instance()->execute($sql);
    }
  }

?>