# FusionFit360: A Comprehensive Fitness Portal

FusionFit360 is a fitness management platform designed to help users maintain their health and wellness by providing a range of services, including gym memberships, yoga classes, and personalized diet plans. The project combines a user-centric approach with robust backend functionality, offering a seamless experience for both users and administrators.

## Features

### User Module

- **Profile Management**: Users can create and customize profiles based on their fitness needs.
- **Department Selection**: Choose services from Gym, Yoga, or Diet departments.
- **Membership Management**: Sign up for memberships and access trial offers.
- **Secure Payment System**: Integrated for hassle-free transactions.

### Admin Module

- **User Management**: Admin can manage user accounts and their memberships.
- **Department Management**: Update fees, manage facilities, and oversee staff.
- **Staff Management**: Add, update, and remove staff information.

### Additional Features

- **Secure Authentication**: Passwords are stored as hashed values.
- **Dynamic Visuals**: Animated logo and rotating homepage backgrounds.
- **Session Handling**: Restricts unauthorized access to protected pages.

## Technology Stack

### Frontend

- HTML, CSS, JavaScript
- Bootstrap for responsive design

### Backend

- JavaScript
- PHP for server-side scripting

### Database

- MySQL with six well-defined relational tables.

## Database Overview

- **Customer**: Stores user information.
- **Department**: Includes Gym, Yoga, and Diet departments with their respective fees.
- **Staff**: Information about staff members assigned to departments.
- **Facilities**: Details of services provided by each department.
- **Membership**: Tracks user memberships.
- **Admin**: Manages system operations.

## Installation and Usage

1. Clone the repository:
   
   git clone https://github.com/prathamdoiphode/FusionFit360


 2. Set up the database using the provided SQL schema.

 3. Configure the database connection in the project settings (config.php).

 4. Host the project on a local server (e.g., XAMPP or WAMP).
 5. Access the application through http://localhost/fusionfit360.
## Future Work
- Real-time fitness tracking.
- Advanced data analytics.
- Mobile app integration for on-the-go fitness management.



