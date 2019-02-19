<?php 

// $servername = "localhost";
// $username = "root";
// $password = "";
// $db = "web-shop";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password,$db);

// if(mysqli_connect_errno()){
//     echo 'Failed to connect to MySql '. mysqli_connect_errno();
// }



// $query = "SELECT * FROM uredaji";

// $result = mysqli_query($conn, $query);

// $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

$connect = new PDO("mysql:host=localhost;dbname=web-shop", "root", "");

$query = "SELECT * FROM uredaji";

$statement = $connect->prepare($query);

$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row;
}

echo json_encode($data);



?>