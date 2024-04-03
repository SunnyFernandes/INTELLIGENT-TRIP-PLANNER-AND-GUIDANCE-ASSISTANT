<?php
  require '../samples/config.php';
  // echo $_SESSION["cust_id"];
  if(!empty($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $result0 = mysqli_query($conn,"SELECT * FROM `admin` WHERE admin_id = $admin_id");
    $row0 = mysqli_fetch_array($result0);
    $result = mysqli_query($conn,"SELECT * FROM `trains`;");
    $row = mysqli_fetch_array($result);
    $num_rows = mysqli_num_rows($result);
  }
  else{
    header("location: ../samples/login.php");
  }
?>
<!DOCTYPE html>
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
        <!-- partial:partials/_navbar.html -->
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
          <h3 class="page-title">Train </h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Pricing</a></li>
              <li class="breadcrumb-item active" aria-current="page">Train</li>
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
                      <th>Train ID</th>
                      <th>Vendor</th>
                      <th>Amount (Vendor)</th>
                      <th>Amount (Admin)</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                            <td><?php echo $row['train_id']; ?> </td>
                            <td><?php echo $row['train_number']; ?> </td>
                            <td><?php echo $row['train_name']; ?> </td>
                            <td><?php echo $row['depart_station']; ?> </td>
                            <td><?php echo $row['arrive_station']; ?> </td> <!--itinearay id-->
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
                        <tr>
                        <?php
                          for ($i = 1; $i < $num_rows; $i++) {
                            $row = mysqli_fetch_array($result);
                              // echo $row . "<br>"; ?>
                            <tr>
                            <td><?php echo $row['train_id']; ?> </td>
                            <td><?php echo $row['train_number']; ?> </td>
                            <td><?php echo $row['train_name']; ?> </td>
                            <td><?php echo $row['depart_station']; ?> </td>
                            <td><?php echo $row['arrive_station']; ?> </td> <!--itinearay id-->
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
        <!--<div class="row">
          <div class="col-lg-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Basic dropdown</h4>
                <p class="card-description"> Wrap the dropdown’s toggle (your button or link) and the dropdown menu within <code>.dropdown</code>
                </p>
                <div class="template-demo">
                  <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Dropdown outline</h4>
                <p class="card-description"> Add class <code>.btn-outline-{color}</code> to the button inside <code>.dropdown</code>
                </p>
                <div class="template-demo">
                  <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuOutlineButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton2">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuOutlineButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton3">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button class="btn btn-outline-warning dropdown-toggle" type="button" id="dropdownMenuOutlineButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton4">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuOutlineButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton5">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuOutlineButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton6">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Split button dropdowns</h4>
                <p class="card-description"> Wrap two buttons in <code>.btn-group</code> and add <code>.dropdown-toggle-split</code> to the toggling button </p>
                <div class="template-demo">
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Dropdown</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger">Dropdown</button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton2">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-success">Dropdown</button>
                    <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton3">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-secondary">Dropdown</button>
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton4">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Dropdown</button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton5">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-warning">Dropdown</button>
                    <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton6">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Icon dropdowns</h4>
                <p class="card-description"> Add icon tags instead of text </p>
                <div class="row">
                  <div class="col-12">
                    <div class="template-demo d-flex justify-content-between">
                      <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="mdi mdi-earth"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                          <h6 class="dropdown-header">Settings</h6>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                      </div>
                      <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuIconButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="mdi mdi-trophy-outline"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton2">
                          <h6 class="dropdown-header">Settings</h6>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                      </div>
                      <div class="dropdown">
                        <button type="button" class="btn btn-outline-info dropdown-toggle" id="dropdownMenuIconButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="mdi mdi-clock"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton3">
                          <h6 class="dropdown-header">Settings</h6>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="template-demo d-flex justify-content-between">
                      <div class="dropdown">
                        <button type="button" class="btn btn-success dropdown-toggle" id="dropdownMenuIconButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="mdi mdi-heart"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton4">
                          <h6 class="dropdown-header">Settings</h6>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                      </div>
                      <div class="dropdown">
                        <button type="button" class="btn btn-warning dropdown-toggle" id="dropdownMenuIconButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="mdi mdi-logout"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton5">
                          <h6 class="dropdown-header">Settings</h6>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                      </div>
                      <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="mdi mdi-security"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                          <h6 class="dropdown-header">Settings</h6>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="template-demo d-flex justify-content-between">
                      <div class="dropdown">
                        <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="mdi mdi-account"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
                          <h6 class="dropdown-header">Settings</h6>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                      </div>
                      <div class="dropdown">
                        <button type="button" class="btn btn-info dropdown-toggle" id="dropdownMenuIconButton8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="mdi mdi-bell"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton8">
                          <h6 class="dropdown-header">Settings</h6>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                      </div>
                      <div class="dropdown">
                        <button type="button" class="btn btn-success dropdown-toggle" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="mdi mdi-account"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton9">
                          <h6 class="dropdown-header">Settings</h6>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Dropup variation</h4>
                <p class="card-description"> Add class <code>.dropup</code>
                </p>
                <div class="template-demo">
                  <div class="btn-group dropup">
                    <button type="button" class="btn btn-primary">Dropdown</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropupMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropupMenuSplitButton1">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="btn-group dropup">
                    <button type="button" class="btn btn-danger">Dropdown</button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" id="dropupMenuSplitButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropupMenuSplitButton2">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="btn-group dropup">
                    <button type="button" class="btn btn-success">Dropdown</button>
                    <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" id="dropupMenuSplitButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropupMenuSplitButton3">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="btn-group dropup">
                    <button type="button" class="btn btn-secondary">Dropdown</button>
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropupMenuSplitButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropupMenuSplitButton4">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="btn-group dropup">
                    <button type="button" class="btn btn-info">Dropdown</button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" id="dropupMenuSplitButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropupMenuSplitButton5">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="btn-group dropup">
                    <button type="button" class="btn btn-warning">Dropdown</button>
                    <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" id="dropupMenuSplitButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropupMenuSplitButton6">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Dropdown sizes</h4>
                <p class="card-description"> Add class <code>.btn-{size}</code> to dropdown buttons </p>
                <div class="template-demo mt-5">
                  <div class="dropdown">
                    <button class="btn btn-danger btn-lg dropdown-toggle" type="button" id="dropdownMenuSizeButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton1">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuSizeButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                      <h6 class="dropdown-header">Settings</h6>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
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
</html>