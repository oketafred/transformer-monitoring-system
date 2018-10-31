<?php 

  session_start();

  if(isset($_SESSION["email"])){

  header("Location: dashboard.php");

  }
  //Declaring Variables
  $errorEmail = "";
  $errorPassword = "";

  include "include/dba.php";
  //Checking whether a Button has been Pressed
  if (isset($_POST["login"])) {
    
    //Getting Values from the input fields
    $email = $_POST["email"];
    $password = $_POST["password"];

    //Checking for Empty and Strength of the fields
    if (empty($email)) {
      $errorEmail =  "Email is required";
    }
    if (empty($password)) {
      $errorPassword = "Password is required";
    }

    //Removing Undefine characters
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE user_email = '{$email}' AND user_password = '{$password}'";

    $result = mysqli_query($conn, $query);

    if(!$result){
          
          die("QUERY FAILED". mysqli_error($conn));
      }   
      

      while($row = mysqli_fetch_array($result)){
        
        $db_user_id = $row["user_id"];
        $db_username = $row["username"];
        $db_user_password = $row["user_password"];
        $db_user_firstname = $row["user_firstname"];
        $db_user_lastname = $row["user_lastname"];
        $db_user_email = $row["user_email"]; 

        //Checking for correct password and email before giving access 
        if($email !== $db_user_email && $password !== $db_user_password){
        
            header("Location: index.php");
            
        }elseif($email == $db_user_email && $password == $db_user_password){
            $_SESSION["username"] = $db_username;
            $_SESSION["firstname"] = $db_user_firstname;
            $_SESSION["lastname"] = $db_user_lastname;
            $_SESSION["email"] = $db_user_email;
            
            
            header("Location: dashboard.php");
            
        }else{
            
            header("Location: index.php");
            
        }


    }


    





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
    
    <title>Admin Area | Login Page</title>
  <style>
    body{
      overflow: hidden;
    }
  </style>

  </head>
  <body>
    <!--Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
      <div class="container">
        <a class="navbar-brand" href="dashboard.php">Web Based Transformer Monitoring System</a>
      </div>
    </nav>

    <!--Header-->
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center">Admin Area <small>Account Login</small></h2>
          </div>
        </div>
      </div>
    </header>
    

    <section id="main"  style="margin-top: 64px">
      <div class="container">
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <div class="card">
              <div class="card-body">
                <!--Inner Website Overview-->
                  <form method="POST">
                    <div class="form-group">
                      <label for="email">Email Address</label>
                      <input type="email" class="form-control" placeholder="Enter email" name="email"> <small class="form-text text-danger"><?php echo $errorEmail; ?></small>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" placeholder="Password" name="password"> <small class="form-text text-danger"><?php echo $errorPassword; ?></small>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-info btn-block" name="login">Login</button>
                    </div>
                  </form>
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