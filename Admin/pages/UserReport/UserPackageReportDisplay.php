<?php
session_start();
include "../../connect.php"; 

//$a=$link->rawQuery("select * from UserReportTB where VendorID=".$_SESSION['vid']);
$a=$link->rawQuery("SELECT p.*,u1.*,v.*,up.* FROM PackageTB p,UserTB u1,userreortpackagetb up,VendorTB v where up.PackageID=p.PackageID and up.UserID=u1.UserID and up.VendorID=v.VendorID");
if(isset($_GET['ids']))
{
	$b=$link->rawQueryOne("SELECT up.*,v.FirstName,v.LastName,up.Report,u1.First_Name,u1.Last_Name FROM userreortpackagetb up,UserTB u1,VendorTB v where up.Is_Active=1 and up.UserID=u1.UserID and up.VendorID=v.VendorID and v.VendorID=".$v." and up.UserReortPackage=".$_GET['ids']);
	if($b['Approve']=='Reject')
	{
	  $link->where("UserReortPackage",$_GET['ids']);
	  $j=$link->update("userreortpackagetb",Array("Approve"=>'Accept'));
	  header("location:UserPackageReportDisplay.php");
	}
	else if($b['Approve']=='Accept')
	{
	  $link->where("UserReortPackage",$_GET['ids']);
	  $j=$link->update("userreortpackagetb",Array("Approve"=>'Reject'));
	  header("location:UserPackageReportDisplay.php");
	}
}
if(isset($_GET['ids1']))
{
	$b=$link->rawQueryOne("SELECT up.*,v.FirstName,v.LastName,up.Report,u1.First_Name,u1.Last_Name FROM userreortpackagetb up,UserTB u1,VendorTB v where up.Is_Active=1 and up.UserID=u1.UserID and up.VendorID=v.VendorID and v.VendorID=".$v." and up.UserReortPackage=".$_GET['ids1']);
	if($b['HomeCollection']=='Reject')
	{
	  $link->where("UserReortPackage",$_GET['ids1']);
	  $j=$link->update("userreortpackagetb",Array("HomeCollection"=>'Accept'));
	  header("location:UserPackageReportDisplay.php");
	}
	else if($b['HomeCollection']=='Accept')
	{
	  $link->where("UserReortPackage",$_GET['ids1']);
	  $j=$link->update("userreortpackagetb",Array("HomeCollection"=>'Reject'));
	  header("location:UserPackageReportDisplay.php");
	}
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/appular/template/demo/vertical-default-light/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Feb 2019 04:07:52 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Appular Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../css/all.min.css">
  <link rel="stylesheet" href="../../css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="../../css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
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
              <a class="navbar-brand brand-logo" href="index.php"><span>Lab Care</span></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../../images/face1.jpg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-align-justify"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="fa fa-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search Now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
         
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/face1.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="../../ChangePassword.php" class="dropdown-item">
                <i class="fa fa-sign-out-alt text-primary"></i>
                ChangePassword
              </a>
              <a href="../../logout.php" class="dropdown-item">
                <i class="fa fa-sign-out-alt text-primary"></i>
                Logout
              </a>
			   
            </div>
          </li>
         
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fas fa-align-justify"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
     
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close fas fa-times"></i>
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
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do" size="5">
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
                  <i class="remove far fa-times-circle"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove far fa-times-circle"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove far fa-times-circle"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove far fa-times-circle"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove far fa-times-circle"></i>
                </li>
              </ul>
            </div>
            <div class="events py-4 border-bottom px-3">
              <div class="wrapper d-flex mb-2">
                <i class="far fa-circle text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
              <p class="text-gray mb-0">build a js based app</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="far fa-circle text-primary mr-2"></i>
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
          <li class="profile">
            <div class="profile-wrapper">
              <img src="../../images/face1.jpg" alt="profile">
              <div class="profile-details">
                <p class="name">Louis Cummings</p>
                <small class="designation">Business Analyst</small>
              </div>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="../../index.php">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Dasboards</span>
            </a>
          </li>
            <div class="collapse" id="dasboards">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="index-2.html">Analytics</a></li>
                <li class="nav-item"><a class="nav-link" href="index2.html">Market</a></li>
              </ul>
            </div>
          </li>
		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="fa fa-palette menu-icon"></i>
              <span class="menu-title">Country</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../ui-features/CountryInsert.php">Add Country</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/CountryDisplay.php">View Country</a></li>
              </ul>
            </div>
          </li>
		  
		 
		   <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#State" aria-expanded="false" aria-controls="State">
              <i class="fa fa-palette menu-icon"></i>
              <span class="menu-title">State</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="State">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../ui-features/StateInsert.php">Add State</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/StateDisplay.php">View State</a></li>
              </ul>
            </div>
          </li>
		  
		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#City" aria-expanded="false" aria-controls="City">
              <i class="fa fa-palette menu-icon"></i>
              <span class="menu-title">City</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="City">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../ui-features/CityInsert.php">Add City</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/CityDisplay.php">View City</a></li>

              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../User/UserDetails.php">
              <i class="fa fa-user menu-icon"></i>
              <span class="menu-title">UserDetails</span>
            </a>
          </li>
		   <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#UserReport" aria-expanded="false" aria-controls="UserReport">
              <i class="fa fa-palette menu-icon"></i>
              <span class="menu-title">UserReport</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="UserReport">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="UserReportDisplay.php">View UserReport</a></li>
                <li class="nav-item">  <a class="nav-link" href="UserPackageReportDisplay.php">View UserPackageReport</a></li>

              </ul>
            </div>
          </li>
		  
		   <li class="nav-item">
            <a class="nav-link" href="../Vendor/VendorDisplay.php">
              <i class="fa fa-user menu-icon"></i>
              <span class="menu-title">VendorDetails</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">UserReport Package</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr align="center">
                            <th>UserReportID</th>
							<th>UserName</th>
							<th>PackageName</th>							
							<th>VendorName</th>
							<th>Report</th>
							<th>Collection_Date</th>
							<th>From_Collection_Time</th>
							<th>To_Collection_Time</th>
							<th>IsPaid</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  $o=0;
					  foreach($a as $b)
					  { 
					  $o++;
					  ?>
                        <tr align="center">
                            <td><?php echo $o; ?></td>
							<td><?php echo $b["First_Name"]." ".$b["Last_Name"];?></td>
							<td><?php echo $b["Package_Name"];?></td>
							<td><?php echo $b["FirstName"]." ".$b["LastName"];?></td>
							<td><a href="../../User_Report/demo.php?id=<?php echo $b["UserReportID"];?>">Link</a></td>
							<td><?php echo $b["Collection_Date"];?></td>
							<td><?php echo $b["From_Collection_Time"]; ?></td>
							<td><?php echo $b["To_Collection_Time"]; ?></td>
							<td><?php echo $b["IsPaid"];?></td>
							
					  <?php } ?>  
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
           <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 LabCare by Ocean Infotech.</span>
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
  <script src="../../js/data-table.js"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/appular/template/demo/vertical-default-light/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Feb 2019 04:07:53 GMT -->
</html>