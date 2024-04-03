<?php
  require './samples/config.php';
  // echo $_SESSION["cust_id"];
  if(!empty($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $result0 = mysqli_query($conn,"SELECT * FROM `admin` WHERE admin_id = $admin_id");
    $row0 = mysqli_fetch_array($result0);
    $result = mysqli_query($conn,"SELECT * FROM `customer`;");
    $row = mysqli_fetch_array($result);
    $num_rows = mysqli_num_rows($result);
  }
  else{
    header("location: ../template/samples/login.php");
  }
?>
<!DOCTYPE php>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Travel Buddy  Admin</title>
  <!-- plugins:css -->
  
  <link rel="stylesheet" href="../template/assets/vendors/mdi/css/materialdesignicons.min.css">
  
  <link rel="stylesheet" href="../template/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../template/assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../template/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../template/assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="../template/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../template/assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../template/assets/images/favicon.png" />
</head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.php -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>TRAVEL BUDDY</h3>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="../template/assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo $row0['fname'] ?></h5>
                  <span>Travel Buddy Admin <?php echo $row0['admin_id'] ?></span>
                </div>
              </div>
              <!--profile dropdown-->
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-account"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Profile info</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
               
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small"><a href=".logout.php"><a href="../template/samples/logout.php">Log Out</a></a></p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <!-- Dashboard sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
         <!-- Customer Sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/customer_details.php">
              <span class="menu-icon">
                <i class="mdi mdi-account-box-outline"></i>
              </span>
              <span class="menu-title">Customer Details</span>
            </a>
          </li>
          
         
        <!-- Booking Sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/bookings.php">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Bookings</span>
            </a>
          </li>
          

        <!--Vendor Details Sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/vendor_details.php">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Vendor Details</span>
            </a>
          </li>
          
          <li class="nav-item nav-category">
            <span class="nav-link">Pricing</span>
          </li>



          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pricing/flights.php">
              <span class="menu-icon">
                <i class="mdi mdi-airplane"></i>
              </span>
              <span class="menu-title">Flight</span>
            </a>
          </li>


          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pricing/trains.php">
              <span class="menu-icon">
                <i class="mdi mdi-train"></i>
              </span>
              <span class="menu-title">Train</span>
            </a>
          </li>

          <!-- Start Bus Pricing Sidebar -->
         <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pricing/bus.php">
              <span class="menu-icon">
                <i class="mdi mdi-bus"></i>
              </span>
              <span class="menu-title"> bus </span>
            </a>
          </li>
          <!-- End Bus Pricing Sidebar -->


          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pricing/rentalvehicle.php">
              <span class="menu-icon">
                <i class="mdi mdi-car"></i>
              </span>
              <span class="menu-title">Rental Vehicle</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pricing/hotels.php">
              <span class="menu-icon">
                <i class="mdi mdi-hotel"></i>
              </span>
              <span class="menu-title">Hotel</span>
            </a>
          </li>

         
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-7 mt-md-0 d-none d-lg-flex text">
                  <input type="text" class="form-control" placeholder=" Your Explore the World with Your Ultimate Travel Buddy - Your Passport to Adventure!">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
              <li class="nav-item dropdown border-left">
               
             
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../template/assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $row0['fname'] ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-account"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Profile info</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1"><a href="../template/samples/logout.php">Log Out</a></p>
                    </div>
                  </a>
                  
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Customer Details</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Customer Entries</a></li>
                  <li class="breadcrumb-item active" aria-current="page">All user details are displayed</li>
                </ol>
              </nav>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  </p>
                  <div class="table-responsive">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th>User ID</th>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>Email</th>
                          <th>Itinerary Id</th>
                          <th>Travel Preference</th>
                          <th>Saved Places</th>
                          <th>Past Trips</th>
                        </tr>
                      </thead>
                      <tbody>
                            <tr>
                            <td><?php echo $row['cust_id']; ?> </td>
                            <td><?php echo $row['fname']; ?> </td>
                            <td><?php echo $row['lname']; ?> </td>
                            <td><?php echo $row['email']; ?> </td>
                            <td><?php echo $row['phone']; ?> </td> <!--itinearay id-->
                            <td><?php echo $row['pass']; ?> </td><!--travel preference-->
                            <td><?php echo $row['cpass']; ?> </td><!--saved places-->
                            <td>
                              <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal" data-target="#showMoreModal1">Show More</button>
                            </td>
                          </tr>
                        <tr>
                        <?php
                          for ($i = 1; $i < $num_rows; $i++) {
                            $row = mysqli_fetch_array($result);
                              // echo $row . "<br>"; ?>
                            <tr>
                            <td><?php echo $row['cust_id']; ?> </td>
                            <td><?php echo $row['fname']; ?> </td>
                            <td><?php echo $row['lname']; ?> </td>
                            <td><?php echo $row['email']; ?> </td>
                            <td><?php echo $row['phone']; ?> </td> <!--itinearay id-->
                            <td><?php echo $row['pass']; ?> </td><!--travel preference-->
                            <td><?php echo $row['cpass']; ?> </td><!--saved places-->
                            <td>
                              <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal" data-target="#showMoreModal1">Show More</button>
                            </td>
                          </tr>
                          <?php
                          }
                           ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

<!--End of the map from where the users have visited-->
         
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/travelbuddyadmin/template/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/travelbuddyadmin/template/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/travelbuddyadmin/template/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/travelbuddyadmin/template/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="/travelbuddyadmin/template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/travelbuddyadmin/template/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/travelbuddyadmin/template/assets/js/off-canvas.js"></script>
    <script src="/travelbuddyadmin/template/assets/js/hoverable-collapse.js"></script>
    <script src="/travelbuddyadmin/template/assets/js/misc.js"></script>
    <script src="/travelbuddyadmin/template/assets/js/settings.js"></script>
    <script src="/travelbuddyadmin/template/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/travelbuddyadmin/template/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</php>