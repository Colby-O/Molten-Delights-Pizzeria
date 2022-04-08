<?php
/* shoppingCartAddItem.php */
session_start();

chdir("../");
include("connectToDatabase.php");

$customerID = $_SESSION['customer_id'];
$productID = $_GET['productID'];

$query = "SELECT  my_Order.order_id, my_Order.order_status, my_Order.customer_id
          FROM my_Order
          WHERE my_Order.order_status = 'IP' and
                my_Order.customer_id = $customerID";
$orders = mysqli_query($db, $query);
$order = mysqli_fetch_array($orders, MYSQLI_ASSOC);
$orderID = $order["order_id"];

$query = "SELECT * 
          FROM my_Product
          WHERE product_id = '$productID'";
$products = mysqli_query($db, $query);
$product = mysqli_fetch_array($products);
$productName = $product["name"];
$productQuantity = $product["quantity"];

$quantityRequested = $_GET["quantity"];
if ($quantityRequested == 0 or $quantityRequested > $productQuantity) { 
    $goto = "../pages/shoppingCart.php?productID=$productID&retryingQuantity=true";
    header("Location: $goto");
    exit(0);
} else {
    $productPrice = $product["price"];
    $query = "INSERT INTO my_OrderItem
              (
                  order_item_name,
                  order_item_status,
                  order_id,
                  product_id,
                  quantity,
                  price
             )
             VALUES
             (
                 '$productName',
                 'IP',
                 '$orderID',
                 '$productID',
                 '$quantityRequested',
	         '$productPrice'
	     )";

    $success = mysqli_query($db, $query);
    if(!$success) {
        echo "Error: INSERT failed in shoppingCartAddItem.";
	exit(0);
    }
}

$goto = "../pages/shoppingCart.php?productID=view";
header("Location: $goto");

mysqli_close($db);
?>

