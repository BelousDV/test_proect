<?php
require_once 'connection.php';
//getting input data about id a person
$person = $_POST['person'];
 //connect DATABASE 
$link = mysqli_connect($host, $user, $password, $database) 
   or die("Ошибка " . mysqli_error($link));

   $query ="DELETE FROM `people_table` WHERE `id`= '$person'";
   
   $result = mysqli_query($link, $query); 
   
   mysqli_close($link);
?>