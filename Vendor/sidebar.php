<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="profile.php">
              <div class="profile-details">
                <p class="name"><?php echo $vendor_detail["FirstName"] ?></p>
                <small class="email-add"><?php echo $vendor_detail["Email"] ; ?></small>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Disease" aria-expanded="false" aria-controls="Disease">
              <i class="mdi mdi-layers menu-icon"></i>
              <span class="menu-title">Disease</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Disease">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="AddDisease.php">ADD Disease</a></li>
                <li class="nav-item"> <a class="nav-link" href="DiseaseDetails.php">View Disease</a></li>

              </ul>
            </div>
          </li>
		   <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Parameter" aria-expanded="false" aria-controls="Package">
               <i class="mdi mdi-puzzle-outline menu-icon"></i>
              <span class="menu-title">Test Parameter</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Parameter">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="TestParameterAdd.php">ADD Test Parameter</a></li>
                <li class="nav-item"> <a class="nav-link" href="TestParameterDisplay.php">View TestParameter</a></li>
              </ul>
            </div>
          </li>
      
		      <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#TestDisease" aria-expanded="false" aria-controls="TestDisease">
              <i class="mdi mdi-cryengine menu-icon"></i>
              <span class="menu-title">Test Disease</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="TestDisease">
              <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="TestDiseaseAdd.php">ADD Test Disease</a></li>
                <li class="nav-item"> <a class="nav-link" href="TestDiseaseDisplay.php">View Test Disease</a></li>
                <li class="nav-item"> <a class="nav-link" href="AgeDiseaseDisplay.php">View Age Test Disease</a></li>
              </ul>
            </div>
          </li>
		  
		      <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Package" aria-expanded="false" aria-controls="Package">
               <i class="mdi mdi-react menu-icon"></i>
              <span class="menu-title">Package</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Package">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="PackageInsert.php">ADD Package</a></li>
                <li class="nav-item"> <a class="nav-link" href="PackageDisplay.php">View Package</a></li>
              </ul>
            </div>
          </li>
		  
		 
		  
		      <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#AgeWiseDisease" aria-expanded="false" aria-controls="AgeWiseDisease">
              <i class="mdi mdi-cube menu-icon"></i>
              <span class="menu-title">AgeWiseDisease</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="AgeWiseDisease">
              <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="AgeDiseaseAdd.php">ADD Test Disease</a></li>
                <li class="nav-item"> <a class="nav-link" href="AgeDiseaseDisplay.php">View TestDisease</a></li>
              </ul>
            </div>
          </li> -->
		  
		      <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#UserReport" aria-expanded="false" aria-controls="UserReport">
              <i class="mdi mdi-pencil-box-outline menu-icon"></i>
              <span class="menu-title">User Report</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="UserReport">
              <ul class="nav flex-column sub-menu">
                <!-- <li class="nav-item"> <a class="nav-link" href="UserReportAdd.php">Add UserReport</a></li> -->
                <li class="nav-item"> <a class="nav-link" href="UserReportDisplay.php">View User Test Report</a></li>

				        <li class="nav-item"> <a class="nav-link" href="UserPackageReportDisplay.php">View User Package Report</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>