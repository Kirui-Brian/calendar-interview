<?php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

$query = "DELETE FROM events WHERE id = :id";

$stmt = $db->prepare($query);

$stmt->bindParam(":id", $data->id);

if($stmt->execute()) {
    echo json_encode(array("message" => "Event was deleted."));
} else {
    echo json_encode(array("message" => "Unable to delete event."));
}
?>
