<?php
require('../func/config.php');

$AssetId = $_POST['AssetId'];
// $AssetId = "1";

$query = "SELECT * FROM new_item WHERE Id = :Id";

$stmt = $db->prepare($query);
$stmt->execute(array(
 ':Id' => $AssetId
));

$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);

// $userData = array();
//
// while($row=$stmt->fetchAll()
// {
//
//       $userData = $row;
// }

// $row_info = json_encode($userData);

// echo json_encode($userData);

//print_r($json);

echo $json;
 ?>
