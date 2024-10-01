<?php include('header.php')?>


<form action="add_new_users_process.php" method="post" class="vh-100 gradient-custom" enctype="multipart/form-data">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Add New Users</h2>
              <p class="text-white-50 mb-5">Please add your user details</p>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">First Name</label>
                <input type="text" name="first_name"  class="form-control form-control-lg" />
              </div>
              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">Last Name</label>
                <input type="text" name="last_name"  class="form-control form-control-lg" />
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">Email ID</label>
                <input type="text" name="email_id"  class="form-control form-control-lg" />
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">Password</label>
                <input type="text" name="password"  class="form-control form-control-lg" /> 
              </div>

              
              <div class="form-check">
  <input class="form-check-input" type="radio" name="admin_checkbox" value="1" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Admin
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="admin_checkbox" value="0" id="flexCheckChecked" checked>
  <label class="form-check-label" for="flexCheckChecked">
    Not Admin
  </label>
</div>

              


              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="add_user_btn" value="button_clicked">Add User</button>

              

            </div>

            <?php
if (isset($_GET['error'])) {
    $errorMessage = $_GET['error'];
    echo "<p style='color:red; text-align:center; width:100%; font-size: 26px'>" . $errorMessage . "</p>";
}
?>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</form>


<?php include('footer.php')?>