<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>





<?php if(isset($_SESSION['admin_id'])){
  
  header("location:admin_access.php");

}


?>

<nav>
    <ul>
      <li style="color:#fff">
          <?php
          session_start();
          if (isset($_SESSION['name'])) {
              echo  "<b style='color:#262626'> Welcome " . $_SESSION['name'] . "</b>";

          }
          else{
              echo "<b style='color:#262626'> Welcome Guest </b>";
          }
          ?>
       </li>
        <li><a href="">Home</a></li>
        <li><a href="">Contact</a></li>
         <li>
            
         <button type="button" class="cart-btn" data-bs-toggle="modal" data-bs-target="#shoppingCartModal">
         <i class="ri-shopping-cart-2-line"></i>
      </button>
         
        </li>
         <li class="logout">



         <?php
if (isset($_SESSION['name'])) {
    echo "<a href='logout.php'>
            <i class='ri-logout-box-r-line' style='color:#262626'></i>
          </a>";
} else {
    echo "<a href='sign_in.php' style='color:#262626'>
            Sign In
          </a>";
}
?>



            </li>
    </ul>
</nav>


<div class="previous-orders">


        <?php
          if (isset($_SESSION['name'])) {
              $id = $_SESSION['id'];
              echo  "<a href='previous_orders.php?id=$id' style='color:#262626'> Previous Orders </a>";

          }
          ?>
          </div>  
       

<div class="modal fade" id="shoppingCartModal" tabindex="-1" aria-labelledby="shoppingCartModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="shoppingCartModalLabel">
              Shopping Cart
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody>
<?php
if (!empty($_SESSION['cart'])) {
    $_SESSION['total'] = 0;

    foreach($_SESSION['cart'] as $key => $item) { ?>
        <tr>
            <td><?php echo $item['product_name']; ?></td>
            <td>$<?php echo $item['product_price']; ?></td>
            <?php $_SESSION['total'] += $item['product_price']; ?>
            <td>  
              
                <input type="hidden" name="key" value="<?php echo $key; ?>">
                <input type="number" name="quantity" id="quantity" min="1" max="5" value="1" style="text-align:center;" onkeydown="return false" onchange="updateCart(<?php echo $key; ?>, this.value)" >
          
            </td>
            <td>
                <a class="btn btn-sm btn-danger" href="delete_items.php?key=<?php echo $key; ?>">Remove</a>
            </td>
        </tr>
    <?php
    }
} else {
    echo "<tr><td colspan='3'>Your cart is empty.</td></tr>";
}
?>
<tr>
    <td colspan="2" class="text-end">Total:</td>
    <td>$<?php echo empty($_SESSION['cart']) ? 0 : $_SESSION['total']; ?></td>
</tr>
</tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <a href="checkout.php">
            <button type="button" class="btn btn-primary" name="checkout-btn">
              Proceed to Checkout 
            </button>
            </a>
          </div>
        </div>
      </div>
    </div>
<div class="products">
<?php


$query = "select * from `products`";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("query failed");
} else {

    while ($row = mysqli_fetch_assoc($result)) {
?>

    <div class="card" style="width: 18rem;">
        <img src="<?php echo $row['product_image']?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row['product_name']?></h5>
            <p class="card-text"><?php echo $row['product_description']?></p>
            <h5 class="card-title card-title-price"> Price - $<?php echo $row['product_price']?></h5>
            <a href="order_place.php?id=<?php echo $row['id']; ?>" class="btn btn-success" name="order_button">Add to Cart</a>
            <a href="#" class="btn btn-primary">Details </a>
        </div>
    </div>
    
    <?php } 
    }
    ?>
    </div>


   


<?php include('footer.php'); ?>
