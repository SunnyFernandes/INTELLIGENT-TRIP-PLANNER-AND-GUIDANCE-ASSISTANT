<?php
  require './samples/config.php';
  // echo $_SESSION["cust_id"];
  if(!empty($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $result = mysqli_query($conn,"SELECT * FROM `admin` WHERE admin_id = $admin_id");
    $result1 = mysqli_query($conn,"SELECT SUM(car_rental.price) FROM `booked_car_rentals` INNER JOIN booking ON booking.booking_id = booked_car_rentals.booking_id INNER JOIN car_rental ON car_rental.car_rental_id = booked_car_rentals.car_rental_id;");
    $result2 = mysqli_query($conn,"SELECT ROUND(SUM(flights.price),2) FROM `booked_flights` INNER JOIN booking ON booking.booking_id = booked_flights.Booked_flight_id INNER JOIN flights ON flights.flight_id = booked_flights.flight_id;");
    $result3 = mysqli_query($conn,"SELECT ROUND(SUM(trains.price),2) FROM `booked_train` INNER JOIN booking ON booking.booking_id = booked_train.booked_train_id INNER JOIN trains ON trains.train_id = booked_train.booked_train_id;");
    $result4 = mysqli_query($conn,"SELECT ROUND(SUM(hotels.price),2) FROM `booked_hotel` INNER JOIN booking ON booking.booking_id = booked_hotel.booking_id INNER JOIN hotels ON hotels.hotel_id = booked_hotel.booked_hotel_id;");
    $row = mysqli_fetch_array($result);
    $row1 = mysqli_fetch_array($result1);
    $row2 = mysqli_fetch_array($result2);
    $row3 = mysqli_fetch_array($result3);
    $row4 = mysqli_fetch_array($result4);
    // $num_rows1 = mysqli_num_rows($result);
  }
  else{
    header("location: ../template/samples/login.php");
  }
?>
<!DOCTYPE html>
<head>
  <!-- Required meta tags -->
<!-- <meta charset="utf-8">   -->
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
      <!-- partial:partials/_sidebar.html -->
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
                  <h5 class="mb-0 font-weight-normal"><?php echo $row['fname'] ?></h5>
                  <span>Travel Buddy Admin <?php echo $row['admin_id'] ?></span>
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
          
          <!--Pricing Sidebar-->
          <li class="nav-item nav-category">
            <span class="nav-link">Pricing</span>
          </li>

          <!--Start Flight Pricing Sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pricing/flights.php">
              <span class="menu-icon">
                <i class="mdi mdi-airplane"></i>
              </span>
              <span class="menu-title">Flight</span>
            </a>
          </li>
         <!--End Flight Pricing Sidebar-->

          <!--Start Train Pricing Sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pricing/trains.php">
              <span class="menu-icon">
                <i class="mdi mdi-train"></i>
              </span>
              <span class="menu-title">Train</span>
            </a>
          </li>
         <!--End Train Pricing Sidebar-->

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

          <!--Start Vehicle Rental Pricing Sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pricing/rentalvehicle.php">
              <span class="menu-icon">
                <i class="mdi mdi-car"></i>
              </span>
              <span class="menu-title">RentalVehicle </span>
            </a>
          </li>
          <!--End Vehicle rental Pricing Sidebar-->

           <!--Start Hotel Pricing Sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pricing/hotels.php">
              <span class="menu-icon">
                <i class="mdi mdi-hotel"></i>
              </span>
              <span class="menu-title">Hotel</span>
            </a>
          </li>
         <!--End Hotel Pricing Sidebar-->
         
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
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $row['fname'] ?></p>
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
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$12.34</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Potential growth</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$17.34</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Revenue current</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$31.53</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Expense current</h6>
                  </div>
                </div>
              </div>
            </div>
            <!--graph of all services that users have availed-->
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Services Availed</h4>
                    <!-- <canvas id="transaction-history" class="transaction-chart"></canvas> -->
                    <!--Flight service availed-->
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Flight</h6>
                        <p class="text-muted mb-0">Transports</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0"><?php echo $row2['ROUND(SUM(flights.price),2)']; ?></h6>
                      </div>
                    </div>
                  <!--Train service availed-->
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Train</h6>
                        <p class="text-muted mb-0">Transports</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0"><?php echo $row3['ROUND(SUM(trains.price),2)']; ?></h6>
                      </div>
                    </div>

                     <!--Rent a Cab service availed-->
                     <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Rent a Cab</h6>
                        <p class="text-muted mb-0">Transports</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0"><?php echo $row1['SUM(car_rental.price)']; ?></h6>
                      </div>
                    </div>

                    <!--Hotel Services-->
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Hotels</h6>
                        <p class="text-muted mb-0">Accommodations</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0"><?php echo $row4['ROUND(SUM(hotels.price),2)']; ?></h6>
                        
                      </div>
                    </div>

                     <!--Restaurant Services-->
                     <!-- <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Restaurant</h6>
                        <p class="text-muted mb-0">Accommodations</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">$593</h6>
                      </div>
                    </div> -->

                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">Open Projects</h4>
                      <p class="text-muted mb-1">Your data status</p>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-primary">
                                <i class="mdi mdi-file-document"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Admin dashboard design</h6>
                                <p class="text-muted mb-0">Broadcast web app mockup</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">15 minutes ago</p>
                                <p class="text-muted mb-0">30 tasks, 5 issues </p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-success">
                                <i class="mdi mdi-cloud-download"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Wordpress Development</h6>
                                <p class="text-muted mb-0">Upload new design</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">1 hour ago</p>
                                <p class="text-muted mb-0">23 tasks, 5 issues </p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-info">
                                <i class="mdi mdi-clock"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Project meeting</h6>
                                <p class="text-muted mb-0">New project discussion</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">35 minutes ago</p>
                                <p class="text-muted mb-0">15 tasks, 2 issues</p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-danger">
                                <i class="mdi mdi-email-open"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Broadcast Mail</h6>
                                <p class="text-muted mb-0">Sent release details to team</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">55 minutes ago</p>
                                <p class="text-muted mb-0">35 tasks, 7 issues </p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-warning">
                                <i class="mdi mdi-chart-pie"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">UI Design</h6>
                                <p class="text-muted mb-0">New application planning</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">50 minutes ago</p>
                                <p class="text-muted mb-0">27 tasks, 4 issues </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Revenue</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">$32123</h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Sales</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">$45850</h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Purchase</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">$2039</h2>
                          <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p>
                        </div>
                        <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
       <!--Countries visited from by the users-->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Visitors by Countries</h4>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>
                                  <i class="flag-icon flag-icon-us"></i>
                                </td>
                                <td>USA</td>
                                <td class="text-right"> 1500 </td>
                                <td class="text-right font-weight-medium"> 56.35% </td>
                              </tr>
                              <tr>
                                <td>
                                  <i class="flag-icon flag-icon-de"></i>
                                </td>
                                <td>Germany</td>
                                <td class="text-right"> 800 </td>
                                <td class="text-right font-weight-medium"> 33.25% </td>
                              </tr>
                              <tr>
                                <td>
                                  <i class="flag-icon flag-icon-au"></i>
                                </td>
                                <td>Australia</td>
                                <td class="text-right"> 760 </td>
                                <td class="text-right font-weight-medium"> 15.45% </td>
                              </tr>
                              <tr>
                                <td>
                                  <i class="flag-icon flag-icon-gb"></i>
                                </td>
                                <td>United Kingdom</td>
                                <td class="text-right"> 450 </td>
                                <td class="text-right font-weight-medium"> 25.00% </td>
                              </tr>
                              <tr>
                                <td>
                                  <i class="flag-icon flag-icon-ro"></i>
                                </td>
                                <td>Romania</td>
                                <td class="text-right"> 620 </td>
                                <td class="text-right font-weight-medium"> 10.25% </td>
                              </tr>
                              <tr>
                                <td>
                                  <i class="flag-icon flag-icon-br"></i>
                                </td>
                                <td>Brasil</td>
                                <td class="text-right"> 230 </td>
                                <td class="text-right font-weight-medium"> 75.00% </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div id="audience-map" class="vector-map"></div>
                      </div>
                    </div>
                  </div>
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
    <script src="../template/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../template/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../template/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../template/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../template/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../template/assets/js/off-canvas.js"></script>
    <script src="../template/assets/js/hoverable-collapse.js"></script>
    <script src="../template/assets/js/misc.js"></script>
    <script src="../template/assets/js/settings.js"></script>
    <script src="../template/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->

    <script src="../template/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>