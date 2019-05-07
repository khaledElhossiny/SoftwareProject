<?php
require_once("../Model/ProductModel.php");
require_once("../Model/ProductCategoryModel.php");
require_once("../Model/ProductTypeAttributeModel.php");
require_once("../Model/ProductTypeAttributeChoiceModel.php");
require_once("../Model/ProductTypeAttributeValueModel.php");

if(isset($_POST['search_by_name']))
{
	if($_POST['search_by_name']!=null)
	{
		$ProductControllerObj=new ProductController();
		require_once("../View/SearchProduct.php");
		$ProductView=new ProductView();
		$ProductView->displayProduct($ProductControllerObj->search_by_name($_POST['name']));
	}
	exit();
}
else if(isset($_POST['search_by_category']))
{
	$ProductControllerObj=new ProductController();
	require_once("../View/SearchProduct.php");
	$ProductView=new ProductView();
	$ProductView->displayProduct($ProductControllerObj->search_by_category($_POST['category']));
	exit();
}
else if(isset($_POST['search_by_EAV']))
{
	
	$ProductControllerObj=new ProductController();
	$ProductControllerObj->search_by_EAV($_POST['EAV_ID']);
	exit();
}
else if(isset($_POST['del_search_by_name']))
{
	if($_POST['del_search_by_name']!=null)
	{
		$ProductControllerObj=new ProductController();
		require_once("../View/DeleteProduct.php");
		$ProductView=new ProductView();
		$ProductView->displayProduct($ProductControllerObj->search_by_name($_POST['name']));
	}
	exit();
}
else if(isset($_POST['del_search_by_cat']))
{
	$ProductControllerObj=new ProductController();
	require_once("../View/DeleteProduct.php");
	$ProductView=new ProductView();
	$ProductView->displayProduct($ProductControllerObj->search_by_category($_POST['category']));
	exit();
}
else if(isset($_GET['id']))
{
	$ProductModelObject=new ProductModel("");
	$ProductModelObject->set_product_id($_GET['id']);
	$ProductModelObject->delProduct();
	header("Location:../View/DeleteProduct.php");
	exit();
}
class ProductController
{
	public function search_by_name($name)
	{
		$ProductModel=new ProductModel("");
		$ProductModel->set_product_name($name);
		return $ProductModel->search_by_name();
	}
	public function search_by_category($categoryID)
	{
		$ProductModel=new ProductModel("");
		$ProductModel->set_category_ID($categoryID);
		return $ProductModel->search_by_category();
	}
	public function search_by_EAV($EAV_ID)
	{
		$ProductTypeAttributeChoice=new ProductTypeAttributeChoiceModel("");
		$ProductTypeAttributeValue=new ProductTypeAttributeValueModel("");
		
		$ProductTypeAttributeChoice->set_Product_Type_Attribute_ID($EAV_ID);
		$result=$ProductTypeAttributeChoice->Select_All_Attribute_Choices();
		if($result!="")
		{
			$prodResult=null;
			$eavResult=null;
			for($i = 0; $i < count($result); $i++)
			{
				$ProductModel=new ProductModel($result[$i]->get_Product_ID());
				$prodResult[$i]=$ProductModel;
				
				$ProductTypeAttributeValue->set_product_type_attribute_choice_ID($result[$i]->get_ID());
				$eavResult[$i]=$ProductTypeAttributeValue->search_by_AttributeChoice_ID();
			}
			require_once("../View/SearchProduct.php");
			$ProductView=new ProductView();
			$ProductView->displayEAV(new ProductTypeAttributeModel($EAV_ID),$eavResult,$prodResult);
		}
		else{
			header("Location:../View/SearchProduct.php");
		}
	}
	public function delete_prod($prodID)
	{
		$ProductModel=new ProductModel("");
		$ProductModel->set_product_id($prodID);
		$ProductModel->delProduct();
	}
}
?>