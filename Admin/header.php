<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.php"><span>Lab Care</span></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/lablogo.png" alt="logo"></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-align-justify"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown" aria-expanded="false">
              <img src="images/<?php echo $admin_detail["Profile"] ?>" alt="profile">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
               <a href="ChangePassword.php" class="dropdown-item">
                <i class="fa fa-sign-out-alt text-primary"></i>
                ChangePassword
              </a>
              <a href="logout.php" class="dropdown-item">
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