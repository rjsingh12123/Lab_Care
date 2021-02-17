<script>
$(document).ready(function(){
	//alert("Hello");
	 $('.view_data').click(function(){
		 var employee_id = $(this).attr("id");
		  $.ajax({  
                url:"Description.php",  
                method:"post",  
                data:{d:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
		 });
});
</script>		 
<?php
  session_start();
  include "connect.php";   
  if(isset($_GET['id']))
  { 
	  // if(isset($_POST['Disease'])) 
	   //{    
		   $disease=$link->rawQuery("select * from DiseaseCategoryTB where Is_Active=1 and DiseaseID='".$_GET['id']."'");
		   foreach($disease as $d)
		   {
			   $test=$link->rawQuery("select t.*,d.*,v.* from TestTB t,DiseaseCategoryTB d,vendortb v where t.Is_Active=1 and t.DiseaseID=d.DiseaseID and v.VendorID=t.VendorID and v.VendorID=d.VendorID and t.DiseaseID=".$d['DiseaseID']);
			   if($link->count > 0)
			   {  
			   foreach($test as $t)
			   { 	
?>                 
				<div class="row">
	  <div class="col-sm-3">
		<span class="name"><?php echo $t['Test_Name']; ?><br>(<?php echo $t['Lab_Address']; ?>)</span>
	</div> <!-- end .col-sm-4 -->
	<div class="col-sm-3">
		<input type="button" name="view" value="View Details" id="<?php echo $t['TestID']; ?>" class="btn btn-info btn-xs view_data" style="width:120px; font-size: 12px;font-weight: 700;line-height: 40px;padding: 0 24px;display: inline-block;text-transform: uppercase;-webkit-transition: .25s;-ms-transition: .25s;-moz-transition: .25s;-o-transition: .25s;transition: .25s;position: relative;outline: none !important;border: none;background: #0199ed;color: #fff;" />
	</div>
	<div class="col-sm-4">
		<span class="specialty"><?php echo "Rs. ".$t['Price']; ?></span>
	</div> <!-- end .col-sm-4 -->
	<div class="col-sm-2">
	<input type="hidden" name="hh1" value="<?php echo $t['DiseaseID']; ?>" id="hh1">
	<input type="hidden" name="hh2" value="<?php echo $t['TestID']; ?>" id="hh2">
<button type="button" class="button" id="AddTest" onclick="AddCart(<?php echo $t['DiseaseID']; ?>,<?php echo $t['TestID']; ?>,<?php echo $t['Price']; ?>,<?php echo $t['VendorID']; ?>);">Add</button>
	
</div> <!-- end .row -->
	<!--	<span class="name"><button id="jadio" name="submit3" class="button" onclick="ADD();">ADD To Cart</button></span>
	--> </div>
<script src="https://ajax.googlepis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
	<br>
	<br>
	
	   <?php } } else {  
?>
<div class="row">
	  <div class="col-sm-5">
	  </div>
	  <div class="col-sm-4">
	  <h2>Test Not Found</h2> 
	  </div>
	  <div class="col-sm-3">
	  </div>
</div>
<?php
	   }
	   } 
	   ?>
	   <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header" style="background-color: #0199ed; color: white;">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Disease Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>
	   
	   <?php
	   
	   } 
	   
	   if(isset($_GET['xid']) && $_GET['xid']!=null)
	   {
		 if(isset($_SESSION['UserID1']))
         { 			 
         $rr=$link->rawQueryOne("select * from FindLab where UserID=".$_SESSION['UserID1']);	
         if($rr)
         {
            $link->where("UserID",$_SESSION['UserID1']);
            $link->Update("FindLab",Array("CityID"=>$_GET['xid']));
			$_SESSION['lab']=$_GET['xid'];
		 }
         else
         {	
            $link->insert("FindLab",Array("CityID"=>$_GET['xid'],"UserID"=>$_SESSION['UserID1']));
			$_SESSION['lab']=$_GET['xid'];	 
		 }
		 }
        ?>
		   <div class="row">
					<?php
  					$k=$link->rawQuery("select v.*,c.*,ci.*,s.* from VendorTB v,CountryTB c,StateTB s,CityTB ci where v.Is_Active=1 and v.CityID=ci.CityID and ci.StateID=s.StateID and c.CountryID=s.CountryID and v.CityID=".$_GET['xid']);
                     foreach($k as $e){    
					?>
					 
						<div class="col-md-4">
							<div class="blog-post-box-horizontal">
								
								<div class="content">
								    <br>
									<h3 style="color:#0199ed;"><?php echo $e['Lab_Name']; ?></h3>
									<br>
									<h2 style="content: '';display: block;width: 54px;height: 5px;border-radius: 5px;margin: 0 auto;background: #f2f2f2;margin-top: -16px;margin-left:0px;"></h2>
									<br>
									<div class="row">
									<div class="col-sm-4"><h3><label style="color:#0199ed;">Address:</label> </h3></div> <div class="col-sm-8"><?php echo $e['Lab_Address']; ?> </div>
									</div>
									<div class="row">
									<div class="col-sm-4"><h3><label style="color:#0199ed;">PhonNo:</label> </h3></div> <div class="col-sm-8"><?php echo $e['PhoneNumber']; ?> </div>
									</div>
									<div class="row">
									<div class="col-sm-4"><h3><label style="color:#0199ed;">City:</label> </h3></div> <div class="col-sm-8"><?php echo $e['City_Name']; ?> </div>
									</div>
									<div class="row">
									<div class="col-sm-4"><h3><label style="color:#0199ed;">State:</label> </h3></div> <div class="col-sm-8"><?php  echo $e['State_Name']; ?> </div>
									</div>
									<div class="row">
									<div class="col-sm-4"><h3><label style="color:#0199ed;">Country:</label> </h3></div> <div class="col-sm-8"><?php echo $e['Country_Name']; ?> </div>
									</div>
									<div class="row">
									<div class="col-sm-5"><button class="button" onclick="feedback(<?php echo $e['VendorID']; ?>);">FeedBack</button></div>
									
									<div class="col-sm-5"><button class="button" onclick="viewfeedback(<?php echo $e['VendorID']; ?>);">ViewFeedBack</button></div>
									<div class="col-sm-5"></div>
									</div>  
								</div> <!-- end .content -->
							</div> <!-- end .blog-post-horizontal -->
						</div> <!-- end .col-md-6 -->
					
		 <?php }   ?>
				    </div> <!-- end .row -->
					<div class="section white">
						<div class="inner">
							<div class="container">
								<div class="row" id="rowids">
								
								</div>
							</div>
						</div>
					</div>
					
	 <?php  }
  if(isset($_GET['did1']))
  {   
		$u1=$_GET['did1'];
		$u2=$_GET['tid1'];
		$u4=$_GET['price'];
		$u5=$_GET['vendor'];
		$u3=$_SESSION['UserID1'];
		//$abc=$link->rawQuery("select * from CartTB where Is_Active=1 and DiseaseID='$u1' and TestID='$u2' and UserID='$u3' ");
		$link->rawQuery("Select * from CartTB where Is_Active = ? and DiseaseID = ? and TestID = ? and UserID = ?",Array(1,$u1,$u2,$u3));
		if($link->count > 0)
		{
                
		}
        else
		{
		      $ins = $link->insert('carttb',Array('DiseaseID'=>$_GET['did1'],'TestID'=>$_GET['tid1'],'Price'=>$_GET['price'],'VendorID'=>$u5,'UserID'=>$_SESSION['UserID1']));
			  if($ins)
			  {
				  echo "ADDED";
			  }
			  else
			  {
				  echo "NO";
			  }	
		}		
  }
if(isset($_GET['p1']))
{    
	$p=$_GET['p1'];
	$p1=$_GET['price'];
	$p2=$_GET['vendor'];
	
	$u3=$_SESSION['UserID1'];
	
   if($link->rawQueryOne("select * from cartpackagetb where UserID='$u3' and PackageID='$p' and Is_Active=1"))
   {
 	   
   }
   else
   {
	 if($ins = $link->insert('cartpackagetb',Array('PackageID'=>$p,'Price'=>$_GET['price'],'VendorID'=>$p2,'UserID'=>$_SESSION['UserID1'])))
	 {
		  if($ins)
		  {
			  echo "ADDED";
		  }
		  else
		  {
			  echo "NO";
		  }
	 }
   } 
}
?>