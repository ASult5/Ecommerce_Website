<?php include('header.php')?>


<form action="add_new_products_process.php" method="post" class="vh-100 gradient-custom" enctype="multipart/form-data">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Add New Products</h2>
              <p class="text-white-50 mb-5">Please add your product details</p>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">Product Name</label>
                <input type="text" name="product_name"  class="form-control form-control-lg" />
              </div>
              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">Product Price</label>
                <input type="number" min=0 name="product_price"  class="form-control form-control-lg" />
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">Product Quantity</label>
                <input type="number" min=0 name="product_quantity"  class="form-control form-control-lg" />
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">Product Category</label>
                <input type="text" name="product_category"  class="form-control form-control-lg" />
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">Product Image</label>
                <input type="file" name="uploadfile" class="form-control form-control-lg" required/>
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label">Product Description</label>
                <textarea class="form-control" name="product_description" id="exampleTextarea" rows="4" placeholder="Enter your message here..."></textarea>
              </div>

              


              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="add_products_btn" value="button_clicked">Add Product</button>

              

            </div>

            <?php
if (isset($_GET['incorrect'])) {
    $errorMessage = $_GET['incorrect'];
    echo "<p style='color:white; text-align:center; width:100%; font-size: 26px'>" . $errorMessage . "</p>";
}
?>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</form>


<?php include('footer.php')?>