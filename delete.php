<?php
    session_start();
    require_once('dbconn.php');

    $student_id=$_GET['id'];
    $sql = "DELETE FROM student WHERE id=:student_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':student_id',$student_id);
    $sql_execute = $stmt->execute();
    if ($sql_execute){
        $_SESSION['message']= "Deleted successfully";
        header('Location: index.php');
     }else{
        $_SESSION['message']= "Not Deleted";
        header('Location: index.php');
     }
?>

