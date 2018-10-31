<?php 

  session_start();

  if(!isset($_SESSION["email"])){

  header("Location: index.php");

  }

  //Database Connections
  include "include/dba.php";

  $query = "SELECT * FROM users";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo "QUERY FAILED";
  }








 ?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" href="css/style.css">

    <!--Fontawesome-->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <title>Admin Area | Dashboard</title>
  </head>
  <body>
    <!--Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
      <div class="container">
        <a class="navbar-brand" href="dashboard.php">Web Based Transformer Monitoring System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link">Welcome, <?php echo $_SESSION["lastname"]." ".$_SESSION["firstname"]; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="include/logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!--Header-->
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="fa fa-gear"></span> Dashboard <small>Manage Your Transformer</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Settings
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#"><i class="fa fa-key fa-fw"></i> Change Password</a>
                <li class="dropdown-divider"></li>
                <a class="dropdown-item" href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!--Breadcrumb-->
    <section id="breadcrumb">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
      </div>
    </section>


    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="dashboard.php" class="list-group-item list-group-item-action active bg-info">
                <span class="fa fa-fw fa-gear"></span>Dashboard
              </a>
              <a href="analysis.php" class="list-group-item list-group-item-action"><span class="fa fa-area-chart"></span> Data Analysis</a>
              <a href="table.php" class="list-group-item list-group-item-action"> <span class="fa fa-table"> </span> Data Table</a>
              <a href="notifications.php" class="list-group-item list-group-item-action"> <span class="fa fa-bell"> </span> Notification </a>
              <a href="settings.php" class="list-group-item list-group-item-action"> <span class="fa fa-user"> </span>   User Profile</a>
            </div>
          </div>
          
          <div class="col-md-9">
            
            <div class="card">
              <div class="card-header bg-info text-white">
                Website Overview
              </div>
              <div class="card-body">
                <!--Inner Website Overview-->
                <div class="row">
                  <div class="col-md-3 mt-3 mb-3">
                  <div class="card bg-card" style="background-color: #007bff">
                    <div class="card-body text-center" style="color: #fff">
                      <h2> <span class="fa fa-fw fa-thermometer-empty"></span> <span id="temp"></span></h2>
                      <h6>Oil Temperature</h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mt-3 mb-3">
                  <div class="card bg-card" style="background-color: #28a745">
                    <div class="card-body text-center" style="color: #fff">
                      <h2> <span class="fa fa-fw fa-level-down"></span> <span id="level"></span></h2>
                      <h6>Oil Level</h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mt-3 mb-3">
                  <div class="card bg-card" style="background-color: #dc3545">
                    <div class="card-body text-center" style="color: #fff">
                      <h2><span class="fa fa-fw fa-indent"></span> <span id="vin"></span></h2>
                      <h6>Voltage Input</h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mt-3 mb-3">
                  <div class="card bg-card" style="background-color: #ffc107">
                    <div class="card-body text-center" style="color: #fff">
                      <h2><span class="fa fa-fw fa-outdent"></span> <span id="vout"></span></h2>
                      <h6>Voltage Output</h6>
                    </div>
                  </div>
                </div>
                </div><!--End of website overview-->
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!--Latest Users-->
    <section id="users">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <!-- <div class="card">
               <div class="card-body">
                <h5>Disk Space Used</h5>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">69%</div>
                </div>
                <h5 class="mt-4">Bandwidth Used</h5>
                <div class="progress mb-4">
                  <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">40%</div>
                </div>
              </div> 
            </div> -->
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-header bg-info text-white">
                Latest Users
              </div>
              <div class="card-body">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      while ($row = mysqli_fetch_array($result)) {
                        
                      ?>
                      
                      <tr>
                        <td><?php echo $row["user_id"]; ?></td>
                        <td><?php echo $row["user_firstname"]; ?></td>
                        <td><?php echo $row["user_lastname"]; ?></td>
                        <td><?php echo $row["user_email"]; ?></td>
                        <td><a class="btn btn-primary btn-sm text-white">Edit</a></td>
                        <td><a class="btn btn-danger btn-sm text-white">Delete</a></td>
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
    </section>

    <!--Footer-->
    <footer id="footer">
      <p>Copyright WBTMS, &copy; 2018</p>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        /*Loading Temperature Values using Ajax*/
        setInterval(function(){
          $("#temp").load("ajax/load_temperature.php");
        }, 30);
        /*Loading Liquid Level using Ajax*/
        setInterval(function(){
          $("#level").load("ajax/load_liquid_level.php");
        }, 30);
        /*Loading Voltage Input using Ajax*/
        setInterval(function(){
          $("#vin").load("ajax/load_voltage_input.php");
        }, 30);
        /*Loading Voltage Output using Ajax*/
        setInterval(function(){
          $("#vout").load("ajax/load_voltage_output.php");
        }, 30);
      });
    </script>
  </body>
</html>