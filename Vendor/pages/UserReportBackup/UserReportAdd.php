<?php
include '../../connect.php'; 
session_start();
   $a=$link->rawQuery("SELECT * FROM diseasecategorytb");
   $b=$link->rawQuery("SELECT * FROM TestTB");
   $c=$link->rawQuery("SELECT * FROM PackageTB");
   $e=$link->rawQuery("SELECT * FROM UserTB");
   
   $s=$_SESSION["vid"];
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/serein/template/demo/vertical-default-light/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Apr 2019 07:05:16 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Serein Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="http://www.urbanui.com/">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
               <a class="navbar-brand brand-logo" href="../../index1.php"><img src="../../images/Lablogo.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index1.php"><img src="../../images/Lablogo.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-email-outline mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="../../images/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium">David Grey
                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="../../images/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium">Tim Cook
                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="../../images/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium"> Johnson
                    <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/face5.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a href="../../logout.php" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
			   <a href="../../ChangePassword.php" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                ChangePassword
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-apps"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles light"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close mdi mdi-close"></i>
        <ul class="nav nav-tabs" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
              </ul>
            </div>
            <div class="events py-4 border-bottom px-3">
              <div class="wrapper d-flex mb-2">
                <i class="mdi mdi-circle-outline text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
              <p class="text-gray mb-0">build a js based app</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="mdi mdi-circle-outline text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="../../images/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../index1.php">
              <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../VendorDetails/EditProfile.php">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Vendor</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Disease" aria-expanded="false" aria-controls="Disease">
              <i class="mdi mdi-puzzle-outline menu-icon"></i>
              <span class="menu-title">Disease</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Disease">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../Disease/AddDisease.php">ADD Disease</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Disease/DiseaseDetails.php">View Disease</a></li>
              </ul>
            </div>
          </li>
		  
		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#TestDisease" aria-expanded="false" aria-controls="TestDisease">
              <i class="mdi mdi-pencil-box-outline menu-icon"></i>
              <span class="menu-title">TestDisease</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="TestDisease">
              <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="../Test/TestDiseaseAdd.php">ADD TestDisease</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Test/TestDiseaseDisplay.php">View TestDisease</a></li>
              </ul>
            </div>
          </li>
		  
		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Package" aria-expanded="false" aria-controls="Package">
               <i class="mdi mdi-puzzle-outline menu-icon"></i>
              <span class="menu-title">Package</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Package">
              <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="../Package/PackageInsert.php">ADD Package</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Package/PackageDisplay.php">View Package</a></li>
              </ul>
            </div>
          </li>
		 
		  		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#AgeWiseDisease" aria-expanded="false" aria-controls="AgeWiseDisease">
              <i class="mdi mdi-pencil-box-outline menu-icon"></i>
              <span class="menu-title">AgeWiseDisease</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="AgeWiseDisease">
              <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="../Age/AgeDiseaseAdd.php">ADD TestDisease</a></li>
                <li class="nav-item"> <a class="nav-link" href="../Age/AgeDiseaseDisplay.php">View TestDisease</a></li>
              </ul>
            </div>
          </li>
		  
		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#UserReport" aria-expanded="false" aria-controls="UserReport">
              <i class="mdi mdi-puzzle-outline menu-icon"></i>
              <span class="menu-title">UserReport</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="UserReport">
              <ul class="nav flex-column sub-menu">
               <!-- <li class="nav-item"> <a class="nav-link" href="pages/UserReport/UserReportAdd.php">Add UserReport</a></li>-->
                <li class="nav-item"> <a class="nav-link" href="../UserReport/UserReportDisplay.php">View UserReport</a></li>
				<li class="nav-item"> <a class="nav-link" href="../UserReport/UserPackageReportDisplay.php">View UserPackageReport</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
               <div class="card-body">
                  <h2 class="card-title">User Report</h2>
                  <?php 
				    
				    if(isset($_GET['id7']))
					{
				        $w=$_GET['id7'];
	                    //$p=$link->rawQueryone("SELECT d.Disease_Name,t.Test_Name,p.Package_Name,u1.First_Name,u1.Last_Name FROM diseasecategorytb d,TestTB t,PackageTB p,PackageCategoryTB pc,UserReportTB u,UserTB u1 where u.Is_Active=1 and p.PackageID=u.PackageID and t.TestID=u.TestID and d.DiseaseID=u.DiseaseID and u1.UserID=u.UserID and UserReportID=".$w);
						$p=$link->rawQueryone("SELECT * FROM UserReportTB where Is_Active=1 and VendorID='$s' and UserReportID=".$w);
						//foreach($report as $p)
						//{
							
				  ?>
                  <form class="forms-sample1" action="../ui-features/Update.php?id7=<?php echo $w;?>" method="post" enctype="multipart/form-data">
				    <div class="col-md-6">
						<div class="col-md-6">
							<div class="form-group row">
							  <label class="col-sm-12 col-form-label">Report</label>
							  <div class="col-sm-12">
								<input type="file" name="file1" class="form-control">
							  </div>
							</div>
						</div>
					
                    </div>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary mr-2">
                  </form>
				  <?php
         			  } 
				     else if(isset($_GET['id8']))
					 {
						$w=$_GET['id8'];
	                    //$p=$link->rawQueryone("SELECT d.Disease_Name,t.Test_Name,p.Package_Name,u1.First_Name,u1.Last_Name FROM diseasecategorytb d,TestTB t,PackageTB p,PackageCategoryTB pc,UserReportTB u,UserTB u1 where u.Is_Active=1 and p.PackageID=u.PackageID and t.TestID=u.TestID and d.DiseaseID=u.DiseaseID and u1.UserID=u.UserID and UserReportID=".$w);
						$p=$link->rawQueryone("SELECT * FROM userreortpackagetb where Is_Active=1 and VendorID='$s' and UserReortPackage=".$w);
						//foreach($report as $p)
						//{ 
					?>
					 <form class="forms-sample1" action="../ui-features/Update.php?id8=<?php echo $w;?>" method="post" enctype="multipart/form-data">
				    <div class="col-md-6">
						<div class="col-md-6">
							<div class="form-group row">
							  <label class="col-sm-12 col-form-label">Report</label>
							  <div class="col-sm-12">
								<input type="file" name="file1[]" class="form-control" multiple>
							  </div>
							</div>
						</div>
					
                    </div>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary mr-2">
                  </form>
						<?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
             <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© Copyright 2019 LabCare. All Rights Reserved</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Design & Developed by LabCare Team<i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../js/vendor.bundle.base.js"></script>
  <script src="../../js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/iCheck.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/serein/template/demo/vertical-default-light/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Apr 2019 07:05:18 GMT -->
</html>
