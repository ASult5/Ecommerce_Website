<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>


<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from `users` where `id` = '$id' ";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("query failed");
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>





<h2 class="edit-existing">Add Order For Existing User</h2>
<div class="container add_order_form_header">
    
        <div class="mb-3">
            <label for="firstName" class="form-label"> <b>First Name</b></label>
            <p><?php echo $row['first_name'] ?> </p>
        </div>
        <div class="mb-3">
        <label for="lastName" class="form-label"> <b>Last Name</b></label>
        <p><?php echo $row['last_name'] ?> </p>
        </div>
        <div class="mb-3">
        <label for="lastName" class="form-label"> <b>Email ID</b></label>
        <p><?php echo $row['email_id'] ?> </p>
        </div>  
</div>





<div class="container pt-4">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">
                              Product Name
                          </th>
                        <th class="text-center">
                              Product Price
                          </th>
                        <th class="text-center">
                              Product Quantity
                          </th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </div>
        <button class="btn btn-md btn-primary" 
                id="addBtn" type="button">
            Add New Row
        </button>
        <button class="btn btn-md btn-success float-end" 
                id="addBtn" type="button">
            Place Order
        </button>
    </div>

<!-- Bootstrap JS CDN -->
    <script src=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity=
"sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous">
    </script>
<!-- jQuery CDN -->
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
            integrity=
"sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
            crossorigin="anonymous" referrerpolicy="no-referrer">
      </script>
<script>
    $(document).ready(() => {
        let count=1;

        $('#addBtn').click(function () {
            let dynamicRowHTML = `
            <tr class="rowClass""> 
                <td class="row-index text-center"> 
                    

                <select name="product" class="product-dropdown">

                <option selected="selected">
                Select a Product
                </option>
                <?php 
                     $products = mysqli_query($connection, "select `id`, `product_name`, `product_price`, `product_quantity` from `products`");
                     while ($row = mysqli_fetch_array($products)) {
               ?> 
    
                <option value="<?php echo $row['id']; ?>" data-price="<?php echo $row['product_price']; ?>"  data-quantity="<?php echo $row['product_quantity']; ?>">
                           <?php echo $row['product_name']; ?>
                </option>
                <?php 
            } 
            ?>
</select>



                </td> 
                <td class="row-price text-center"> 
                </td> 
                <td class="row-quantity text-center"> 
                </td> 
            </tr>`;
            $('#tbody').append(dynamicRowHTML);
            count++;
        });


        // Handle change event for product selection
        jQuery('#tbody').on('change', '.product-dropdown', function () {


              let selectedQuantity = jQuery(this).find('option:selected').data('quantity');
              jQuery(this).closest('tr').find('.row-quantity').text(selectedQuantity);

              let selectedPrice = jQuery(this).find('option:selected').data('price');
              jQuery(this).closest('tr').find('.row-price').text(selectedPrice);
              
              
          });

        // Removing Row on click to Remove button
        $('#tbody').on('click', '.remove', function () {
            $(this).parent('td.text-center').parent('tr.rowClass').remove(); 
        });
    })
</script>




<?php include('footer.php'); ?> 