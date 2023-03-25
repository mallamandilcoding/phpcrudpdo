<?php
   session_start();
   require_once('dbconn.php');

   // print_r($_GET['url']);


   if (isset($_POST['update-btn'])){
      $student_id = $_POST['student_id'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $course = $_POST['course'];

      try {
            $sql =  "UPDATE student SET name=:name,email=:email,phone=:phone,course=:course WHERE id=:student_id";
            $sql_run = $conn -> prepare($sql);
            $sql_run->bindParam(':name',$name);
            $sql_run->bindParam(':email',$email);
            $sql_run->bindParam(':phone',$phone);
            $sql_run->bindParam(':course',$course);
            $sql_run->bindParam(':student_id',$student_id);

            $sql_execute = $sql_run->execute();

            if ($sql_execute){
               $_SESSION['message']= "Updated successfully";
               header('Location: index.php');
            }else{
               $_SESSION['message']= "Not Updated";
               header('Location: index.php');
            }
         } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
         }
      
   }
   

   if (isset($_POST['add-btn'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $course = $_POST['course'];

      $sql =  "INSERT INTO student (name,email,phone,course) VALUES (:name,:email,:phone,:course)";
      $sql_run = $conn -> prepare($sql);
      $sql_run->bindParam(':name',$name);
      $sql_run->bindParam(':email',$email);
      $sql_run->bindParam(':phone',$phone);
      $sql_run->bindParam(':course',$course);

      $sql_execute = $sql_run->execute();

      if ($sql_execute){
         $_SESSION['message']= "Inserted successfully";
         header('Location: index.php');
      }else{
         $_SESSION['message']= "Not Inserted";
         header('Location: index.php');
      }
   }
   

?>