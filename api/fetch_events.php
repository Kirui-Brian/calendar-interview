<?php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT id, title, start, end FROM events";
$stmt = $db->prepare($query);
$stmt->execute();

$events = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $event_item = array(
        "id" => $id,
        "title" => $title,
        "start" => $start,
        "end" => $end
    );
    array_push($events, $event_item);
}

echo json_encode($events);
?>