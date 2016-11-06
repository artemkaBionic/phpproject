<link href="curt.css" rel="stylesheet">
<?php
session_start();
error_reporting(E_ERROR);
$sorti= array();

    for ($k = 0; $k < count($_SESSION['product_title']); $k++) {
        array_push($sorti, $_SESSION['product_title'][$k]);
    }

$sor =(array_count_values($sorti));
?>

<form action="" method="post">
<table id="myTable">
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quentity</th>
        <th>Sum</th>
    </tr>

<?php
foreach($sor as $key => $value){
    $xy = array_search($key, $_SESSION['product_title']);
    echo "<tr><td>$key</td><td>".$_SESSION['product_price'][$xy]."</td><td>$value</td>"."<td>".$_SESSION['product_price'][$xy]*$value."</td></tr>";
    }

$_SESSION['my_cash'] = 100;
?>
</table>


    <p style="text-align: center"><input type='submit' name='checkout' value='checkout'/></p>
</form>
<?php echo "<p style='text-align: center'>Total sum = ".$_SESSION['curt_sum'];



if(isset($_POST['checkout'])){
    header("Location: pay.php");

}
    ?>

<a href='market.html'>Go to market calculator</a>
<a href='index.php'>Back</a>

