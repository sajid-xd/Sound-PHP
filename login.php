<?php
   include "backend.php";
   ?>
<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from coderthemes.com/hyper/saas/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Jul 2022 14:50:54 GMT -->
   <head>
      <meta charset="utf-8" />
      <title>Sign In</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
      <meta content="Coderthemes" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="assets/images/fav-icon.ico">
      <!-- App css -->
      <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
   </head>
   <body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>
      <div class="auth-fluid">
         <!--Auth fluid left content -->
         <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
               <div class="card-body">
                  <!-- Logo -->
                  <div class="auth-brand text-center text-lg-start">
                     <a href="index.html" class="logo-dark">
                     <span><img src="assets/images/dark_logo.png" alt="Sound" height="80"></span>
                     </a>
                     <a href="index.html" class="logo-light">
                     <span><img src="assets/images/logo.png" alt="" height="18"></span>
                     </a>
                  </div>
                  <!-- title-->
                  <h4 class="mt-0">Sign In</h4>
                  <p class="text-muted mb-4">Enter your user name and password to access account.</p>
                  <!-- form -->
                  <form method="post">
                     <div class="mb-3">
                        <label for="username" class="form-label">User Name</label>
                        <input class="form-control" type="text" id="emailaddress" required="" placeholder="Enter your user name" name="username">
                     </div>
                     <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" type="password" required="" id="password" placeholder="Enter your password" name="password">
                     </div>
                     <div class="d-grid mb-0 text-center">
                        <button class="btn btn-primary" type="submit" name="login"><i class="mdi mdi-login"></i> Log In </button>
                     </div>
                     <?php
                        if(isset($_SESSION['error'])){
                        ?>
                     <br>
                     <div class="alert alert-danger text-center" role="alert">
                        <?=  $_SESSION['error']?>
                     </div>
                     <?php
                        }
                        ?>
                     </br>
                     <div class="mb-3" bis_skin_checked="1">
                        <a href="index.php" class="text" bis_skin_checked="1">Go back to main page.</a>                     
                     </div>
                  </form>
                  <!-- end form-->
                  <!-- Footer-->
                  <footer class="footer footer-alt">
                     <p class="text-muted">Don't have an account? <a href="signup.php" class="text-muted ms-1"><b>Sign Up</b></a></p>
                  </footer>
               </div>
               <!-- end .card-body -->
            </div>
            <!-- end .align-items-center.d-flex.h-100-->
         </div>
         <!-- end auth-fluid-form-box-->
         <!-- Auth fluid right content -->
         <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
               <h2 class="mb-3">Wellcome To SOUND!</h2>
               <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very much! . <i class="mdi mdi-format-quote-close"></i>
               </p>
               <p>
                  - Sound User
               </p>
            </div>
            <!-- end auth-user-testimonial-->
         </div>
         <!-- end Auth fluid right content -->
      </div>
      <!-- end auth-fluid-->
      <!-- bundle -->
      <script src="assets/js/vendor.min.js"></script>
      <script src="assets/js/app.min.js"></script>
   </body>
   <!-- Mirrored from coderthemes.com/hyper/saas/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Jul 2022 14:50:54 GMT -->
</html>