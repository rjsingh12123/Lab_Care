<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item profile">
            <a class="nav-link" href="profile.php">
              <div class="profile-wrapper">
                <img src="images/<?php echo $admin_detail["Profile"] ?>" alt="profile">
                <div class="profile-details">
                  <p class="name"><?php echo $admin_detail["UserName"] ?></p>
                  <small class="email-add"><?php echo $admin_detail["Email"] ; ?></small>
                </div>
              </div>
            </a>
          </li>
		   <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="fa fa-desktop menu-icon"></i>
              <span class="menu-title">Dashboards</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="fa fa-globe menu-icon"></i>
              <span class="menu-title">Country</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="CountryInsert.php">Add Country</a></li>
                <li class="nav-item"> <a class="nav-link" href="CountryDisplay.php">View Country</a></li>
              </ul>
            </div>
          </li>
		  
		   <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#State" aria-expanded="false" aria-controls="State">
              <i class="fa fa-map menu-icon"></i>
              <span class="menu-title">State</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="State">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="StateInsert.php">Add State</a></li>
                <li class="nav-item"> <a class="nav-link" href="StateDisplay.php">View State</a></li>
              </ul>
            </div>
          </li>
		  
		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#City" aria-expanded="false" aria-controls="City">
              <i class="fa fa-city menu-icon"></i>
              <span class="menu-title">City</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="City">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="CityInsert.php">Add City</a></li>
                <li class="nav-item"> <a class="nav-link" href="CityDisplay.php">View City</a></li>

              </ul>
            </div>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="UserDetails.php">
              <i class="fa fa-user menu-icon"></i>
              <span class="menu-title">UserDetails</span>
            </a>
          </li>
		 
          
		   <li class="nav-item">
            <a class="nav-link" href="VendorDisplay.php">
              <i class="fa fa-medkit menu-icon"></i>
              <span class="menu-title">VendorDetails</span>
            </a>
          </li>
          
        </ul>
      </nav>