<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo" style="display: flex; flex-wrap: wrap; justify-content: center;">
                <img src="../src/images/Logo.png" alt="logo">
              </div>
              <h4 class="text-center">Hello! let's get started</h4>
              <h6 class="font-weight-light text-center">Sign in to continue.</h6>
              <form class="pt-3" action="../src/php/AdminAdapter.php" method="POST">
                <div class="form-group">
                  <input type="text" name="username_or_email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username or E-mail">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="login">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                  </div>
                  <a href="forgot-password" class="auth-link text-black">Forgot password?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->