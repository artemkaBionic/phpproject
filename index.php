<?php

session_start();
include 'header.php';
include 'db.php';
include 'curt.php';
error_reporting(E_ERROR);

?>
<div class="curt">
</div>
<div class="content"">



<?php
$count = count($products);
for ($i = 0; $i < $count; $i++) {

    echo "<div class='products'>";
    echo "<span>" . $products["$i"]['title'] . "</span>" . "</br>";
    echo "<span>" . $products["$i"]['price'] . "$</span>" . "</br>";
    echo "<span>Av.rating" . $products["$i"]['rating'] . "</span>";
    echo "<form id='form1' name='form1' method='post' action=".$_SERVER['REQUEST_URI'].">";
    echo "<label>";
    echo   "<input type='hidden' name='product_id' value=".$products[$i]['id'].">";
    echo   "<input type='hidden' name='product_title' value=".$products[$i]['title'].">";
    echo "<input type='hidden' name='product_price' value=".$products[$i]['price'].">";
    echo "<input type='hidden' name='tocart' value='tocart'".">";
    echo "<input type='submit' name='Add' value='Add to cart'".">"."</br>";
    echo "<input type='submit' name='Del' value='Dell from cart'".">"."</br>";

    echo "<input type='radio' name='portion_num' value='1'/><span class='text'>1</span>";
    echo "<input type='radio' name='portion_num' value='2'/><span class='text'>2</span>";
    echo "<input type='radio' name='portion_num' value='3'/><span class='text'>3</span>";
    echo "<input type='radio' name='portion_num' value='4'/><span class='text'>4</span>";
    echo "<input type='radio' name='portion_num' value='5'/><span class='text'>5</span>";
    echo "<input type='submit' name='rate' value='Rate'".">"."</br>";
    echo "</label>";
    echo "</form>";


    echo "</div>";
}
if(isset($_POST['Add'])){
    addtocart($_POST['product_id'], $_POST['product_price'], $_POST['product_title']);
}
if(isset($_POST['Del'])) {

    remove_from_cart($_POST['product_id']);
}
if(isset($_POST['rate'])) {
    rate($_POST['product_id'], $_POST['portion_num']);
    header("Cache-Control: no-store,no-cache,mustrevalidate");
    header("Location: index.php");

}
?>
<div class="status">
    <?php
    echo "<span>"."Products in curt:". count($_SESSION['product_count']) . "</span>" . "</br>";
    echo "<span>"."Total Sum:".$_SESSION['curt_sum']. "</span>" . "</br>";
    echo "<form id='form3' name='form3' method='post' action='status.php'".">";
    echo "<label>";
    echo "<input type='hidden' name='perexod' value='perexod'".">";
    echo "<input type='submit' name='Del' value='Go to curt'".">";
    echo "</label>";
    echo "</form>";
    ?>
</div>
</div>
<div class="footer">


</div>
</body>
</html>

