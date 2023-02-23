<?php

if(isset($_GET['delete_orders'])){
    $delete_orders = $_GET['delete_orders'];
    $delete_query = "DELETE FROM `user_orders` WHERE order_id=$delete_orders";
    $result = mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Order Deleted Successfully')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
    }
}

?>