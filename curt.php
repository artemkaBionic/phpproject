<?php

function addtocart( $product_id, $product_price, $product_title)
{

    $_SESSION['prod_count']++;
    $tocart = $_SESSION['prod_count'] - 1;
    $_SESSION['product_id'][$tocart] = $product_id;
    $_SESSION['product_price'][$tocart] = $product_price;
    $_SESSION['product_title'][$tocart]= $product_title;
    $_SESSION['product_count'][$tocart] = 1;
    checksum();

}

function remove_from_cart($product_id) {
    $id = array_search($product_id, $_SESSION['product_id']);
    if (is_numeric($id)) {
        unset($_SESSION['product_id'][$id]);
        unset($_SESSION['product_price'][$id]);
        unset($_SESSION['product_count'][$id]);
        unset($_SESSION['product_title'][$id]);
        $_SESSION['prod_count']=$_SESSION['prod_count']-1;
        checksum();




    }
}
function checksum(){
    $_SESSION['curt_sum']=0;
    foreach($_SESSION['product_price'] as $price){
        $_SESSION['curt_sum']= $_SESSION['curt_sum'] +$price;
    }
}


function rate($product_id, $selectvalue){
    global $link;
    $sql = "SELECT rating FROM products where id=$product_id";
    $result = mysqli_query($link, $sql);
    $prod = mysqli_fetch_all($result,MYSQLI_ASSOC);
    if($prod[0]['rating'] == 0){
        $avarage = $selectvalue;
        $sql = "UPDATE products set rating=$avarage where id=$product_id";
        $result = mysqli_query($link, $sql);



    }
    elseif($prod[0]['rating']>0) {
        $avarage = ($prod[0]['rating'] + $selectvalue) / 2;
        $sql = "UPDATE products set rating=$avarage where id=$product_id";
        $result = mysqli_query($link, $sql);
    }
}
