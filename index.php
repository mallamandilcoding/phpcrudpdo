<?php 
    session_start(); 
    require_once('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <title>PHP PDO CRUD</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <?php  if(isset($_SESSION['message'])) {  ?>
                <h5 class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </h5>
                <?php   unset($_SESSION['message']);
                 } ?>
                <div class="card">
                    <div class="card-header text-center">
                        <a href="add.php" class="btn btn-primary">Add New Data</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Edit/Delete</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                    $sql= "SELECT * FROM student";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    
                                    $res = $stmt->fetchAll();
                                    if($res){
                                        // print_r($res);
                                        foreach($res as $index => $row){
                                            // print_r($row);
                                            ?>
                                            
                                            <tr>
                                                <th scope="row"><?= $index+1; ?></th>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $row['phone']; ?></td>
                                                <td><?= $row['course']; ?></td>
                                                <td>
                                                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary"> Edit</a>
                                                    <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger"> Delete</a>
                                                </td>
                                            </tr>  
                                            <?php
                                        }
                                    }else{
                                        ?>
                                        <tr>
                                            <td colspan="6">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</html>