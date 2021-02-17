<?php 
session_start();
include 'connect.php'; 
  if(isset($_GET['xy']))
  {
	      $p=$link->rawQueryOne("select * from CountryTB where Country_Name='".$_GET['xy']."'");
		  if($link->count > 0)
		  {
			  echo "<font color='red'>Country Already Inserted</font>";
		  }
		  else
		  {
	          $q=$link->insert('CountryTB',Array('Country_Name'=>$_GET['xy']));
			  if($q)
			  {
				  echo "";
			  }
		  }  
  }
  if(isset($_GET['xy1']))
  {
	      $p=$link->rawQueryOne("select * from StateTB where State_Name='".$_GET['xy1']."'");
		  if($link->count > 0)
		  {
			  echo "<font color='red'>State Already Inserted</font>";
		  }
		  else
		  {
	          $q=$link->insert('StateTB',Array('CountryID'=>$_GET['state'],'State_Name'=>$_GET['xy1']));
			  if($q)
			  {
				  echo "";
			  }
		  }  
  }
  if(isset($_GET['xy2']))
  {
	      $p=$link->rawQueryOne("select * from CityTB where City_Name='".$_GET['xy2']."'");
		  if($link->count > 0)
		  {
			  echo "<font color='red'>City Already Inserted</font>";
		  }
		  else
		  {
	          $q=$link->insert('CityTB',Array('StateID'=>$_GET['city'],'City_Name'=>$_GET['xy2']));
			  if($q)
			  {
				  echo "";
			  }
		  }  
  }
?>