<?php
    include "connector.php";
    $id = $_POST['id'];
    $mes = $con->query("DELETE FROM jus WHERE Id = '$id'");
    if($mes){
        echo "<script>alert('Delete Successful !'); window.location.href = 'index.php'</script>";
    }
    
?>