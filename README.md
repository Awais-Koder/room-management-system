```markdown
# Role-Based Employee Access Management System

## Project Overview

This application is a role-based access control system designed to manage employees' access to card-protected rooms within a facility. It provides a robust and user-friendly interface for administrators to assign access rights based on employee roles and card status. The system ensures that only authorized employees can access restricted areas by validating their roles and active card details.

---

## Key Features

### 1. **Employee Management**
- Admins can manage employee details, including:
  - Names
  - Emails
  - Card numbers (required for access to card-protected rooms).
- Employees without a card number cannot access card-protected rooms.

### 2. **Room Management**
- Admins can manage rooms and their associated permissions.
- Each room has unique access rights defined by the roles (assigned through positions) of the employees.

### 3. **Card-Entry Validation**
- Includes a simulation page where users can:
  - Select a room and an employee.
  - Test if the employee is allowed to access the room based on their card and role.
- Displays real-time feedback on whether the employee has access.

### 4. **Access Logging**
- Every access attempt is logged, including:
  - Employee details
  - Room details
  - Access status (successful or denied).
- Logs are stored in a `UserRoomEntry` table for auditing.

### 5. **Role-Based Access Control**
- Supports role-based permissions:
  - **Admin**: Full access to manage employees and rooms.
  - **Regular Users**: Limited or no access based on their role.
- Ensures route and button visibility based on the user's role.

### 6. **Real-Time Feedback**
- Dynamic success and error messages are displayed after submitting an access request.

---

## Technologies Used

- **Backend:** Laravel (PHP Framework)
- **Database:** SQLite
  - With migrations and relationships including `User`, `Room`, `Position`, and `UserRoomEntry`.
- **Frontend:** 
  - Blade (Laravel templating engine)
  - Bootstrap (for styling)
- **Authentication:**
  - Built-in Laravel authentication system for managing user roles and access.

---

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/your-repo/employee-access-management.git
   ```
2. Navigate to the project directory:
   ```bash
   cd employee-access-management
   ```
3. Install dependencies:
   ```bash
   composer install
   npm install && npm run dev
   ```
4. Configure environment variables:
   - Rename `.env.example` to `.env`.
   - Update the following variables in `.env`:
     ```env
     DB_CONNECTION=sqlite
     DB_DATABASE=/absolute/path/to/database.sqlite
     SESSION_DRIVER=database
     ```
5. Set up the database:
   - Create the SQLite database file:
     ```bash
     touch database/database.sqlite
     ```
   - Run migrations and seeders:
     ```bash
     php artisan migrate --seed
     ```
6. Start the development server:
   ```bash
   php artisan serve
   ```

---

## Usage Instructions

1. Log in as an admin to manage employees and rooms.
2. Navigate to the simulation page to test employee access to specific rooms.
3. View the access logs for a history of room entry attempts.

---

## Contributing

1. Fork the repository.
2. Create a new feature branch:
   ```bash
   git checkout -b feature/your-feature
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add your feature"
   ```
4. Push to the branch:
   ```bash
   git push origin feature/your-feature
   ```
5. Open a pull request.

---

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
```
