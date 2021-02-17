<script>
function AddCart(d1,pr1,v1)
{
	$.ajax({
        type: "GET",
        url: "insert.php?p1="+d1+"&price="+pr1+"&vendor="+v1,
        success: function (data) {
          alert("Added To Cart");
		   CartCounts();
		},
        error: function () {
		  alert("error");
        }
    });
}
function CartCounts()
{
//	 alert(a1);
	$.ajax({
        type: "GET",
        url: "CartCount.php",
        success: function (data) {
          //alert("error");		  
		  $("#cc1").html(data);
		},
        error: function () {
		  alert("error");
        }
    });
}
CartCounts();
</script>
<?php
  session_start();
  include "connect.php";   
    if(isset($_GET['cid']))
	{  
	  $package=$link->rawQuery("select p.*,v.* from PackageTB p,VendorTB v where v.VendorID=p.VendorID and p.Is_Active=1 and v.CityID=".$_GET['cid']." and p.PackageID=".$_GET['p1']);  

	foreach($package as $p)
	{ 	
?>
				<div class="row">
						<div class="col-sm-4">
							<img src="images/event03.png" alt="donate-blood" class="img-responsive">
						</div> <!-- end .col-sm-4 -->
						<div class="col-spacer"></div>
						<div class="col-sm-8">
							<h2><?php echo $p['PackageCategoryName'];?></h2>
							<p><?php echo $p['Description'];?></p>
							<!-- The immense support we receive from donors like you helps us meet 90 percent of our patients' needs for blood transfusions each year at MedicAid Hospital Los Angeles.	 -->
							<p style="color:#0199ed;"><?php echo "Rs. ".$p['Price'];?></p>
							<p><table border="1" cellpadding="2" cellspacing="2" style="width:500px">
  <tbody>
      <?php $checked_test=$link->rawQuery("Select tb.TestID ,tb.Test_Name from package_test_matchtb ptm, testtb tb where tb.TestID= ptm.package_test_id and ptm.package_id=".$p['PackageID']); 
      foreach ($checked_test as $test) {?>
        <tr>
          <td style="text-align:center"><strong><span style="color:#0199ed"><?php echo $test['Test_Name']; ?></span></strong></td>

          <?php 

              $test_parameter=$link->rawQuery("Select tp.parameter from testparametermatchtb tpm, testparametertb tp where tp.id= tpm.test_parameter_id and tpm.test_id=".$test['TestID']);
           
              $param = "";

              foreach ($test_parameter as $parameter) {
                 $param = $param.$parameter['parameter']." , "; 
               }; 
           ?>
          <td style="text-align:center"><?php echo substr_replace($param, "", -2); ?></td>

        </tr>
      <?php } ?>
  </tbody>
</table>

</p>
							<button type="button" class="button" id="AddPackage" onclick="AddCart(<?php echo $p['PackageID']; ?>,<?php echo $p['Price']; ?>,<?php echo $p['VendorID']; ?>); ">Add</button>
						</div> <!-- end .col-sm-8 -->
				</div> <!-- end .row -->
					<br>
					<br>
<?php 
}
} else { ?>
    <div class="row">
	<div class="col-sm-12">
           
	</div>
	</div>
<?php } 
	if(isset($_GET['xid']) && $_GET['xid']!=null)
	{ ?>
					<div class="row">
					   <?php
				$p=$link->rawQuery("select * from VendorTB where Is_Active=1 and CityID=".$_GET['xid']);
				?> <h1>Package</h1> <?php
				$o=0;
				foreach($p as $r)
                {	
                $o++;				
				?>
						<div class="col-sm-4">
							<div class="blog-post">
								<div class="blog-post-meta">
									<div class="number"><?php echo ".0".$o; ?></div>
									<div class="blog-post-image"><a href="#"><img src="../Vendor/images/<?php echo $r['Lab_Logo'];?>" alt="blog post image" class="img-responsive"></a></div>
									<h3><a href="#"><?php echo $r['Lab_Name'] ; ?></a></h3>
									<ul class="list-inline">
										<li><a href="#"><i class="fa fa-user"></i><?php echo $r['FirstName']." ".$r['LastName']; ?></a></li>
										<!--<li><a href="#"><i class="fa fa-comment"></i>5</a></li>-->
									</ul>
								</div> <!-- end .blog-post-meta -->
								<p><?php echo $r['Lab_Address']." "; ?> <br>When Derrick Dargis was born at MedicAid Memorial Hospital, doctors noticed several serious health issues.</p>
								<a href="ViewPackage.php?cid=<?php echo $_GET['xid'];?>&vid=<?php echo $r['VendorID']; ?>" class="text-button">View Package</a>
							</div> <!-- end .blog-post -->
						</div>
				<?php  } ?>
				</div>
				<br>
				<br>
        <?php 		
	} else {?>
	<div class="row">
	<div class="col-sm-12">
           
	</div>
	</div>
	<?php }
?>