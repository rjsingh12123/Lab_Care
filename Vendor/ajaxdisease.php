<?php
  session_start();
  include 'connect.php';
  if(isset($_POST['ids']))
  {
  $tt=$link->rawQuery("Select * from TestTB where Is_Active=1 and DiseaseID=".$_POST['ids']);    
  	 $_SESSION['diesease']=$_POST['ids'];  
  echo "<option value=''>---select Test---</option>";

  foreach($tt as $a2) { 
   
   ?>
	<option value="<?php echo $a2['TestID'];?>"><?php echo $a2['Test_Name'];?></option>
	
	
<?php
 }
  } 
  if(isset($_POST['htt']))
  {
	 $_SESSION['test_diesease']=$_POST['htt'];  
  }     
 if(isset($_POST['at']))
 {
	 $j=$link->rawQueryOne("Select * from TestTB where Is_Active=1 and TestID=".$_SESSION['test_diesease']);
	 $k=$link->rawQueryOne("Select Disease_Name from DiseaseCategoryTB where Is_Active=1 and DiseaseID=".$_SESSION['diesease']);
	 
	 ?>
		 <div class="form-group row" id="gn_report">
	  <label class="col-sm-10 col-form-label">Generate Report</label>
	  <div class="col-sm-9">
		<a href="pages/age/SampleAge.php?test=<?php echo $j['Test_Name']; ?>&Disease=<?php echo $k['Disease_Name']; ?>&AgeTo=<?php echo $_POST['at']; ?>"><input type="button" value="Generate" onclick="d();"></a><span id="s4"></span>
	  </div>
	</div>
	 <?php
 }

 if(isset($_POST['no_age']))
 {
	 $j=$link->rawQueryOne("Select * from TestTB where Is_Active=1 and TestID=".$_SESSION['test_diesease']);
	 $k=$link->rawQueryOne("Select Disease_Name from DiseaseCategoryTB where Is_Active=1 and DiseaseID=".$_SESSION['diesease'])
	 
	 ?>
		 <div class="form-group row">
	  <label class="col-sm-10 col-form-label">Generate Report</label>
	  <div class="col-sm-9">
		<a href="pages/age/Sample.php?test=<?php echo $j['Test_Name']; ?>&Disease=<?php echo $k['Disease_Name']; ?>"><input type="button" value="Generate" onclick="d();"></a><span id="s4"></span>
	  </div>
	</div>
	 <?php
 }
 
 ?>