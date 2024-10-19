# PHP Session-Based Login System with Auto-Logout

## Overview

This project demonstrates a secure PHP session-based login system with an auto-logout feature. Users can register, log in, and will be automatically logged out after a period of inactivity. This enhances security by ensuring that unattended sessions do not remain open indefinitely.

## Screenshots

![Project Screenshot](https://github.com/iamvishveshs/iamvishveshs.github.io/blob/main/assets/png/automatic-logout-using-session-thumbnail.png?raw=true)
## Features

- **User Registration**: Secure signup with unique usernames and hashed passwords.
- **User Login**: Secure login system verifying user credentials.
- **Session Management**: Maintains user session across different pages.
- **Inactivity Timer**: Logs out users after 5 minutes of inactivity.
- **Countdown Timer**: Displays remaining session time, updating every second.
- **Manual Logout**: Users can manually log out at any time.

## Technologies Used

- PHP
- MySQL
- JavaScript
- HTML
- CSS

## Configure your database settings
- Open the PHP files (`register.php`, `login.php`, `session.php`) and configure your database settings. 
Example for register.php:

`$mysqli = new mysqli("localhost", "username", "password", "user_system");`


## Demo

[Click Here!](https://projects.thevshub.in/automatic-logout-using-session)


## How to use
#### Sign Up
- Access the signup page (**`register.php`**).
- Fill in the username and password fields.
- Submit the form to create a new account.
#### Log In
- Access the login page (**`login.php`**).
- Enter your registered username and password.
- Submit the form to log in.
#### Session Management
- After logging in, navigate through the website. The inactivity timer starts after **` 10 `** seconds of no user interaction.
- A countdown timer shows the remaining time before auto-logout.
- Auto-logout occurs after **` 60 `** seconds of inactivity.
- You can manually log out at any time using the logout link or button.
## Contributing
Contributions are welcome! Please open an issue or submit a pull request for any improvements or bug fixes.

## License
This project is licensed under the MIT License. See the LICENSE file for details.