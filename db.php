<?php
$link = mysqli_connect("localhost","root",'116500',"mag");
if(mysqli_connect_errno()){
    echo 'Conected eror number'.mysqli_connect_errno().'!!!'. mysqli_connect_error();
    exit();
}

function selectall(){
    global $link;
    $sql = "SELECT * FROM products";
    $result = mysqli_query($link, $sql);
    $prod = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $prod;

}
$products = selectall();
