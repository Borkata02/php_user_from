Task 6 of my internship in MEGAPARTS. Requirements:

Create a PHP web application that includes user registration, login functionality, profile management, and various bonus tasks to enhance security and user experience.


Part 1: Database Connection with PDO

1. Set up a MySQL database with a table to store user information (e.g., id, username, email, password, phone).

2. Implement a PDO connection to the database to ensure secure data handling.


Part 2: User Registration

1. Create a registration form with fields for username, email, phone, and password.

2. Implement client-side validation for the registration form using JavaScript.

3. Hash and securely store the password in the database using password hashing techniques.

4. Upon successful registration, display a success message and provide a link to the login page.


Part 3: User Login and Profile Page

1. Design a login form with fields for email and password.

2. Implement client-side validation for the login form.

3. Upon successful login, set up a session to maintain user authentication.

4. Create a profile page where users can view and update their information (name, email, password, phone).


Bonus Tasks:


1. Password Hashing and Encryption: Hash passwords using secure password hashing algorithms (e.g., bcrypt).

2. Error Handling and Messaging: Implement clear error messages for failed login attempts and registration errors.

3. Password Change: Allow users to change their password on the profile page, following similar validation and hashing procedures.

4. SQL Injection Prevention: Use prepared statements with PDO to prevent SQL injection attacks.

5. Password Reset: Implement a password reset functionality.

6. Input Sanitization: Sanitize user inputs to prevent XSS (Cross-Site Scripting) attacks.


Ensure your code is well-structured, follows best practices, and is properly commented. Provide clear setup instructions for the database connection and any necessary configuration. This project will give you hands-on experience with PHP, PDO, user authentication, password hashing, form validation, and security considerations in web development.