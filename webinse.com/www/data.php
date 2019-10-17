<?php
require_once 'connection.php';
//connect DATABASE 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));

$query ="SELECT * FROM `people_table`";

$result = mysqli_query($link, $query);
//view data
$data = array();

while($row = mysqli_fetch_assoc($result)){
    $data[]=$row;
}

echo json_encode($data);

?>