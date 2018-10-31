<?php 

  session_start();

  if(!isset($_SESSION["email"])){

  header("Location: index.php");

  }

  //Database Connection
  include "include/dba.php";

  $query_table = "SELECT * FROM parameters";

  $result_table = mysqli_query($conn, $query_table);

  if (!$result_table) {
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

    <title>Admin Area | Table</title>
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
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tables</li>
          </ol>
        </nav>
      </div>
    </section>


    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="dashboard.php" class="list-group-item list-group-item-action">
                <span class="fa fa-fw fa-gear"></span>Dashboard
              </a>
              <a href="analysis.php" class="list-group-item list-group-item-action"><span class="fa fa-area-chart"></span> Data Analysis</a>
              <a href="table.php" class="list-group-item list-group-item-action active bg-info"> <span class="fa fa-table"> </span> Data Table</a>
              <a href="notifications.php" class="list-group-item list-group-item-action"> <span class="fa fa-bell"> </span> Notification </a>
              <a href="settings.php" class="list-group-item list-group-item-action"> <span class="fa fa-user"> </span>   User Profile</a>
            </div>
          </div>
          <div class="col-md-9">
            
            <div class="card">
              <div class="card-header bg-info text-white">
                Table Overview
              </div>
              <div class="card-body">
                <!--Inner Website Overview-->
                  <table class="table table-striped table-sm">
                    <thead>
                      <tr>
                        <th>Date Time</th>
                        <th>Sender</th>
                        <th>Temperature</th>
                        <th>Depth</th>
                        <th>Voltage Input</th>
                        <th>Voltage Output</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 

                        while ($row = mysqli_fetch_array($result_table)) {
                            
                              
                            ?>
                            <tr>
                            <td><?php echo $row["inserted_time"]; ?></td>
                            <td><?php echo $row["parameter_id"]; ?></td> 
                            <td><?php echo $row["temperature"]; ?></td>                       
                            <td><?php echo $row["liquid_level"]; ?></td> 
                            <td><?php echo $row["voltage_input"]; ?></td> 
                            <td><?php echo $row["voltage_output"]; ?></td> 
                            </tr>

                        <?php

                        }



                       ?>
                    </tbody>
                  </table>
                </div><!--End of website overview-->
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
  </body>
</html>