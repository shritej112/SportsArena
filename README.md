# SportsArena

SportsArena is a web application designed to facilitate both the purchase of sporting accessories and the reservation of football turfs. The platform provides an intuitive interface for users to shop for equipment and book turfs seamlessly.

## Features

- **User Authentication**: Secure login and registration for both users and admins.
- **Product Management**: Add, edit, and manage sporting accessories.
- **Turf Booking**: Search for available slots and book turfs online.
- **Admin Dashboard**: Manage bookings, products, and view user activities.
- **Password Recovery**: Reset forgotten passwords via email.
- **Order Confirmation**: Email notifications for order confirmations and booking details.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Email Service**: PHPMailer for sending email notifications

## Project Structure

```
SportsArena/
├── css/                  # Stylesheets for the web application
├── PHPMailer/            # Email handling library
├── adminlogin.php       # Admin login functionality
├── adminpage.php        # Admin dashboard
├── booking_page.php     # Turf booking page
├── register.php         # User registration page
├── login.php            # User login page
├── logout.php           # User logout functionality
├── addproduct.php       # Add products to inventory
├── confirmationmail.php # Email confirmation logic
├── README.md            # Project documentation
├── details.json         # Sample data file
```

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/your-username/SportsArena.git
   ```
2. Set up the database:
   - Import the `details.json` or equivalent database schema into MySQL.
3. Configure PHPMailer:
   - Update the email configuration in `PHPMailer/class.phpmailer.php`.
4. Start the server:
   - Use XAMPP, WAMP, or any PHP-supported web server to host the project.

## Usage

1. Navigate to the home page to browse products or book a turf.
2. Register or log in to make bookings or purchases.
3. Admins can log in to the dashboard to manage users, products, and bookings.

## Screenshots

_Include screenshots here to showcase the interface and features._

## License

This project is licensed under the MIT License. See the LICENSE file for details.

## Contributing

Contributions are welcome! Please fork the repository and create a pull request for any features or bug fixes.