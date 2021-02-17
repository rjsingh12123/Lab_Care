<?php
include "../../connect.php";
if(isset($_GET["id2"]))
{
	$parameter_id=$_GET["id2"];  
	$parameter=$_POST["parameter"];
	$unit=$_POST["unit"];
	$reference_range=$_POST["reference_range"];
	$link->where("id",$parameter_id);
	$a=$link->update("TestParameterTb",Array("parameter"=>$parameter,"Unit"=>$unit,"reference_range"=>$reference_range));
	header("location:../../TestParameterDisplay.php");
}
if(isset($_GET["id3"]))
{
	$id = $_GET["id3"];
	$package=$_POST['pname'];
    $Description=$_POST['Description'];
    $price = $_POST['price'];
    $package_category=$_POST['pcname'];

$test_tb=$link->rawQuery("Select tb.Test_Name,tb.TestID from testtb tb where tb.TestID not in (select package_test_id from package_test_matchtb where package_id = $id)");

  $package_test_matchtb=$link->rawQuery("Select package_test_id , id from package_test_matchtb where package_id = $id");


	foreach($package_test_matchtb as $pack_mch){
          if(!isset($_POST["chk_test".$pack_mch['package_test_id']])){
              $deleted_package_test_match_id=$link->rawQuery(" DELETE from package_test_matchtb where id=".$pack_mch['id']);
          }
     }

  	foreach($test_tb as $pack){
        if(isset($_POST["chk_test".$pack['TestID']])){

              $last_insert_package_test_match_id=$link->insert("package_test_matchtb",Array("package_id"=>$id,"package_test_id"=>$pack['TestID']));   
        }
    }

	$link->where("PackageID",$id);
	$a=$link->update("PackageTB",Array('Package_Name'=>$package,'PackageCategoryName'=>$package_category,'Description'=>$Description,'Price'=>$price));
	header("location:../../PackageDisplay.php");
}
if(isset($_GET["id4"]))
{
	$test_id=$_GET["id4"];

	    $disease_id=$_POST["disease_id"];
		$test_name=$_POST["tname"];
		$price=$_POST["price"];

	if (isset($_POST['isAge'])) {
      $isAge = 1;
      $ageFrom = $_POST["Age_From"];
      $ageTo = $_POST['Age_To'];
    }else{
        $isAge = $ageFrom = $ageTo = 0;
    }


  $test_parameter_tb=$link->rawQuery("Select tp.parameter,tp.id from testparametertb tp where tp.id not in (select test_parameter_id from testparametermatchtb where test_id = $test_id)");

  $test_parameter_match_tb=$link->rawQuery("Select test_parameter_id , id from testparametermatchtb where test_id = $test_id");

	foreach($test_parameter_match_tb as $para_mch){
          if(!isset($_POST["chk_parameter".$para_mch['test_parameter_id']])){
              $deleted_test_parameter_match_id=$link->rawQuery(" DELETE from testparametermatchtb where id=".$para_mch['id']);
          }
     }

  	foreach($test_parameter_tb as $para){
        if(isset($_POST["chk_parameter".$para['id']])){

              $last_insert_test_parameter_match_id=$link->insert("testparametermatchtb",Array("test_id"=>$test_id,"test_parameter_id"=>$para['id']));   
        }
    }


	$link->where("TestID",$test_id);
	$a=$link->update("TestTB",Array('Test_Name'=>$test_name,'DiseaseID'=>$disease_id,'Price'=>$price,"is_age"=>$isAge,"age_from"=>$ageFrom,"age_to"=>$ageTo));

	if(isset($_GET['page'])){
		header("location:../../AgeDiseaseDisplay.php");
	}else{
		header("location:../../TestDiseaseDisplay.php");
	}
}
if(isset($_GET["id5"]))
{
	$a1=$_GET["id5"];  
	$dn=$_POST["dname"];
	$d=$_POST["description"];
	$link->where("DiseaseID",$a1);
	$a=$link->update("diseasecategorytb",Array("Disease_Name"=>$dn,"Description"=>$d));
	header("location:../../DiseaseDetails.php");
}
if(isset($_GET["id6"]))
{
    $a1=$_GET["id6"];
	$d=$_POST["dname"];
	$t=$_POST["tname"];
	$af=$_POST["Age_From"];
	$at=$_POST["Age_To"];
	$ds=$_POST["description"];
	$r=$_FILES['Reading']['name'];
	$path=pathinfo($r,PATHINFO_EXTENSION);
	$ext="../../Age_Report/".$d." ".$t.".".$path;
    move_uploaded_file($_FILES['Reading']['tmp_name'],$ext);
		$link->where("AgeDiseaseID",$a1);
		$a=$link->update("agediseasetb",Array("TestID"=>$t,"DiseaseID"=>$d,"Age_From"=>$af,"Age_To"=>$at,"Reading"=>$ext,"Description"=>$ds));
		header("location:../Age/AgeDiseaseDisplay.php");
}
if(isset($_GET["id7"]))
{
    $a1=$_GET["id7"];
	$r=$_FILES['file1']['name'];
	$path=pathinfo($r,PATHINFO_EXTENSION);
	$ext="../../User_Report/"."User ".$a1.".".$path;
	$ext1="../../../UserSite/metheme.biz/User_Report/"."User ".$a1.".".$path;
    move_uploaded_file($_FILES['file1']['tmp_name'],$ext);
    move_uploaded_file($_FILES['file1']['tmp_name'],$ext1);
	$link->where("UserReportID",$a1);
	$a=$link->update("userreporttb",Array("Report"=>$ext,"IsUpload"=>1));
	
	header("location:pay_success.php?ids=".$a1);
	header("location:../UserReport/UserReportDisplay.php");
}
/*
if(isset($_GET["id8"]))
{
	if(count($_FILES['file1']['name'])>0)
	{
		$kv=0;
		$x1=0;
	      $a1=$_GET["id8"];
	$r=$_FILES['file1']['name'];

		foreach($_FILES['file1']['name'] as $fp)
		{
			$x1++;
				$path=pathinfo($fp,PATHINFO_EXTENSION);
				$ext="../../User_Report/"."User ".$a1." ".$x1.".".$path;
			move_uploaded_file($_FILES['file1']['tmp_name'][$kv],$ext);	
			
			$link->insert("packagereport",Array("Report"=>$ext,"UserReportPackageID"=>$a1,"IsUpload"=>1));
			$kv++;
		}
		    $link->where("UserReortPackage",$a1);
			$a=$link->update("userreortpackagetb",Array("Report"=>$ext,"IsUpload"=>1));
			$jk="";
			$link->where("Report",$jk);
			$a1=$link->delete("packagereport");
	}

	header("location:../UserReport/UserPackageReportDisplay.php");
} */
if(isset($_GET["id8"]))
{
        $i=0;
		//foreach($a as $b)
		//{
			//$i++;
			$a1=$_GET["id8"];
			$r=$_FILES['file1']['name'];
			$path=pathinfo($r,PATHINFO_EXTENSION);
			$ext="../../User_Report/"."PackageReport".$a1.".".$path;
			move_uploaded_file($_FILES['file1']['tmp_name'],$ext);
			$link->where("UserReortPackage",$_GET['id8']);
			$a=$link->update("userreortpackagetb",Array("Report"=>$ext,"IsUpload"=>1));
    	//}
	header("location:../UserReport/UserPackageReportDisplay.php");
}
if(isset($_GET["id9"]))
{
	$a1=$_GET["id9"];
    $r=$_FILES['file1']['name'];
	$path=pathinfo($r,PATHINFO_EXTENSION);
	$ext="../../Age_Report/"."Report".$a1.".".$path;
    move_uploaded_file($_FILES['file1']['tmp_name'],$ext);
	$link->where("AgeDiseaseID",$_GET['id9']);
	$a=$link->update("agediseasetb",Array("Reading"=>$ext));
	header("location:../Age/AgeDiseaseDisplay.php");
}
if(isset($_GET["id10"]))
{
	$a1=$_GET["id10"];
    $r=$_FILES['file1']['name'];
	$path=pathinfo($r,PATHINFO_EXTENSION);
	$ext="../../Age_Report/"."PackageReport".$a1.".".$path;
    move_uploaded_file($_FILES['file1']['tmp_name'],$ext);
	$link->where("PackageID",$_GET['id10']);
	$a=$link->update("PackageTB",Array("Reading"=>$ext));
	header("location:../Package/PackageDisplay.php");
}
?>