<link href="css/rate.css" rel="stylesheet">
<?php
   session_start();
   include 'connect.php'; 
   
   if(isset($_GET['dss']))
   { 
	?>
    <div class="section white">
			<div class="inner">
				<div class="container">
					<h1>For Patients and Visitors</h1>
					<div class="row aligned-cols">
						<div class="col-sm-12">
							<form class="form-outline" action="feedbackinsert.php?dss=<?php echo $_GET['dss'];?>" method="post">
								<div class="row">
									<div class="col-sm-10">
										<div class="form-group">
											<label style="color:#0199ed">Leave FeedBack:</label>
											<textarea name="review" style="height: 200px; width: 550px;"></textarea>
										</div> <!-- end .form-group -->
									</div> <!-- end .col-sm-6 -->
                                    					
								</div> <!-- end .row -->
								<div class="row">
								<div class="col-sm-1">
									<!-- Add icon library -->
										

										<!-- works with multiple ratings as well -->
                                </div>		
								<div class="col-sm-3">
								    <div id="wrapper">
										  
											<p class="clasificacion">
											   <input id="radio1" type="radio" name="estrellas" value="5"><!--
											  --><label for="radio1">&#9733;</label><!--
											  --><input id="radio2" type="radio" name="estrellas" value="4"><!--
											  --><label for="radio2">&#9733;</label><!--
											  --><input id="radio3" type="radio" name="estrellas" value="3"><!--
											  --><label for="radio3">&#9733;</label><!--
											  --><input id="radio4" type="radio" name="estrellas" value="2"><!--
											  --><label for="radio4">&#9733;</label><!--
											  --><input id="radio5" type="radio" name="estrellas" value="1"><!--
											  --><label for="radio5">&#9733;</label>
											</p>
										  
									</div> 
                                </div>	
                                <div class="col-sm-8">
									<!-- Add icon library -->
										

										<!-- works with multiple ratings as well -->
                                </div>								
                                </div>				
								<div class="row">
									<div class="col-sm-2">
									</div>
									<div class="col-sm-8">
									    <input type="submit" name="submit" class="button" value="Submit">
									</div>
								</div>
							</form>
						</div> <!-- end .col-sm-8 -->
					</div> <!-- end .row -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div>

	   <?php   
   }
   if(isset($_GET['a']))
   { 
     $f=$link->rawQuery("select * from FeedBackTB where VendorID=".$_GET['a']);
    ?>
<div class="section white">
			<div class="inner">
				<div class="container">
					<?php foreach($f as $fb){ ?>
					<div class="quote clearfix">
					   
						<div class="quote-author">
							<img src="images/quote-image1.png" alt="">
							<span class="name"><?php echo $fb['UserID']; ?></span>
							<span class="title"><?php echo $fb['Rate'].".0/5"; ?> <label style="color:orange;">★</label></span>
						</div> <!-- end .quote-author -->
						<div class="quote-content">
							<p><?php echo $fb['Review']; ?></p>
						</div> <!-- end .quote-content -->
					   
					</div> <!-- end .quote -->
					<?php } ?>
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
</div>
	   <?php
   }
?>