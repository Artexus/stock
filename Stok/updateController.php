<?php
    include "connector.php";
    $quantity = $_POST['quantity'];
    $id = $_POST['id'];
    $mes = $con->query("UPDATE jus SET Stok ='$quantity' WHERE Id = '$id'");
    if($mes){
        echo "<script>alert('Update Successful !'); window.location.href = 'index.php'</script>";
    }
    
?>