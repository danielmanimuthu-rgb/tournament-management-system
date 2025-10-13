<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Event Management System</h1>

        <!-- Event Form -->
        <div class="card mb-4">
            <div class="card-header">Add New Event</div>
            <div class="card-body">
                <form id="eventForm" action="add_event.php" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Event Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="event_date" class="form-label">Event Date</label>
                        <input type="datetime-local" class="form-control" id="event_date" name="event_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Event</button>
                </form>
            </div>
        </div>

        <!-- Tabs for List and Calendar Views -->
        <ul class="nav nav-tabs mb-4" id="viewTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="list-tab" data-bs-toggle="tab" href="#list-view" role="tab">List View</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="calendar-tab" data-bs-toggle="tab" href="#calendar-view" role="tab">Calendar View</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- List View -->
            <div class="tab-pane fade show active" id="list-view" role="tabpanel">
                <div class="card">
                    <div class="card-header">Upcoming Events</div>
                    <div class="card-body">
                        <div id="eventList">
                            <?php
                            include 'db_connect.php';
                            $stmt = $conn->prepare("SELECT * FROM events ORDER BY event_date ASC");
                            $stmt->execute();
                            $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if ($events) {
                                foreach ($events as $event) {
                                    echo '<div class="event-item mb-3 p-3 border rounded">';
                                    echo '<h5>' . htmlspecialchars($event['title']) . '</h5>';
                                    echo '<p>' . htmlspecialchars($event['description']) . '</p>';
                                    echo '<p><strong>Date:</strong> ' . htmlspecialchars($event['event_date']) . '</p>';
                                    echo '<p><strong>Location:</strong> ' . htmlspecialchars($event['location']) . '</p>';
                                    echo '<button class="btn btn-sm btn-warning me-2 edit-event" data-id="' . $event['id'] . '">Edit</button>';
                                    echo '<button class="btn btn-sm btn-danger delete-event" data-id="' . $event['id'] . '">Delete</button>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<p>No events found.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Calendar View -->
            <div class="tab-pane fade" id="calendar-view" role="tabpanel">
                <div class="card">
                    <div class="card-header">Event Calendar</div>
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Details Modal -->
        <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 id="modalTitle"></h5>
                        <p><strong>Description:</strong> <span id="modalDescription"></span></p>
                        <p><strong>Date:</strong> <span id="modalDate"></span></p>
                        <p><strong>Location:</strong> <span id="modalLocation"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="script.js"></script>
</body>
</html>