<!DOCTYPE html>
<html lang="en">

<head>
  @include('Login2.components.head')
</head>

<body>
  <!-- Content Start -->

  <!-- Background Animation Start -->
  <div id="bg">
    <canvas></canvas>
    <canvas></canvas>
    <canvas></canvas>
  </div>
  <!-- Background Animation End -->
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="/img/Admin.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <h1>ADMIN LOGIN</h1>
              </div>
              <p class="login-card-description">School Management System</p>
              <form action="#!">
                <div class="form-group">
                  <label for="NIC" class="">NIC No</label>
                  <input type="text" name="NIC" id="NIC" class="form-control" placeholder="NIC Number">
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="">Password</label>
                  <input id="password-field" type="password" class="form-control" name="password"
                    placeholder="Enter Password">
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password mr-2"></span>
                </div>
                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
              </form>
              <a href="#!" class="forgot-password-link">Forgot password?</a>
              <p class="login-card-footer-text">Login as a <a href="#!" class="text-reset "><u>Teacher</u></a>
              </p>
              <nav class="login-card-footer-nav">
                <a href="https://eversoft.cf/">Terms of use.</a>
                <a href="https://eversoft.cf/">EverSoft it Solutions.</a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Content End -->

  <!-- JavaScript File -->
  @include('Login2.components.javaScript')
</body>

</html>