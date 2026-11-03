<?php
include 'db_connect.php';

$stmt = $conn->prepare("SELECT id, title, description, event_date, location FROM events");
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

$calendar_events = [];
foreach ($events as $event) {
    $calendar_events[] = [
        'id' => $event['id'],
        'title' => $event['title'],
        'start' => $event['event_date'],
        'extendedProps' => [
            'description' => $event['description'],
            'location' => $event['location']
        ]
    ];
}

header('Content-Type: application/json');
echo json_encode($calendar_events);
?>