<?php
/* categoryProcess.php */

$categoryCode = $_GET['categoryCode'];

require("connectToDatabase.php");

$query = "SELECT * FROM my_Product WHERE catCode = '$categoryCode' ORDER BY name ASC";
$products = mysqli_query($db, $query);
$numProducts = mysqli_num_rows($products);

echo "<table class='item' style='width: 100%;'>
       <tr>
         <th>Product Image</th>
         <th>Product Name</th>
         <th>Price</th>
         <th># in Stock</th>
	 <th>Purchase?</th>
       </tr>";

for ($i = 1; $i < $numProducts + 1; $i++) {
    $product = mysqli_fetch_array($products, MYSQLI_ASSOC);
    $productImageFile = $product["image_file"];
    $productName = $product["name"];
    $productPrice = sprintf("$%.2f", $product["price"]);
    $productQuantity = $product["quantity"];

    echo "
      <tr>
	<td class='center'>
          <img width='70' height='70' src='images/products/$productImageFile' alt='Product Image'>
        </td>
	<td>$productName</td>
	<td class='left'>$productPrice</td>
        <td class='center'>$productQuantity</td>
        <td class='center'>
	  <a class='w3-button w3-orange w3-hover-deep-orange w3-round w3-small' title='Not yet active' href='pages/sorry.php'> 
            Add to cart
          </a>
	</td>
      </tr>
    ";
}

echo "</table>";

mysqli_close($db);

?>
