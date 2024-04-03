<?php
  require './samples/config.php';
  // echo $_SESSION["cust_id"];
  if(!empty($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $result0 = mysqli_query($conn,"SELECT * FROM `admin` WHERE admin_id = $admin_id");
    $row0 = mysqli_fetch_array($result0);
    // $result = mysqli_query($conn,"SELECT * FROM `customer_main`;");
    // $row = mysqli_fetch_array($result);
    // $num_rows = mysqli_num_rows($result);
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
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small"><a href="../template/samples/logout.php">Log Out</a></p>
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


        <!--Pricing sidebar -->
        <!--Start Flight Pricing sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pricing/flights.php">
              <span class="menu-icon">
                <i class="mdi mdi-airplane"></i>
              </span>
              <span class="menu-title">Flight</span>
            </a>
          </li>
        <!--End Flight Pricing sidebar-->

        <!-- Start Train Pricing sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pricing/trains.php">
              <span class="menu-icon">
                <i class="mdi mdi-train"></i>
              </span>
              <span class="menu-title">Train</span>
            </a>
          </li>
        <!--End train Pricing sidebar-->

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


        <!--Start Vehicle Rental Pricing sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pricing/rentalvehicle.php">
              <span class="menu-icon">
                <i class="mdi mdi-car"></i>
              </span>
              <span class="menu-title">Rental Vehicle </span>
            </a>
          </li>
        <!--End Vehicle Rental Pricing sidebar-->

        <!--Start Hotel Pricing sidebar-->
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pricing/hotels.php">
              <span class="menu-icon">
                <i class="mdi mdi-hotel"></i>
              </span>
              <span class="menu-title">Hotel</span>
            </a>
          </li>
        <!--End Hotel Pricing sidebar-->
         
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
              <h3 class="page-title"> Bookings</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Booking Entries</a></li>
                  <li class="breadcrumb-item active" aria-current="page">All Bookings done y the users are displayed</li>
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
                          <th>Booking Id</th>
                          <th>Confirmation no.</th>
                          <th>Itinerary Id</th>
                          <th>Flight details</th>
                          <th>Train details</th>
                          <th>Hotel details</th>
                          <th>Rental car details</th>
                          <th>Restaurant details </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>987654</td><!--User ID-->
                          <td>XYZ123</td><!--Booking ID-->
                          <td>123456789</td><!--Booking ID-->
                          <td>456789</td>
                          <td>ITN987</td>  
                          <td>Airline: Delta Airlines<br>
                              Flight Number: DL123<br>
                              Departure: New York (JFK)<br>
                              Destination: Los Angeles (LAX)<br>
                              Departure Date: 2024-03-15<br>
                              Departure Time: 10:00 AM</td> 
                          <td>Train Operator: Amtrak<br>
                              Train Number: A789<br>
                              Departure: Chicago Union Station<br>
                              Destination: San Francisco Station<br>
                              Departure Date: 2024-03-20<br>
                              Departure Time: 8:00 AM</td>
                          <td>Hotel Name: Grand Hyatt
                              Location: Downtown San Francisco<br>
                              Check-in Date: 2024-03-20<br>
                              Check-out Date: 2024-03-25<br>
                              </td>
                              <td>Restaurant Name: The Bistro at Golden Gate<br>
                                  Location: San Francisco, CA<br>
                                  Reservation Date: 2024-03-22<br>
                                  Reservation Time: 7:00 PM<br>
                                  Number of Guests: 4<br>
                                  Special Requests: Window seat with a view of the Golden Gate Bridge<br>
                                  Contact Number: +1 (555) 123-4567<br>
                                  </td>
                                  <td>
                                    <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal" data-target="#showMoreModal1">Show More</button>
                                    <button type="button" class="btn btn-outline-info btn-fw" data-toggle="modal" data-target="#editModal1">Edit</button>
                                    <button type="button" class="btn btn-outline-danger btn-fw" data-toggle="modal" data-target="#deleteModal1">Delete</button>
                                  </td>
                        </tr>
                        <tr>
                          <th scope="row">123456</th><!--User ID-->
                                    <td>ABC789</td><!--Booking ID-->
                                    <td>987654321</td><!--Confirmation no.-->
                                    <td>654321</td><!--Itinerary ID-->
                                    <td>ITN456</td><!--Itinerary ID-->
                                    <td>
                                        Airline: United Airlines<br>
                                        Flight Number: UA456<br>
                                        Departure: Los Angeles (LAX)<br>
                                        Destination: New York (JFK)<br>
                                        Departure Date: 2024-04-20<br>
                                        Departure Time: 1:00 PM
                                    </td> 
                                    <td>
                                        Train Operator: Amtrak<br>
                                        Train Number: A123<br>
                                        Departure: San Francisco Station<br>
                                        Destination: Chicago Union Station<br>
                                        Departure Date: 2024-04-25<br>
                                        Departure Time: 10:00 AM
                                    </td>
                                    <td>
                                        Hotel Name: Hilton Garden Inn<br>
                                        Location: Midtown Manhattan, New York<br>
                                        Check-in Date: 2024-04-20<br>
                                        Check-out Date: 2024-04-25
                                    </td>
                                    <td>
                                        Restaurant Name: The French Laundry<br>
                                        Location: Yountville, CA<br>
                                        Reservation Date: 2024-04-22<br>
                                        Reservation Time: 7:30 PM<br>
                                        Number of Guests: 2<br>
                                        Special Requests: Private dining room<br>
                                        Contact Number: +1 (555) 987-6543
                                    </td>
                                    <td>
                                      <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal" data-target="#showMoreModal1">Show More</button>
                                      <button type="button" class="btn btn-outline-info btn-fw" data-toggle="modal" data-target="#editModal1">Edit</button>
                                      <button type="button" class="btn btn-outline-danger btn-fw" data-toggle="modal" data-target="#deleteModal1">Delete</button>
                                    </td>
                        </tr>



        <!-- partial -->
        <!--
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic Table</h4>
                    <p class="card-description"> Add class <code>.table</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Profile</th>
                            <th>VatNo.</th>
                            <th>Created</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Jacob</td>
                            <td>53275531</td>
                            <td>12 May 2017</td>
                            <td><label class="badge badge-danger">Pending</label></td>
                          </tr>
                          <tr>
                            <td>Messsy</td>
                            <td>53275532</td>
                            <td>15 May 2017</td>
                            <td><label class="badge badge-warning">In progress</label></td>
                          </tr>
                          <tr>
                            <td>John</td>
                            <td>53275533</td>
                            <td>14 May 2017</td>
                            <td><label class="badge badge-info">Fixed</label></td>
                          </tr>
                          <tr>
                            <td>Peter</td>
                            <td>53275534</td>
                            <td>16 May 2017</td>
                            <td><label class="badge badge-success">Completed</label></td>
                          </tr>
                          <tr>
                            <td>Dave</td>
                            <td>53275535</td>
                            <td>20 May 2017</td>
                            <td><label class="badge badge-warning">In progress</label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Hoverable Table</h4>
                    <p class="card-description"> Add class <code>.table-hover</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>User</th>
                            <th>Product</th>
                            <th>Sale</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Jacob</td>
                            <td>Photoshop</td>
                            <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td>
                            <td><label class="badge badge-danger">Pending</label></td>
                          </tr>
                          <tr>
                            <td>Messsy</td>
                            <td>Flash</td>
                            <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i></td>
                            <td><label class="badge badge-warning">In progress</label></td>
                          </tr>
                          <tr>
                            <td>John</td>
                            <td>Premier</td>
                            <td class="text-danger"> 35.00% <i class="mdi mdi-arrow-down"></i></td>
                            <td><label class="badge badge-info">Fixed</label></td>
                          </tr>
                          <tr>
                            <td>Peter</td>
                            <td>After effects</td>
                            <td class="text-success"> 82.00% <i class="mdi mdi-arrow-up"></i></td>
                            <td><label class="badge badge-success">Completed</label></td>
                          </tr>
                          <tr>
                            <td>Dave</td>
                            <td>53275535</td>
                            <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                            <td><label class="badge badge-warning">In progress</label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> Add class <code>.table-striped</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> User </th>
                            <th> First name </th>
                            <th> Progress </th>
                            <th> Amount </th>
                            <th> Deadline </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                            </td>
                            <td> Herman Beck </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $ 77.99 </td>
                            <td> May 15, 2015 </td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
                            </td>
                            <td> Messsy Adam </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $245.30 </td>
                            <td> July 1, 2015 </td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />
                            </td>
                            <td> John Richards </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $138.00 </td>
                            <td> Apr 12, 2015 </td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-4.png" alt="image" />
                            </td>
                            <td> Peter Meggik </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $ 77.99 </td>
                            <td> May 15, 2015 </td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                            </td>
                            <td> Edward </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $ 160.25 </td>
                            <td> May 03, 2015 </td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
                            </td>
                            <td> John Doe </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $ 123.21 </td>
                            <td> April 05, 2015 </td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />
                            </td>
                            <td> Henry Tom </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $ 150.00 </td>
                            <td> June 16, 2015 </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bordered table</h4>
                    <p class="card-description"> Add class <code>.table-bordered</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> First name </th>
                            <th> Progress </th>
                            <th> Amount </th>
                            <th> Deadline </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td> 1 </td>
                            <td> Herman Beck </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $ 77.99 </td>
                            <td> May 15, 2015 </td>
                          </tr>
                          <tr>
                            <td> 2 </td>
                            <td> Messsy Adam </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $245.30 </td>
                            <td> July 1, 2015 </td>
                          </tr>
                          <tr>
                            <td> 3 </td>
                            <td> John Richards </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $138.00 </td>
                            <td> Apr 12, 2015 </td>
                          </tr>
                          <tr>
                            <td> 4 </td>
                            <td> Peter Meggik </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $ 77.99 </td>
                            <td> May 15, 2015 </td>
                          </tr>
                          <tr>
                            <td> 5 </td>
                            <td> Edward </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $ 160.25 </td>
                            <td> May 03, 2015 </td>
                          </tr>
                          <tr>
                            <td> 6 </td>
                            <td> John Doe </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $ 123.21 </td>
                            <td> April 05, 2015 </td>
                          </tr>
                          <tr>
                            <td> 7 </td>
                            <td> Henry Tom </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $ 150.00 </td>
                            <td> June 16, 2015 </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Inverse table</h4>
                    <p class="card-description"> Add class <code>.table-dark</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> First name </th>
                            <th> Amount </th>
                            <th> Deadline </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td> 1 </td>
                            <td> Herman Beck </td>
                            <td> $ 77.99 </td>
                            <td> May 15, 2015 </td>
                          </tr>
                          <tr>
                            <td> 2 </td>
                            <td> Messsy Adam </td>
                            <td> $245.30 </td>
                            <td> July 1, 2015 </td>
                          </tr>
                          <tr>
                            <td> 3 </td>
                            <td> John Richards </td>
                            <td> $138.00 </td>
                            <td> Apr 12, 2015 </td>
                          </tr>
                          <tr>
                            <td> 4 </td>
                            <td> Peter Meggik </td>
                            <td> $ 77.99 </td>
                            <td> May 15, 2015 </td>
                          </tr>
                          <tr>
                            <td> 5 </td>
                            <td> Edward </td>
                            <td> $ 160.25 </td>
                            <td> May 03, 2015 </td>
                          </tr>
                          <tr>
                            <td> 6 </td>
                            <td> John Doe </td>
                            <td> $ 123.21 </td>
                            <td> April 05, 2015 </td>
                          </tr>
                          <tr>
                            <td> 7 </td>
                            <td> Henry Tom </td>
                            <td> $ 150.00 </td>
                            <td> June 16, 2015 </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Table with contextual classes</h4>
                    <p class="card-description"> Add class <code>.table-{color}</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> First name </th>
                            <th> Product </th>
                            <th> Amount </th>
                            <th> Deadline </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="table-info">
                            <td> 1 </td>
                            <td> Herman Beck </td>
                            <td> Photoshop </td>
                            <td> $ 77.99 </td>
                            <td> May 15, 2015 </td>
                          </tr>
                          <tr class="table-warning">
                            <td> 2 </td>
                            <td> Messsy Adam </td>
                            <td> Flash </td>
                            <td> $245.30 </td>
                            <td> July 1, 2015 </td>
                          </tr>
                          <tr class="table-danger">
                            <td> 3 </td>
                            <td> John Richards </td>
                            <td> Premeire </td>
                            <td> $138.00 </td>
                            <td> Apr 12, 2015 </td>
                          </tr>
                          <tr class="table-success">
                            <td> 4 </td>
                            <td> Peter Meggik </td>
                            <td> After effects </td>
                            <td> $ 77.99 </td>
                            <td> May 15, 2015 </td>
                          </tr>
                          <tr class="table-primary">
                            <td> 5 </td>
                            <td> Edward </td>
                            <td> Illustrator </td>
                            <td> $ 160.25 </td>
                            <td> May 03, 2015 </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
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
</php>