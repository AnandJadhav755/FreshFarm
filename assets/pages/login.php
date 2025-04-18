<section class="vh-100" style="background-color: #8bca84;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="assets/images/New.jpg "
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 650px;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post" action="assets/php/actions.php?login">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="d-inline-block" style="width: 100px; height: 100px;"> <img src="assets/images/logo.jpg "
                    alt="login form" class="img-fluid"  /></span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="username_email" id="username_email" value="<?=showFormData('username_email')?>" class="form-control form-control-lg" />
                    <label class="form-label" for="username_email">Username/Email</label>
                  </div>
                  <?=showError('username_email')?>
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" name="password" id="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <?=showError('password')?>
                  <?=showError('checkuser')?>
                  <div class="pt-1 mb-4">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>
                  <div class="mt-3 d-flex justify-content-between align-items-center text-black">
                  <a href="?signup" class="text-decoration-none" style="color: black;">Create New Account</a>
                  <a href="?forgotpassword&newfp" class="text-decoration-none" style="color: black;">Forgot password?</a>
                  </div>

                </form>

              </div>    
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>
</html>
