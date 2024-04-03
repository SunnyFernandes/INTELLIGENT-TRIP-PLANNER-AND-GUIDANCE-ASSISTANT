<?php
  require '../samples/config.php';
  // echo $_SESSION["cust_id"];
  if(!empty($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $result0 = mysqli_query($conn,"SELECT * FROM `admin` WHERE admin_id = $admin_id");
    $row0 = mysqli_fetch_array($result0);
    $result = mysqli_query($conn,"SELECT * FROM `bus`;");
    $row = mysqli_fetch_array($result);
    $num_rows = mysqli_num_rows($result);
  }
  else{
    header("location: ../samples/login.php");
  }
?>
<!DOCTYPE php>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Travel Buddy  Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../assets/images/favicon.png" />
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
                  <img class="img-xs rounded-circle " src="../assets/images/faces/face15.jpg" alt="">
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
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                     <p class="preview-subject ellipsis mb-1 text-small"><a href="../samples/logout.php">Log Out</a></p>
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
            <a class="nav-link" href="../index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
         <!-- Customer Sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../customer_details.php">
              <span class="menu-icon">
                <i class="mdi mdi-account-box-outline"></i>
              </span>
              <span class="menu-title">Customer Details</span>
            </a>
          </li>
          
         
        <!-- Booking Sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../bookings.php">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Bookings</span>
            </a>
          </li>
          

        <!--Vendor Details Sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../vendor_details.php">
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
            <a class="nav-link" href="../pricing/flights.php">
              <span class="menu-icon">
                <i class="mdi mdi-airplane"></i>
              </span>
              <span class="menu-title">Flight</span>
            </a>
          </li>


          <li class="nav-item menu-items">
            <a class="nav-link" href="../pricing/trains.php">
              <span class="menu-icon">
                <i class="mdi mdi-train"></i>
              </span>
              <span class="menu-title">Train</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="../pricing/bus.php">
              <span class="menu-icon">
                <i class="mdi mdi-bus"></i>
              </span>
              <span class="menu-title"> bus</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="../pricing/rentalvehicle.php">
              <span class="menu-icon">
                <i class="mdi mdi-car"></i>
              </span>
              <span class="menu-title">Rental Vehicle</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="../pricing/hotels.php">
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
        <!-- partial:partials/_navbar.php -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
             
                  
            
                
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../assets/images/faces/face15.jpg" alt="">
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
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1"><a href="../samples/logout.php">Log Out</a></p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
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
      <h3 class="page-title"> bus </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Pricing</a></li>
          <li class="breadcrumb-item active" aria-current="page">bus</li>
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
                  <th>Date</th>
                  <th>Flight ID</th>
                  <th>Vendor</th>
                  <th>Amount (Vendor)</th>
                  <th>Amount (Admin)</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                            <td><?php echo $row['bus_id']; ?> </td>
                            <td><?php echo $row['bus_name']; ?> </td>
                            <td><?php echo $row['depart_stand']; ?> </td>
                            <td><?php echo $row['arrive_stand']; ?> </td> <!--itinearay id-->
                            <td><?php echo $row['depart_time']; ?> </td> <!--itinearay id-->
                            <td><?php echo $row['arrive_time']; ?> </td> <!--itinearay id-->
                            <td><?php echo $row['seats_available']; ?> </td><!--travel preference-->
                            <td><?php echo $row['total_seats']; ?> </td><!--saved places-->
                            <td><?php echo $row['price']; ?> </td><!--saved places-->
                            <td>
                              <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal" data-target="#showMoreModal1">Show More</button>
                              <button type="button" class="btn btn-outline-info btn-fw" data-toggle="modal" data-target="#editModal1">Edit</button>
                              <button type="button" class="btn btn-outline-danger btn-fw" data-toggle="modal" data-target="#deleteModal1">Delete</button>
                          </td>
                          </tr>
                        <?php
                          for ($i = 1; $i < $num_rows; $i++) {
                            $row = mysqli_fetch_array($result);
                              // echo $row . "<br>"; ?>
                            <tr>
                            <td><?php echo $row['bus_id']; ?> </td>
                            <td><?php echo $row['bus_name']; ?> </td>
                            <td><?php echo $row['depart_stand']; ?> </td>
                            <td><?php echo $row['arrive_stand']; ?> </td> <!--itinearay id-->
                            <td><?php echo $row['depart_time']; ?> </td> <!--itinearay id-->
                            <td><?php echo $row['arrive_time']; ?> </td> <!--itinearay id-->
                            <td><?php echo $row['seats_available']; ?> </td><!--travel preference-->
                            <td><?php echo $row['total_seats']; ?> </td><!--saved places-->
                            <td><?php echo $row['price']; ?> </td><!--saved places-->
                            <td>
                              <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal" data-target="#showMoreModal1">Show More</button>
                              <button type="button" class="btn btn-outline-info btn-fw" data-toggle="modal" data-target="#editModal1">Edit</button>
                              <button type="button" class="btn btn-outline-danger btn-fw" data-toggle="modal" data-target="#deleteModal1">Delete</button>
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
  </div>
             
                </div>
                <!-- content-wrapper ends -->
                
                <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</php>