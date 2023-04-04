Automated Incident Management System

This is a web application that allows users to view Jira boards and Grafana dashboards. Admin users can manage users and Jira boards.

Getting Started
Prerequisites
PHP 7.4 or later
MySQL 5.7 or later
Jira server or cloud instance
Grafana server

Installation

Clone the repository:
git clone https://github.com/<username>/<repository>.git
Create a MySQL database and import the schema from sql/schema.sql.

Create an admin user with the following credentials:

email: ajith4uuu@gmail.com
password: Creative#123

Edit db.php with your MySQL database credentials:
$db_host = 'localhost';
$db_username = 'your_username';
$db_password = 'your_password';
$db_name = 'your_database_name';

Edit jira_api.php with your Jira server or cloud instance URL and credentials:
$jira_url = 'https://your_jira_url.com';
$jira_username = 'your_jira_username';
$jira_password = 'your_jira_password';

Edit grafana_api.php with your Grafana server URL and credentials:
$grafana_url = 'https://your_grafana_url.com';
$grafana_api_key = 'your_grafana_api_key';

Start a PHP development server:
php -S localhost:8000
Access the application at http://localhost:8000.

Usage
Login
Visit login.php to log in with your email and password.
Admin Dashboard
Visit admin/dashboard.php to view a list of Jira boards and Grafana dashboards.
Click on a board or dashboard to view it.
Click on the "Users" link in the top navigation bar to manage users.
Enter a new user's email, password, and role to create a new user.
User Dashboard
Visit user_panel.php to view a list of Jira boards and Grafana dashboards.
Click on a board or dashboard to view it.
Built With
PHP
MySQL
Jira REST API
Grafana API
License
This project is licensed under the MIT License - see the LICENSE file for details.