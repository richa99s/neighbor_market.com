<?php

if(isset($_GET['delete_payment'])){
    $delete_payment = $_GET['delete_payment'];
    $delete_query = "DELETE FROM `user_payments` WHERE payment_id=$delete_payment";
    $result = mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Payment Deleted Successfully')</script>";
        echo "<script>window.open('./index.php?list_payments','_self')</script>";
    }
}

?>