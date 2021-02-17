<?php
session_start();
    include 'connect.php';
	if(isset($_POST['c']))
	{	
		$tt=$link->rawQuery("select * from StateTB where Is_Active=1 and CountryID=".$_POST['c']);    
		if($tt)
		{
			echo "<option value=''>---select state---</option>";
		 foreach($tt as $a2) 
		 { 
		 
			echo "<option value=".$a2['StateID'].">".$a2['State_Name']."</option>";
		 }
		}
		else
		{
			echo "<option value=''>No State</option>";
		}
	}	
	if(isset($_POST['c1']))
	{	
		$tt=$link->rawQuery("select * from CityTB where Is_Active=1 and StateID=".$_POST['c1']);    
		if($tt)
		{
			echo "<option value=''>---select city---</option>";
		 foreach($tt as $a2) 
		 { 
			echo "<option value=".$a2['CityID'].">".$a2['City_Name']."</option>";
		 }
		}
		else
		{
			echo "<option value=''>No City </option>";
		}
	}
	if(isset($_POST['c4']))
	{	
		if(isset($_POST['c2']))
		{
        	$tt=$link->rawQuery("SELECT d.*,v.* FROM DiseaseCategoryTB d,vendortb v  where v.VendorID=d.VendorID and d.Is_Active=1 and v.CityID=".$_POST['c2']." and d.DiseaseID=".$_POST['c4']." Group By d.Disease_Name");

        	if($tt)
			{
				 echo "<option value=''>FILTER BY CATEGORY</option>";
				 foreach($tt as $a2) 
				 { 
					echo "<option value=".$a2['Disease_Name'].">".$a2['Disease_Name']."</option>";
				 }
			}
			else
			{
				echo "<option value=''>No..</option>";
			}
		}
		//$tt=$link->rawQueryOne("SELECT * FROM DiseaseCategoryTB where d.DiseaseID=".$_POST['c4']);
		//echo $tt['DiseaseID'];
	}
	if(isset($_POST['c5']))
	{	
        echo $_POST['c5'];
		//$tt=$link->rawQueryOne("SELECT * FROM DiseaseCategoryTB where d.DiseaseID=".$_POST['c4']);
		//echo $tt['DiseaseID'];
	}
	if(isset($_POST['c2']))
	{	
        //$tt=$link->rawQuery("select distinct DiseaseCategoryTB.DiseaseID,DiseaseCategoryTB.DiseaseID from DiseaseCategoryTB left outer join vendortb on DiseaseCategoryTB.VendorID=vendortb.VendorID and DiseaseCategoryTB.Is_Active=1 where vendortb.CityID=".$_POST['c2']);
		$tt=$link->rawQuery("SELECT d.*,v.* FROM DiseaseCategoryTB d,vendortb v  where v.VendorID=d.VendorID and d.Is_Active=1 and v.CityID=".$_POST['c2']." Group By d.Disease_Name");
		//$tt=$link->rawQuery("SELECT d.*,v.* FROM DiseaseCategoryTB d,vendortb v  where v.VendorID=d.VendorID and d.Is_Active=1 and v.CityID=".$_POST['c2']." Group By d.Disease_Name");
		
		if($tt)
		{
			 echo "<option value=''>FILTER BY CATEGORY</option>";
			 foreach($tt as $a2) 
			 { 
				echo "<option value=".$a2['DiseaseID'].">".$a2['Disease_Name']."</option>";
			 }
		}
		else
		{
			echo "<option value=''>No..</option>";
		}
		
		
	}
	if(isset($_POST['c6']))
	{
	$cityids=$link->rawQueryOne("select VendorID from VendorTB where CityID=".$_POST['c6']);	
	?>
         <a href="MyCart.php?ids=<?php echo $cityids["VendorID"];?>" class="text-muted">VIEW CART</a>
		 
		<?php
	}
	if(isset($_POST['c3']))
	{	
	 	// echo "<div class='search-results-table-content'>";
		 //echo "<div class='search-result'>";
			     
				    if(isset($_POST['submit']))
					{
				       if(isset($_POST['Disease'])) 
					   {    
					   $test=$link->rawQuery("select t.*,d.* from TestTB t,DiseaseCategoryTB d where t.Is_Active=1 and t.DiseaseID=d.DiseaseID and t.DiseaseID=".$_POST['Disease']);
					   foreach($test as $t)
                       { 					   
		echo "<div class='row'>";
		echo "<div class='col-sm-3'>";
			echo "<span class='name'>".$t['Test_Name']."</span>";
				echo "</div>"; 
					echo "<div class='col-sm-3'>";
		echo "</div>";
		echo "<div class='col-sm-4'>";
			echo "<span class='specialty'>"."Rs"." ".$t['Price']."</span>";
					echo "</div>";
					echo "<div class='col-sm-2'>";
					echo "<span class='name'><input type='button' id='jadio' name='submit3' class='button' value='ADD To Cart'></span>";
					echo "</div>";
				    echo "</div>"; 
				   echo "<br>";
				} } } 
			//echo "</div>"; 
	  //echo "</div>"; 
	}
?>
	