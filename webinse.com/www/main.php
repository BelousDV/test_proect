<?php
require_once 'connection.php';
//getting input data about a person

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    
    //connect DATABASE 

   $link = mysqli_connect($host, $user, $password, $database) 
   or die("Ошибка " . mysqli_error($link));
   //create a new person in the DATABASE 
   $query ="INSERT INTO `people_table` (`first_name`, `last_name`, `email`)
   VALUES ('$first_name', '$last_name', '$email')";
   $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
  
   mysqli_close($link);

?>