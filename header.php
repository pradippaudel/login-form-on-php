<?php
session_start();

if (!isset($_SESSION['username'])) {
	header('location:index.php?msg=1');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Category Page</title>
</head>
<ul>
	<li><a href="create_category.php">Create Category</a></li>
	<li><a href="list_category.php">View category</a></li>
    <li><a href="welcome.php">Welcome page</a></li>
    <li><a href="create_product.php">Add Product</a></li>
    <li><a href="list_product.php">List Product</a></li>
		
</ul>



Welcome <?php echo ucfirst($_SESSION['username']); ?>
<a href="logout.php">Logout</a>