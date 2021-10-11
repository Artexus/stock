<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="./home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <?php include "connector.php"?>

    <div class="position-relative mt-5">
        <div class="card-container" style="width:55vm;outline:none;">
        <!-- List barang -->
        <?php
            $res = $con->query("SELECT * FROM jus");
            while($result = $res->fetch_assoc()) {
        ?>
            <div class="d-flex">
                <div class="card-text ps-3 text-wrap" style="width: 15rem;">
                    <?php echo $result['Nama']?>
                </div>
                <form action="./updateController.php" method="POST" class="ps-5" style="width: 25rem;">
                    <input type="button" id="minus" class="btn btn-outline-primary" style="width: 5rem;" onclick="decrementClick(<?php echo $result['Id']?>)" value="-"></input>
                    <input type="hidden" name='id' value="<?php echo $result['Id']?>">
                    <input name="quantity" class="text-center w-25 fs-6" id="quantity<?php echo $result['Id']?>" type="text" value="<?php echo $result['Stok']?>" style="width: 5rem; height:2.5rem"></input>
                    <input type="button" id='plus' class="btn btn-outline-primary" style="width: 5rem;" onclick="incrementClick(<?php echo $result['Id']?>)" value="+"></input>
                    <input id="update"type="submit" class="btn btn-primary" style="width: 5rem;" value="Update"></a>
                    
                    <script>
                        function incrementClick(Id){
                            console.log("quantity" + Id);
                            var counter = document.getElementById("quantity" + Id).value;

                            counter ++;
                            document.getElementById("quantity" + Id).value = counter;
                        }
                        function decrementClick(Id){
                            var counter = document.getElementById("quantity" + Id).value;
                            if(counter > 0)
                                counter --;
                            document.getElementById("quantity" + Id).value = counter;
                        }
                    </script>
                </form>
                <form id="delete-form" action="./deleteController.php" method="POST">
                    <input type="hidden" name='id' value="<?php echo $result['Id']?>">
                    <input id="delete" type="submit" value="Delete" class="text-decoration-none btn btn-outline-danger mt-1 ms-3" style="width: 5rem; height:2.5rem;"></input>
                </form>
            </div>
        <?php }?>      
        <p class="mt-5 ms-3 d-flex">Insert new</p>
        <form id="insert-form" class="mt-1 ms-3" action="./insertController.php" method='POST'>
            <input name="name" type="text" placeholder="Masukkan jus baru">
            <input id="quantity" name="quantity" type="text" placeholder="Masukkan stok" style="width:12rem;">
            <input id="insert-btn" type="submit" class="ms-2 mb-2 btn btn-primary btn-lg" value="Insert" style="width:8rem">
        </form>      

        </div>
    </div>

</body>
</html>