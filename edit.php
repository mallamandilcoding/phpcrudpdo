<?php
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
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>Edit and Update</h3>
                        <a href="index.php" class="btn btn-danger">BACK</a>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id'])){
                                $student_id= $_GET['id'];
                                $sql = "SELECT * FROM student WHERE id=:student_id";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(':student_id',$student_id);
                                $stmt->execute();

                                $res = $stmt->fetch();
                            }
                        ?>
                        <form action="code.php" method="POST">
                            <input type="hidden" name="student_id" value="<?= $res['id']; ?>">
                            <div class="form-group row mt-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Name" value="<?=$res['name']; ?>">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?=$res['email']; ?>">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?=$res['phone']; ?>">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="course" class="col-sm-2 col-form-label">Course</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="course" id="course" placeholder="Course" value="<?=$res['course']; ?>">
                                </div>
                            </div>
                            <div class="form-group row mt-3 text-center">
                                <div class="col-sm-10">
                                    <button type="submit" name="update-btn" class="btn btn-primary">UPDATE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</html>