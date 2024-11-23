Minimum Requirements

Deadline: 2024.11.26, 23:59

The application must be implemented using the Laravel 11 framework and an SQLite database.
Proper use of the ORM is required. The database backend used during development does not matter as long as it's compatible with SQLite, which will be used for testing and evaluation.
Submit a single .zip archive.
The archive MUST NOT include the vendor and node_modules folders maintained by package managers, nor the .git, .idea, or .vscode folders.
The application must be deployable using the following initialization files (and no others):

init.sh:
    composer install --no-interaction --quiet
    {
        echo 'APP_NAME="Laravel beadandó"'
        echo 'APP_ENV=local'
        echo 'APP_KEY='
        echo 'APP_DEBUG=true'
        echo 'APP_URL=http://localhost'
        echo ''
        echo 'DB_CONNECTION=sqlite'
    } > .env
    php artisan key:generate
    npm install --silent
    npm run dev -- build
    touch database/database.sqlite
    php artisan migrate:fresh --seed
    mkdir ./storage/app/public
    php artisan storage:link
    php artisan serve


Every implemented feature must be accessible from the frontend.
The application must not throw critical errors during initialization or basic usage! If the submission cannot be initialized using the provided scripts or if a typical user can trigger critical errors, the assignment will be ungradable.

Always use Laravel's built-in validation. Using only client-side validation will result in point deductions.
Forms must be stateful, meaning that if an error occurs, the user-provided data must be repopulated, and accurate error messages should be displayed.
For edit forms, populate the form with existing data.
Always handle errors clearly for the user. If your code "crashes" or freezes, it may result in a significant point deduction, or the assignment may be rejected.
Proper access control is required for backend endpoints, not just frontend endpoints.
The frontend technology is freely selectable but should not be overly complex, as it does not earn extra points. Using the technology learned in class is recommended but not mandatory. The frontend does not need to be visually appealing, only usable.
Evaluation Criteria
A total of 50 points is available, of which at least 40% (20 points) must be achieved to pass the assignment. Partial points can be earned for partial solutions.

Submissions that do not meet ALL minimum requirements will not be graded!
Commented-out or unused code will not earn points even if correct.
The application, apart from the database, will primarily (but not exclusively) be evaluated based on functionality. Therefore, every function must be reasonably accessible from the frontend.

Assignment (50 points)
Create a simple access control system for an organization's administration and supervision.
Using the Laravel Breeze package for setting up the frontend and authentication is recommended but not mandatory.

Checklist
For faster and easier verification, mark completed tasks with an "X." Include this in your README.md file.
[X] Database and Models (3 points)  
[X] Seeder (3 points)  
[X] Homepage (1 point)  
[X] List Employees (2 points)  
[X] Create New Employee (3 points)  
[X] Edit Employee (3 points)  
[X] Delete Employee (1 point)  
[X] Employee Entry History (2 points)  
[X] List Job Positions (2 points)  
[X] Create Job Position (2 points)  
[X] Edit Job Position (2 points)  
[X] Delete Job Position (1 point)  
[X] Employees per Job Position (2 points)  
[X] List Rooms (2 points)  
[X] Create Room (3 points)  
[X] Edit Room (3 points)  
[X] Delete Room (1 point)  
[X] Room Entry History (2 points)  
[X] My Access Rights - Where Can I Enter (2 points)  
[X] My Entry History (2 points)  

Details:

Database (3 points)
Create the appropriate database tables and models as specified below (basic fields like id, created_at, updated_at should be included in every table):
    Models:
    User - This is the default Laravel table, representing employees in this task.
        admin [boolean] - whether the user is an administrator (default: false)
        phone_number [string] - the employee's phone number
        card_number [string] - a 16-character long card number containing characters 0-9, a-z, A-Z
    Position - Represents job roles within the company.
        name [string] - the name of the position, cannot be empty, and each position must have a unique name.
    Room - Represents rooms (with card-reader doors) where access control is required via card readers.
        name [string] - the name of the room, must be at least 5 characters long
        description [string] - description of the room, optional, up to 255 characters
        image of the room
    UserRoomEntry - Represents an employee's entry into a room.
        successful [boolean] - whether the entry was successful

    Relationships:
    Position 1 : N User One employee can have one position, and multiple employees can share the same position.
    Position N : N Room One position can grant access to multiple rooms, and access to one room can be granted to multiple positions.
    User 1 : N UserRoomEntry A user can enter and exit a room multiple times.
    Room 1 : N UserRoomEntry A room can have multiple entries and exits.

