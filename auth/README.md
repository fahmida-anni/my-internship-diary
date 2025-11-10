My Website Template

A responsive website template built using:

HTML5, CSS3, JavaScript, Bootstrap 5

PHP for backend

MySQL database (via XAMPP / phpMyAdmin)

✨ Features

Fully responsive layout

Reusable folder structure

Contact form connected to MySQL

User authentication system:

User registration (username, email, address, password)

Login with email and password

Forgot password with email verification code

Reset password after code verification

Dashboard for logged-in users

Logout

Admin panel to manage users

Works on desktop, tablet, and mobile

⚙️ Tools Used

Visual Studio Code

XAMPP (Apache + MySQL)

phpMyAdmin

Git & GitHub

📂 Updated Folder Structure

my-website-template/
│
├── index.php                  # Main landing page with navbar, hero, about, services, contact
├── dashboard.php              # User dashboard page
├── auth/                      # Authentication folder
│   ├── register.php           # User registration
│   ├── login.php              # User login
│   ├── logout.php             # Logout script
│   ├── forgot_password.php    # Send verification code to email
│   ├── verify_code.php        # Verify code received by email
│   └── reset_password.php     # Reset password after code verification
├── admin/                     # Admin panel
│   ├── index.php              # Admin home
│   ├── users.php              # View and manage users
│   ├── delete_user.php        # Delete user script
│   └── style.css              # Admin specific styles
├── css/
│   └── style.css               # Global styles for project
├── js/
│   └── script.js               # Global JS (form handling, alerts, fade effects)
├── submit_contact.php          # Contact form submission to MySQL
├── config.php                  # Database connection
└── assets/
    ├── images/
    │   ├── hero-bg.jpg
    │   └── sample.jpg
    └── icons/                  # Additional icons (SVG/PNG)


✅ Notes

Authentication Integration: Navbar dynamically shows login/register links or user name with logout depending on session state.

Forgot Password: Sends a 6-digit verification code to the registered email, valid for 10 minutes.

Dashboard: Accessible only for logged-in users.

Email Sending: Integrated using PHPMailer (requires Gmail App Password for localhost).

Alerts & Transitions: All notifications (success/error) fade after 4 seconds, consistent with project style.