# Project_2
IT involves a project related to the technologies with HTML, CSS, PHP


---

**Project Summary: User Registration System**

This project is a user registration system implemented using PHP, Bootstrap, HTML, and CSS. It provides a simple yet efficient way to register new users on a website or platform. The system allows users to create accounts by providing necessary information such as username, email address, password, etc. Key features of the user registration system include:

- **Registration Form**: Users can fill out a registration form with required details.
- **Validation**: Client-side and server-side validation ensure that the entered information is accurate and meets specified criteria.
- **Password Encryption**: User passwords are encrypted using secure hashing techniques to enhance security.
- **Database Integration**: User data is stored securely in a database, enabling retrieval and management of user accounts.
- **Login Functionality**: Registered users can log in securely to access their accounts and perform various actions.
- **Responsive Design**: The system's interface is designed using Bootstrap, ensuring responsiveness across different devices and screen sizes.

This user registration system serves as a foundation for building secure and scalable web applications that require user authentication and management functionalities.

---

The `login.php` file manages user login for a web application. It initiates a session, checks if a user is already logged in, and if so, redirects them to a welcome page. It includes a configuration file for database connection, validates form inputs, and performs a database query to verify the user's credentials. If the credentials are valid, it starts a session, stores user data, and redirects to the welcome page; otherwise, it displays an error message. The file also includes an HTML structure for the login form, styled with Bootstrap.

The `logout.php` file manages the process of logging out a user from the web application. It starts a session, clears all session variables, destroys the session, and finally redirects the user to the login page. This ensures that all user data is cleared from the session, effectively logging the user out.

The `register.php` file is responsible for handling new user registrations. It includes the database configuration, initializes variables, and processes the registration form data when submitted. It checks for empty fields, password length, and whether the username is already taken by querying the database. If there are no errors, it inserts the new user data into the database, hashes the password for security, and then redirects the user to the login page. The file also contains HTML code for displaying the registration form, styled with Bootstrap.

The `welcome.php` file is a simple user welcome page that displays after successful login. It starts a session to check if the user is logged in and redirects to the login page if not. The page includes a navigation bar with options like Home, Register, Login, and Logout. It greets the user with a welcome message that includes their username, indicating successful session management and personalization based on user login data. The page uses Bootstrap for styling.
