<?php 
$connect = new PDO("mysql:host=localhost;dbname=mobshop", "root", "");

$query = "SELECT DISTINCT uredaj_brend FROM uredaji";

$statement = $connect->prepare($query);

$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row;
}

echo json_encode($data);
?>