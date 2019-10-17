<?php
require_once 'connection.php';
//get data a Person
$person = $_POST['person'];
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$email = $_POST['email'];
 //connect DATABASE 
$link = mysqli_connect($host, $user, $password, $database) 
   or die("Ошибка " . mysqli_error($link));

   $query ="UPDATE `people_table` SET `first_name` = '$first_name', `last_name` = '$last_name', `email`= '$email' 
   WHERE `id`= '$person'";
   
   $result = mysqli_query($link, $query); 
   
mysqli_close($link);

?>