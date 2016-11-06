<?php session_start();
error_reporting(E_ERROR);?>

    <!DOCTYPE html>

    <style>
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=text]:focus {
            border: 3px solid #555;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>

    <div>
        <form method='post' action="<?php echo $_SERVER['REQUEST_URI']?>;>
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname">

            <label for="delivery">Delivery</label>
            <select name="delivery">
                <option selected disabled>Choose here</option>
                <option value="0">Pick up 0$</option>
                <option value="5">Delivery 5$</option>
            </select>

        <input type='submit' name='pay' value='Pay'>
        </form>
    </div>



<?php

if(isset($_POST['pay'])) {
    if(isset($_POST['delivery'])){
        $_SESSION['curt_sum']+=$_POST['delivery'];
        if($_SESSION['my_cash']>=$_SESSION['curt_sum']){
            echo "You cash is ".$_SESSION['my_cash']."</br>";
            echo "Delivery cost ".$_POST['delivery']."</br>";
            echo "Sum of your order is ".$_SESSION['curt_sum']."</br>";
            $_SESSION['my_cash']-=$_SESSION['curt_sum'];
            echo "Rest recieves ".$_SESSION['my_cash'];
            header("Cache-Control: no-store,no-cache,mustrevalidate");
            //header("Location: pay.php");

        }
        else{
            echo "Not enough money";
        }
    }
    else {
        echo "Please select delivery type!!!";
    }
session_destroy();

}
?>
<a href="index.php">To start page</a>
