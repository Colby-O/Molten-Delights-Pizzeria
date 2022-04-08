<?php
/* checkoutProcess.php */
include("connectToDatabase.php");
displayReceipt($db, $customerID);

$query = "SELECT my_Order.order_id, my_Order.customer_id, my_Order.order_status, my_OrderItem.*
          FROM my_OrderItem, my_Order
          WHERE my_Order.order_id = my_OrderItem.order_id and
                my_Order.order_status = 'IP'              and
                my_Order.customer_id = $customerID";

$ordersInProgress = mysqli_query($db, $query);
$orderInProgress = mysqli_fetch_array($ordersInProgress);
$orderID = $orderInProgress['order_id'];

markOrderPaid($db, $customerID, $orderID);
markOrderItemsPaid($db, $orderID);
mysqli_close($db);

function displayReceipt($db, $customerID) {
    $items = getExistingOrder($db, $customerID);
    $numOrders = mysqli_num_rows($items);

    if ($numOrders == 0) {
        echo "
            <h4 class='w3-center'>Shopping Cart</h4>
            <h4 class='w3-center'>Your shopping cart is empty.</h4>
	    <h4 class='w3-center'> to continue shopping, please <a href='pages/catalog.php'>click here</a>.</h4>";
       include("common/footer.html");
       exit(0);
    } else {
        displayReceiptHeader();
	$grandTotal = 0;
	for ($i = 0; $i < $numOrders; $i++) {
            $order = mysqli_fetch_array($items, MYSQLI_ASSOC);
	    $grandTotal += displayItemAndReturnPrice($db, $order);
	}
	displayReceiptFooter($grandTotal);
    }
}

function getExistingOrder($db, $customerID) {
    $query = "SELECT my_Order.order_id, my_Order.customer_id, my_Order.order_status, my_OrderItem.*
              FROM my_OrderItem, my_Order
              WHERE my_Order.order_id = my_OrderItem.order_id and
                    my_Order.order_status = 'IP'              and
                    my_Order.customer_id = '$customerID'";
    $items = mysqli_query($db, $query);
    return $items;

}

function displayReceiptHeader() {
    $date = date("F j, Y");
    $time = date("g:ia");

    echo "
        <p class='w3-center'><strong>***** R E C E I P T *****</strong></p>
        <h4 class='w3-center'>
          Payment received from
          $_SESSION[salutation]
          $_SESSION[first_name]
          $_SESSION[middle_initial]
          $_SESSION[last_name] on $date at $time
          </h4>
          <div style='overflow-x:auto;'>
            <table class='w3-table w3-border w3-bordered'>
              <tbody>
                <tr>
                  <th>Product Image</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                </tr>";
}

function displayItemAndReturnPrice($db, $order) {
    $productID = $order["product_id"];
    $query = "SELECT * FROM my_Product WHERE product_id = '$productID'";
    $products = mysqli_query($db, $query);
    $product = mysqli_fetch_array($products, MYSQLI_ASSOC);
    $productPrice = sprintf("$%1.2f", $product["price"]);
    $totalPrice = $order["quantity"] * $order["price"];
    $totalPriceAsString = sprintf("$%1.2f", $totalPrice);
    $imageFile = $product["image_file"];

    echo "
        <tr>
          <td class='w3-center'>
            <img width='70' height='70' src='images/products/$imageFile' alt='Product Image'>
         </td> 
	 <td class='w3-center'>$product[name]</td>
         <td class='w3-right-align'>$productPrice</td>
         <td class='w3-center'>$order[quantity]</td>
         <td class='w3-right-align'>$totalPriceAsString</td>
       </tr>";

    return $totalPrice;
}

function displayReceiptFooter($grandTotal) {
    $grandTotalAsString = sprintf("$%1.2f", $grandTotal);
    echo "
        <tr>
          <td class='w3-center' colspan='4'><strong>Grand Total</strong></td>
	  <td class='w3-right-align'><strong>$grandTotalAsString</strong></td>
        </tr>
        <tr>
          <td colspan='5'>
            <p class='w3-center'> Your order has been processed.
            <br>Thank you very much for shopping with Molten Delights Pizzeria.
            <br>We appreciate your purchase of the above product(s).
            <br>You many print a copy of this page for your permanent record.
            <br>To return to our e-store options page please <a href='pages/estore.php'>click here</a>.
            </p>
         </td>
       </tr>
       </tbody></table></div>";
}

function markOrderPaid($db, $customerID, $orderID) {
    $query = "UPDATE my_Order 
	      SET order_status = 'PD'
	      WHERE customer_id = '$customerID' and
	            order_id = '$orderID'";
    $success = mysqli_query($db, $query);

    if(!$success) {
        echo "Error: UPDATE failure to mark order paid in checkoutProcess";
	exit(0);
    }
}

function markOrderItemsPaid($db, $orderID) {
    $query = "SELECT *
              FROM my_OrderItem
              WHERE order_id = '$orderID'";
    $orderItems = mysqli_query($db, $query);

    if ($orderItems != NULL) $numItems = mysqli_num_rows($orderItems);
    else {
        echo "Error: SELECT failure in markOrderitemPaid.";
	exit(0);
    }

    for ($i = 0; $i < $numItems; $i++) {
        $item = mysqli_fetch_array($orderItems, MYSQLI_ASSOC);
	$query = "UPDATE my_OrderItem
                  SET order_item_status = 'PD'
                  WHERE order_item_id = $item[order_item_id] and
                        order_id = $item[order_id]";
	$success = mysqli_query($db, $query);
	if (!$success) {
            echo "Error: UPDATE failure in markOrderItemsPaid in checkoutProcess.";
	    exit(0);
	}
	reduceInventory($db, $item['product_id'], $item['quantity']);
    }

}

function reduceInventory($db, $productID, $quantityPurchased) {
    $query = "SELECT *
              FROM my_Product
              WHERE product_id = '$productID'";
    $products = mysqli_query($db, $query);
    if (!$products) {
        echo "Error: SELECT failure in reduceInventroy in checkoutProcess.";
	exit(0);
    }

    $product = mysqli_fetch_array($products, MYSQLI_ASSOC);
    $newQuantity = $product['quantity'] - $quantityPurchased;
    $query = "UPDATE my_Product
              SET quantity = $newQuantity
              WHERE product_id = $product[product_id]";

    $success = mysqli_query($db, $query);
    if (!$success) {
        echo "Error: UPDATE failure in reduceInventory in checkoutProcess.";
	exit(0);
    }
}

?>

