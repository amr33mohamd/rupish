<!DOCTYPE html>
<!-- saved from url=(0050)https://colorlib.com/polygon/gentelella/login.html -->
<html lang="en" class="gr__colorlib_com"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentallela Alela! | </title>

    <!-- Bootstrap -->
    <link href="https://colorlib.com/polygon/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://colorlib.com/polygon/vendors/bootstrap/dist/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="https://colorlib.com/polygon/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login" data-gr-c-s-loaded="true">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="">
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="">
              </div>
              <div>
                <a class="btn btn-default submit" href="https://colorlib.com/polygon/gentelella/index.html">Log in</a>
                <a class="reset_pass" href="https://colorlib.com/polygon/gentelella/login.html#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br>

                <div>
                  <h1><i class="fa fa-paw"></i> AmrFrame</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="">
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="">
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="">
              </div>
              <div>
               <input  class="btn btn-default submit" type="submit" name="login" value="submit" /> 
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a admin ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br>

                <div>
                  <h1><i class="fa fa-paw"></i> AmrFrame</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  
</body></html>