<?php
require_once("../Public/Database/DB.php");
class AboutUsModel
{
	private $ID,$HTMLContent;
	
	/********************************************SETTERS*********************************/
    public function set_ID($ID){$this->ID=$ID;}
	public function set_HTMLContent($HTMLContent){$this->HTMLContent=$HTMLContent;}

	/********************************************GETTERS********************************/
    public function get_ID(){return $this->ID;}
	public function get_HTMLContent(){return $this->HTMLContent;}
	/********************************FUNCTIONS********************************************/
	public function __construct($id)
	{
	  if($id!="")
	  {
		  $DBObject=new Database();
		  $sql="Select * from aboutus where ID=$id";
		  $DBObject->connect();
		  $result=$DBObject->execute($sql);
		  while($row=mysqli_fetch_array($result))
		  {
			  $this->ID=$id;
			  $this->HTMLContent=$row['HTML_Content'];
		  }
	  }
	}
	public function Search()
	{
		$DBObject=new Database();
		  $sql="Select * from aboutus";
		  $DBObject->connect();
		  $result=$DBObject->execute($sql);
		  $row=mysqli_fetch_array($result);
		  
		  $MyObj=new AboutUsModel($row['ID']);
		  return $MyObj;
	}
	public function Edit()
	{
		$DBObject=new Database();
		$sql="UPDATE `aboutus` SET `HTML_Content`='".$this->HTMLContent."' WHERE ID= 1";
		$DBObject->connect();
		$DBObject->execute($sql);
	}
}
?>