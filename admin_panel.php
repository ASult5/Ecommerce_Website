<?php include ("header.php"); ?>


<div class="admin-panel-heading">
    <h1> Admin Panel</h1>
</div>

<h3 class="admin-welcome">
    <?php 
    session_start();
    echo "Welcome " . $_SESSION['admin_name'];
    ?>
</h3>

<div class="admin-options">
    <ul>
        <li><a href="add_new_products.php">Add New Products</a></li>
        <li><a href="view_edit_products.php">View/Edit Products</a></li>
        <li><a href="add_new_user.php">Add New User</a></li>
        <li><a href="view_edit_users.php">View/Edit Users</a></li>
        <li><a href="view_current_orders.php">View Current Orders</a></li>
        <li><a href="add_orders_for_admin.php">Add An Order For Existing User</a></li>
    </ul>
</div>

<?php include ("footer.php"); ?>