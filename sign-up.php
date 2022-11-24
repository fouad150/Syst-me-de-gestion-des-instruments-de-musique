<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title></title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- ================== css ================== -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <!-- ================== css ================== -->
  <!-- BEGIN parsley css-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/doc/assets/docs.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css">
  <!-- END parsley css-->

  <!-- BEGIN jquery js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- END jquery js-->

  <!-- BEGIN parsley js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- END parsley js-->
</head>

<body>
  <div style="height: 100vh;   background-color: #f2f2f2; ">
    <div class="h-100 p-0 m-0">
      <div class="row h-100">
        <div class="col-sm-12 col-md-8 col-lg-6">
          <div class="p-5 ">
            <div class="text-center">
              <h3 class="text-dark">Sign Up</h3>
            </div>
            <form action="registration.php" method="post" data-parsley-validate>
              <?php
              if (isset($_SESSION['err-singup'])) {
                echo "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Sign up Failed! </strong>  " . $_SESSION['err-singup'] . "
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                unset($_SESSION['err-singup']);
              }
              ?>
              <?php
              if (isset($_SESSION['err-empty-validation'])) {
                echo "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>" . $_SESSION['err-empty-validation'] . "</strong>  
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                unset($_SESSION['err-empty-validation']);
              }
              ?>
              <?php
              if (isset($_SESSION['err-email-validation'])) {
                echo "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>" . $_SESSION['err-email-validation'] . "</strong>  
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                unset($_SESSION['err-email-validation']);
              }
              ?>
              <hr class="mb-3">
              <label for="firstname"><b>First Name</b></label>
              <input class="form-control" type="text" name="first_name" required>
              <label for="lastname"><b>Last Name</b></label>
              <input class="form-control" type="text" name="last_name" required>
              <label for="email"><b>Email Address</b></label>
              <input class="form-control" type="email" name="email" data-parsley-trigger="keyup" required>
              <label for="password"><b>Password</b></label>
              <input class="form-control" type="password" name="password" data-parsley-minlength="8" required>
              <hr class="mb-3">
              <input class="btn btn-primary w-100" type="submit" name="sign_up" value="Sign Up">
              <a href="login.php">I have already an account</a>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-6  image_login_signup" style="background-image: url('assests/bg.jpg');background-size:cover;">

        </div>
      </div>
    </div>
    </form>
  </div>
  <style>
    body {
      overflow-x: hidden;
    }
  </style>
</body>

</html>