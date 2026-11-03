# Event Management System

![PHP](https://img.shields.io/badge/PHP-7.4%2B-blue)
![MySQL](https://img.shields.io/badge/MySQL-8.0%2B-orange)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.0-563d7c)
![FullCalendar](https://img.shields.io/badge/FullCalendar-5.11.3-green)
![License](https://img.shields.io/badge/License-MIT-blue)

A web-based **Event Management System** built with PHP, MySQL, HTML, Bootstrap, CSS, and JavaScript. This application allows users to create, view, and manage Tournaments with both a list view and an interactive calendar view. Tournaments are stored in a MySQL database, and the system features a responsive UI powered by Bootstrap and FullCalendar for the calendar interface.

## Features

- **Create Tournaments**: Add new Tournaments with title, description, date, and location using a user-friendly form.
- **List View**: Display upcoming Tournaments in a clean, organized list with options to edit or delete.
- **Calendar View**: Visualize Tournaments in a monthly, weekly, or daily calendar using FullCalendar.
- **Event Details Modal**: View detailed event information (title, description, date, location) in a Bootstrap modal by clicking an event in the calendar.
- **Delete Tournaments**: Remove Tournaments from the list view with AJAX to avoid page reloads and refresh the calendar dynamically.
- **Responsive Design**: Built with Bootstrap for a mobile-friendly, professional interface.

## Technologies Used

- **Backend**: PHP 7.4+, MySQL
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5.3.0, FullCalendar 5.11.3
- **Database**: MySQL for storing event data
- **Dependencies**: Loaded via CDN (Bootstrap, FullCalendar)

## Project Structure

```
event-management-system/
├── database.sql        # MySQL database and table creation script
├── db_connect.php      # Database connection configuration
├── index.php           # Main page with event form, list, and calendar views
├── add_event.php       # Handles event creation
├── delete_event.php    # Handles event deletion via AJAX
├── get_Tournaments.php      # Fetches Tournaments for FullCalendar in JSON format
├── styles.css          # Custom CSS for styling
└── script.js           # JavaScript for FullCalendar and AJAX interactions
```

## Setup Instructions

### Prerequisites
- Web server (e.g., Apache) with PHP 7.4 or higher
- MySQL 8.0 or higher
- A web browser (e.g., Chrome, Firefox)
- Optional: Local development environment like XAMPP or WAMP

### Installation
1. **Clone the Repository** (or download the project files):
   ```bash
   git clone https://github.com/your-username/event-management-system.git
   ```
2. **Set Up the Database**:
   - Import `database.sql` into MySQL to create the `event_management` database and `Tournaments` table:
     ```bash
     mysql -u your-username -p < database.sql
     ```
   - Update `db_connect.php` with your MySQL credentials if different from defaults (`root`, no password).
3. **Configure the Web Server**:
   - Place all project files in your web server’s root directory (e.g., `htdocs` for XAMPP).
   - Ensure the server is running (e.g., start Apache and MySQL in XAMPP).
4. **Access the Application**:
   - Open a browser and navigate to `http://localhost/index.php` (adjust the URL based on your server setup).

## Usage

1. **Add an Event**:
   - Fill out the form at the top of the page with the event title, description, date, and location.
   - Click "Add Event" to save the event to the database.
2. **View Tournaments**:
   - **List View**: Displays all Tournaments with details and options to edit or delete.
   - **Calendar View**: Shows Tournaments on an interactive calendar (month, week, or day views).
   - Switch between views using the tabs above the content area.
3. **Event Details**:
   - In the Calendar View, click an event to open a modal displaying its title, description, date, and location.
4. **Delete Tournaments**:
   - In the List View, click the "Delete" button next to an event. Confirm the deletion, and the event will be removed from both the list and calendar without reloading the page.
5. **Navigation**:
   - Use the calendar’s toolbar to switch between month, week, or day views or navigate to different dates.

## Screenshots

*To be added: Include screenshots of the list view, calendar view, and event details modal for visual reference.*

## Future Enhancements

- **Event Editing**: Add functionality to edit Tournaments via a pre-filled form.
- **Delete from Modal**: Enable event deletion directly from the event details modal.
- **User Authentication**: Restrict access to authorized users.
- **Drag-and-Drop**: Allow rescheduling Tournaments by dragging them on the calendar.
- **Event Categories**: Add tags or categories to organize Tournaments.

## Contributing

Contributions are welcome! To contribute:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature`).
3. Make your changes and commit (`git commit -m "Add your feature"`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Open a pull request.

## License

This project is licensed under the [MIT License](LICENSE).