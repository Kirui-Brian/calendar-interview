<?php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

$query = "UPDATE events SET title = :title, start = :start, end = :end WHERE id = :id";

$stmt = $db->prepare($query);

$stmt->bindParam(":title", $data->title);
$stmt->bindParam(":start", $data->start);
$stmt->bindParam(":end", $data->end);
$stmt->bindParam(":id", $data->id);

if($stmt->execute()) {
    echo json_encode(array("message" => "Event was updated."));
} else {
    echo json_encode(array("message" => "Unable to update event."));
}
?>
