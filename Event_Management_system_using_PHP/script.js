document.addEventListener('DOMContentLoaded', function() {
    // Initialize FullCalendar
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: 'get_events.php',
        eventClick: function(info) {
            // Populate modal with event details
            document.getElementById('modalTitle').textContent = info.event.title;
            document.getElementById('modalDescription').textContent = info.event.extendedProps.description || 'No description';
            document.getElementById('modalDate').textContent = info.event.start.toLocaleString();
            document.getElementById('modalLocation').textContent = info.event.extendedProps.location || 'No location';

            // Show the modal
            var eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
            eventModal.show();
        }
    });
    calendar.render();

    // Delete event functionality
    const deleteButtons = document.querySelectorAll('.delete-event');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const eventId = this.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this event?')) {
                fetch('delete_event.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${eventId}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.closest('.event-item').remove();
                        calendar.refetchEvents(); // Refresh calendar after deletion
                    } else {
                        alert('Failed to delete event.');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });
});