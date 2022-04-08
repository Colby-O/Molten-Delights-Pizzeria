<?php
/* catalogProcess.php */

require("connectToDatabase.php");

$query = "SELECT * FROM my_Category ORDER BY catName";
$categories = mysqli_query($db, $query);
$numCategories = mysqli_num_rows($categories);

echo "<table><tbody><tr><td><ul>";

for ($i = 1; $i < $numCategories + 1; $i++) {
    $category = mysqli_fetch_array($categories, MYSQLI_ASSOC);
    $categoryName = $category["catName"];
    $prodCatCode = urlencode($category["catCode"]);
    $categoryURL = "pages/category.php?categoryCode=$prodCatCode";
    echo "<li><a href='$categoryURL'>$categoryName</a></li>\r\n";
    if($i % ($numCategories / 2) == 0) {
        echo "</ul></td>\r\n<td><ul>";
    }
}

echo "</ul></td></tr></tbody></table>";
mysqli_close($db);

?>