Seeder (3 points) Create a seeder to populate the database!
    Ensure that the seeder:
        Handles relationships properly, meaning that all connections are taken into account, and
        Generates consistent data, such that entries in the database are valid, e.g., only users with access rights can enter specific rooms.
        Additional requirements:
            Use generated data (e.g., using Faker) rather than hardcoded values.
            You don't need to generate a large amount of data—just enough for testing purposes (e.g., 10 users, 5 rooms, 4 roles, around 5 entries per room, with both successful and unsuccessful entries).

Homepage (1 point)
    On the homepage, display a brief description of the program, along with the following statistics:
    Number of rooms created
    Number of employees managed
    Employees

List Employees (2 points)
    After logging in, automatically redirect the user to the employee list. This list should be accessible to all logged-in users. Display a table with the employee's name, job role, and phone number. Admins should also be able to navigate to edit, delete, and view entries for each employee from the table, as well as have a button to create a new employee.

Create Employee (3 points)
    Display a form where an admin can create a new employee, including selecting a job role. After submission, perform the necessary validations as specified in the Models section. This feature should only be available to admins.

Edit Employee (3 points)
    Display a form where an admin can modify an employee's details and job role. After submission, perform the necessary validations as specified in the Models section. This feature should only be available to admins.

Delete Employee (1 point)
    Provide the ability to delete an employee. This action should only be accessible to admins.

Employee Entry History (2 points)
    Admins should be able to view an employee's entry history, displaying a table with the dates (to the second), room name, and whether the entry was successful or not. The table should be sorted by date, with the most recent entries at the top, and should support pagination.

Job Roles
    List Job Roles (1 point)
    Create a page accessible from the navigation menu that lists all job roles. This list should be accessible to all logged-in users. Display a table showing the job role name, the number of employees in that role, and the rooms that the role grants access to. Admins should be able to edit, delete, or create new job roles from this table. All users should be able to view the list of employees assigned to each role.

Create Job Role (2 points)
    Display a form where an admin can create a new job role. Only the creation of the role itself is required, not assigning rooms to it. After submission, perform the necessary validations as specified in the Models section. This feature should only be available to admins.

Edit Job Role (2 points)
    Display a form where an admin can edit an existing job role (again, without assigning rooms). After submission, perform the necessary validations as specified in the Models section. This feature should only be available to admins.

Delete Job Role (1 point)
    Provide the ability to delete a job role. This action should only be accessible to admins.

List Employees in Job Role (2 points)
    Provide the ability to view a list of employees assigned to a specific job role. Display a table with the employee's name and phone number. This list should be accessible to any logged-in user.

Rooms
List Rooms (2 points)
    Create a page accessible from the navigation menu that lists all rooms. This list should be accessible to all logged-in users. Display a table showing the room name and the job roles that have access to it. Admins should be able to edit, delete, view entries, and create new rooms from this table.

Create Room (3 points)
    Display a form where an admin can create a new room. An image must be uploaded. Allow selecting which job roles have access. After submission, perform the necessary validations as specified in the Models section.

Edit Room (3 points)
    Only admins can access this! Display a form where an admin can edit the room's details, image, and access permissions. Uploading a new image is optional. If a new image is not uploaded, the old image should remain. If a new image is uploaded, replace the old one and delete the previous image.

Delete Room (1 point)
    Provide the ability to delete a room. This action should only be accessible to admins. Delete the associated image as well.

Room Entry History (2 points)
    Admins should be able to view the entry history for each room, displaying a table with dates (to the second), user name, user phone number, user job role, and whether the entry was successful. The table should be sorted by date, with the most recent entries at the top, and support pagination.

Additional Features
    Entry Simulation Feature (4 points)
    Create a simulation page where users can test if an employee can enter a card-protected room. Display a form where you can select a room and an employee (only employees with a filled card number should appear). After submitting, validate the data on the server side to determine if the employee's role allows them to enter the room. Display a success message if allowed, or an error message otherwise. In both cases, create a new UserRoomEntry with the appropriate successful status.

My Permissions - Where Can I Enter? (2 points)
    Every logged-in employee should have access to a "My Permissions" page, showing their job role and a table of rooms they can access, including the room's image and a short description.

My Entry Logs (2 points)
    Every logged-in employee should have access to a "My Entry Logs" page, showing a table with their entry attempts, including dates (to the second), room names, and whether the attempt was successful. The table should be sorted by date, with the most recent entries at the top, and support pagination.
