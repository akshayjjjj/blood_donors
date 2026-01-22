<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$lat = $data['latitude'];
$lon = $data['longitude'];
$city = $data['city'];
$pincode = $data['pincode'];

$conn = new mysqli("localhost", "root", "", "blood_donation");

if ($conn->connect_error) {
  die(json_encode(["message" => "DB Error"]));
}

$sql = "INSERT INTO user_location (latitude, longitude, city, pincode)
        VALUES ('$lat', '$lon', '$city', '$pincode')";

if ($conn->query($sql)) {
  echo json_encode(["message" => "Location saved successfully"]);
} else {
  echo json_encode(["message" => "Insert failed"]);
}
?>
