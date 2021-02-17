
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->

    <?php 
    $vendor_detail=$link->rawQueryOne("select * from vendortb where VendorID=". $_SESSION['vid']);
        include 'header.php';
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php include 'sidebar.php'; ?>
      <!-- partial -->
      <div class="main-panel">