<?php
    include "connector.php";
    if($_POST['quantity'] == '' && $_POST['name'] == ''){
        echo "<script>alert('Insert Failed !'); window.location.href = 'index.php'</script>";
    }
    $quantity = $_POST['quantity'];
    $name = $_POST['name'];
    // var_dump($quantity);
    $mes = $con->query("INSERT INTO jus VALUES(null, '$name', '$quantity')");
    if($mes){
        echo "<script>alert('Insert Successful !'); window.location.href = 'index.php'</script>";
    }
    else{
        echo "Faild";
    }
?>