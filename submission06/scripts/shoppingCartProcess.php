<?php
/* shoppingCartProcess.php */

include("connectToDatabase.php");
$retrying = isset($_GET["retryingQuantity"]) ? true : false;
$items = getExistingOrders($db, $customerID);
$numOrders = mysqli_num_rows($items);

if ($numOrders == 0 && $productID == "view") {
    echo "
        <h4 class='w3-center'>Your shopping cart is empty.</h4>
        <h4 class='w3-center'>To continue shopping. please <a href='pages/catalog.php'>click here</a>.";
} else {
    displayHeader();
    $grandTotal = 0;
    if ($numOrders == 0) {
        createOrder($db, $customerID);
    } else {
        for ($i = 0; $i < $numOrders; $i++) {
            $grandTotal += displayExistingItemColumns($db, $items);
        }
    }

    if ($productID != "view") {
        if ($retrying) {
            echo 
		" <tr>
		    <td class='w3-center' colspan='7'>Please re-enter a non-zero product quantity not exceeding the number in stock.
		    </td>
		  </tr>";
	}
	displayNewItemColumns($db, $productID);
    }
    displayFooter($grandTotal);
}
mysqli_close($db);

function getExistingOrders($db, $customerID) {
    $query = "SELECT my_Order.order_id, my_Order.customer_id, my_Order.order_status, my_OrderItem.*
              FROM my_OrderItem, my_Order
              WHERE my_Order.order_id = my_OrderItem.order_id and
                    my_Order.order_status = 'IP'              and
                    my_Order.customer_id = $customerID";
   $items = mysqli_query($db, $query);
   return $items;

}

function createOrder($db, $customerID) {
    $query = "INSERT INTO my_Order
              (
                  customer_id,
		  order_status,
                  date_time
              )
              VALUES
              (
                  '$customerID',
                  'IP',
		  SYSDATE()
              )";
    $success = mysqli_query($db, $query);
    if(!$success) {
        echo "Error: INSERT failure in createOrder";
	exit(0);
    }
}

function displayHeader() {
    echo 
        "<form id='orderForm' action='scripts/shoppingCartAddItem.php'>           <table class='w3-table w3-border w3-bordered'>
	     <tbody>
               <tr>
                 <th>Product Image</th>
                 <th>Product Name</th>
                 <th>Price</th>
                 <th># in Stock</th>
                 <th>Quantity</th>
                 <th>Total</th>
                 <th>Action</th>
	       </tr>";  
}

function displayFirstFourColumns($db, $productID) {
    $query = "SELECT *
              FROM my_Product
              WHERE product_id = '$productID'";
    $products = mysqli_query($db, $query);
    $row = mysqli_fetch_array($products, MYSQLI_ASSOC);
    $productPrice = sprintf("$%1.2f", $row["price"]);
    $productImageFile = $row["image_file"];
    echo
        "<tr>
	   <td class='w3-center'> <img width='70' height='70' src='images/products/$productImageFile' alt='Product Image'></td>
	   <td class='w3-center'>$row[name]</td>
	   <td class='w3-right-align'>$productPrice</td>
           <td class='w3-center'>$row[quantity]</td>";
}

function displayExistingItemColumns($db, $items) {
    $row = mysqli_fetch_array($items, MYSQLI_ASSOC);
    displayFirstFourColumns($db, $row['product_id']);
    $total = $row['quantity'] * $row['price'];
    $totalAsString = sprintf("$%1.2f", $total);
    echo 
        "<td class='w3-center'>$row[quantity]</td>
	 <td class='w3-right-align'>$totalAsString</td>
	 <td class='w3-center'>
           <a class='w3-button w3-orange w3-hover-deep-orange w3-round w3-small'
              style='margin-bottom: 3px'
              href='scripts/shoppingCartDeleteItem.php?orderItemID=$row[order_item_id]&orderID=$row[order_id]'>
	  Delete from cart
          </a>
          <a class='w3-button w3-orange w3-hover-deep-orange w3-round w3-small'
             href='pages/catalog.php'>
            Continue Shopping
          </a>
        </td>
      </tr> ";
    return $total;
}

function displayNewItemColumns($db, $productID) {
    displayFirstFourColumns($db, $productID);
    echo
        "<td class='w3-center'>
	   <input type='hidden' id='productID' name='productID' value='$productID'>
	   <input type='text' id='quantity' name='quantity' required size='3' title='Enter a number not exceeding the number in stock' pattern='[1-9][0-9]?'>
         </td>
         <td class='w3-right-align'>TBA</td>
         <td class='w3-center'>
	   <input class='w3-button w3-orange w3-hover-deep-orange w3-round w3-small'
	          style='margin-bottom: 3px'
		  type='submit'
		  value='Add to cart'>
           <a class='w3-button w3-orange w3-hover-deep-orange w3-round w3-small' href='pages/catalog.php'>Continue shopping</a>
         </td>
       </tr>";
}

function displayFooter($grandTotal) {
    $grandTotalAsString = sprintf("$%1.2f", $grandTotal);
    echo "
        <tr>
          <td class='w3-center' colspan='5'><strong>Grand Total</strong></td>
          <td class='w3-right-align'><strong>$grandTotalAsString</strong></td>
          <td class='w3-center'>
            <a class='w3-button w3-orange w3-hover-deep-orange w3-round w3-small'
	       href='pages/checkout.php'>
               Proceed to<br>checkout</a>
          </td>
        </tr>
      </tbody>
    </table>
  </form>";
}

?>
