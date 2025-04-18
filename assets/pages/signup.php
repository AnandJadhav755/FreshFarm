<form method="post" action="assets/php/actions.php?signup">
  <section class="h-100 bg-dark">
    <div class="container py-5 h-90">
      <div class="row d-flex justify-content-center align-items-center h-90">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <!-- Left Side Image -->
              <div class="col-xl-6 d-none d-xl-block">
                <img 
                  src="assets/images/front.jpg" 
                  alt="Sample photo" 
                  class="img-fluid" 
                  style="border-radius: 0rem 0 0 1rem; height: 787px;" 
                />
              </div>

              <!-- Right Side Form -->
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase">Registration form</h3>

                  <!-- First and Last Name -->
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div data-mdb-input-init class="form-outline">
                        <input 
                          type="text" 
                          id="fname" 
                          name="fname" 
                          value="<?=showFormData('fname')?>"
                          class="form-control form-control-lg" 
                        />
                        <label class="form-label" for="fname">First name</label>
                      </div>
                      <?=showError('fname')?>
                    </div>

                    <div class="col-md-6 mb-4">
                      <div data-mdb-input-init class="form-outline">
                        <input 
                          type="text" 
                          id="lname" 
                          name="lname" 
                          value="<?=showFormData('lname')?>"
                          class="form-control form-control-lg" 
                        />
                        <label class="form-label" for="lname">Last name</label>
                      </div>
                      <?=showError('lname')?>
                    </div>
                  </div>

                  <!-- Address -->
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input 
                      type="text" 
                      id="address" 
                      name="address" 
                      value="<?=showFormData('address')?>"
                      class="form-control form-control-lg" 
                    />
                    <label class="form-label" for="address">Address</label>
                  </div>
                  <?=showError('address')?>

                  <!-- Gender Selection -->
                  <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                    <h6 class="mb-0 me-4">Gender: </h6>
                    

                    <div class="form-check form-check-inline mb-0 me-4">
                      <input 
                        class="form-check-input" 
                        type="radio" 
                        name="gender" 
                        id="maleGender" 
                        value="male" 
                        <?=isset($_SESSION['formdata'])?'':'checked'?><?=showFormData('gender')=='male'?'checked':''?>
                      />
                      <label class="form-check-label" for="maleGender">Male</label>
                    </div>
                    
                    <div class="form-check form-check-inline mb-0 me-4">
                      <input 
                        class="form-check-input" 
                        type="radio" 
                        name="gender" 
                        id="femaleGender" 
                        value="female" 
                        <?=showFormData('gender')=='female'?'checked':''?>
                      />
                      <label class="form-check-label" for="femaleGender">Female</label>
                    </div>
                    <div class="form-check form-check-inline mb-0">
                      <input 
                        class="form-check-input" 
                        type="radio" 
                        name="gender" 
                        id="otherGender" 
                        value="other" 
                        <?=showFormData('gender')=='other'?'checked':''?>
                      />
                      <label class="form-check-label" for="otherGender">Other</label>
                    </div>
                  </div>

                  <!-- Type Selection -->
                  <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                    <h6 class="mb-0 me-4">Type: </h6>
                    <div class="form-check form-check-inline mb-0 me-4">
                      <input 
                        class="form-check-input" 
                        type="radio" 
                        name="type" 
                        id="customerType" 
                        value="customer"
                        <?=isset($_SESSION['formdata'])?'':'checked'?>
                        <?=showFormData('type')=='customer'?'checked':''?> 
                      />
                      <label class="form-check-label" for="customerType">Customer</label>
                    </div>

                    <div class="form-check form-check-inline mb-0 me-4">
                      <input 
                        class="form-check-input" 
                        type="radio" 
                        name="type" 
                        id="farmerType" 
                        value="farmer" 
                        <?=showFormData('type')=='farmer'?'checked':''?> 
                      />
                      <label class="form-check-label" for="farmerType">Farmer</label>
                    </div>
                  </div>

                  <!-- Phone Number -->
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input 
                      type="text" 
                      id="pnumber" 
                      name="pnumber" 
                      value="<?=showFormData('pnumber')?>"
                      class="form-control form-control-lg" 
                    />
                    <label class="form-label" for="pnumber">Phone No</label>
                  </div>
                  <?=showError('pnumber')?>

                  <!-- Email -->
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input 
                      type="email" 
                      id="email" 
                      name="email" 
                      value="<?=showFormData('email')?>"
                      class="form-control form-control-lg" 
                    />
                    <label class="form-label" for="email">Email ID</label>
                  </div>
                  <?=showError('email')?>
                  <!-- username -->
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input 
                      type="text" 
                      id="username" 
                      name="username" 
                      value="<?=showFormData('username')?>"
                      class="form-control form-control-lg" 
                    />
                    <label class="form-label" for="email">Username</label>
                  </div>
                  <?=showError('username')?>

                  <!-- Password -->
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input 
                      type="password" 
                      id="password" 
                      name="password" 
                      
                      class="form-control form-control-lg" 
                    />
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <?=showError('password')?>

                  <!-- Form Buttons -->
                  <div class="d-flex justify-content-end pt-3">
                    <button 
                      type="reset" 
                      class="btn btn-light btn-lg"
                    >
                      Reset all
                    </button>
                    <button 
                      type="submit" 
                      class="btn btn-warning btn-lg ms-2"
                    >
                      Submit form
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>