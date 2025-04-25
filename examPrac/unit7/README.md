Below is a detailed yet simplified explanation of **Unit 7: Cookies, Sessions, and Authentication (3 Hrs.)** in PHP, tailored for your BIT 5th semester board exam preparation for the subject WT-2 (Web Technology 2). The content is structured as a README.md file, formatted in Markdown, with clear definitions, easy-to-understand explanations, and practical code examples for Using Cookies in PHP, HTTP Authentication, and Using Sessions. This note is designed to be beginner-friendly, concise, and savable for further study, ensuring you grasp these concepts for your exam. The examples are straightforward and exam-focused, making it easy to follow and implement.

# PHP Cookies, Sessions, and Authentication: Unit 7 Notes for BIT 5th Semester (WT-2)

This document provides simplified notes on **Unit 7: Cookies, Sessions, and Authentication (3 Hrs.)** for the Web Technology 2 (WT-2) syllabus. It covers Using Cookies in PHP, HTTP Authentication, and Using Sessions, with clear definitions, easy explanations, and practical examples. The content is designed to help you prepare for your board exam and understand these concepts quickly.

## 1. Using Cookies in PHP

### Definition

**Cookies** are small text files stored on the user’s browser by a website to remember information, such as user preferences or login status. In PHP, cookies are managed using the `setcookie()` function to create or update cookies and the `$_COOKIE` superglobal to retrieve them.

### Key Points

- **Purpose**: Store small amounts of data (e.g., username, theme preference) for later use.
- **Lifetime**: Cookies can expire after a set time or when the browser closes.
- **Security**: Cookies are stored client-side, so avoid sensitive data unless encrypted.

### Functions

- `setcookie(name, value, expire, path, domain, secure, httponly)`: Sets a cookie.
- `$_COOKIE['name']`: Retrieves a cookie’s value.
- `isset($_COOKIE['name'])`: Checks if a cookie exists.

### Example: Setting and Retrieving a Cookie

```php
<?php
// set_cookie.php
// Set a cookie that expires in 1 hour
$cookieName = "username";
$cookieValue = "Alice";
$expire = time() + 3600; // 1 hour from now
setcookie($cookieName, $cookieValue, $expire, "/");

// Check if cookie exists and display it
if (isset($_COOKIE[$cookieName])) {
    echo "Welcome back, " . htmlspecialchars($_COOKIE[$cookieName]) . "!";
} else {
    echo "No username cookie found.";
}
?>
```

### Explanation

- **Setting Cookie**: `setcookie()` creates a cookie named `username` with value `Alice`, expiring in 1 hour (`time() + 3600`). The `"/"` path makes it accessible site-wide.
- **Retrieving Cookie**: `$_COOKIE['username']` gets the cookie value, checked with `isset()` to avoid errors.
- **Security**: `htmlspecialchars()` prevents XSS attacks when displaying the cookie value.
- **Note**: Cookies are available in `$_COOKIE` only after the page reloads, as they are sent in the next HTTP request.

## 2. HTTP Authentication

### Definition

**HTTP Authentication** is a method to restrict access to a webpage by requiring users to provide a username and password, typically via a browser pop-up. In PHP, it’s implemented using HTTP headers to prompt for credentials and verify them.

### Key Points

- **Mechanism**: Uses HTTP headers (`WWW-Authenticate`) to trigger a browser login prompt.
- **PHP Variables**: `$_SERVER['PHP_AUTH_USER']` and `$_SERVER['PHP_AUTH_PW']` hold the entered username and password.
- **Use Case**: Simple access control for admin pages or restricted areas.

### Example: Basic HTTP Authentication

```php
<?php
// auth.php
$validUser = "admin";
$validPass = "secret123";

if (!isset($_SERVER['PHP_AUTH_USER']) ||
    $_SERVER['PHP_AUTH_USER'] !== $validUser ||
    $_SERVER['PHP_AUTH_PW'] !== $validPass) {
    // Send authentication headers
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Access denied. Please enter valid credentials.";
    exit;
} else {
    echo "Welcome, {$_SERVER['PHP_AUTH_USER']}! You have access to the restricted area.";
}
?>
```

### Explanation

- **Check Credentials**: Verifies if `PHP_AUTH_USER` and `PHP_AUTH_PW` are set and match the valid username (`admin`) and password (`secret123`).
- **Prompt Login**: If credentials are missing or incorrect, `WWW-Authenticate` header triggers a browser login pop-up, and `401 Unauthorized` sets the status.
- **Access Granted**: If credentials match, a welcome message is displayed.
- **Note**: Hardcoding credentials is for demonstration; in practice, store them securely (e.g., in a database) and hash passwords.

## 3. Using Sessions

### Definition

**Sessions** allow you to store user data on the server across multiple page requests, unlike cookies, which are client-side. In PHP, sessions are managed using `session_start()` to initialize a session and the `$_SESSION` superglobal to store and retrieve data.

### Key Points

- **Purpose**: Track user data (e.g., login status, cart items) during a visit.
- **Storage**: Data is stored on the server, with a session ID stored in a cookie on the client.
- **Security**: Sessions are more secure than cookies for sensitive data.

### Functions

- `session_start()`: Starts or resumes a session.
- `$_SESSION['key']`: Stores or retrieves session data.
- `session_destroy()`: Ends the session and clears data.
- `unset($_SESSION['key'])`: Removes a specific session variable.

### Example: Login System with Sessions

#### login.php (Login Form)

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login</title>
  </head>
  <body>
    <h2>Login</h2>
    <form action="process_login.php" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required /><br /><br />
      <label for="password">Password:</label>
      <input
        type="password"
        id="password"
        name="password"
        required
      /><br /><br />
      <input type="submit" value="Login" />
    </form>
  </body>
</html>
```

#### process_login.php (Handle Login)

```php
<?php
// process_login.php
session_start();

// Simulated valid credentials (in practice, use a database)
$validUser = "user1";
$validPass = "pass123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($username === $validUser && $password === $validPass) {
        // Store user data in session
        $_SESSION["username"] = $username;
        $_SESSION["logged_in"] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid username or password. <a href='login.php'>Try again</a>.";
    }
} else {
    echo "Invalid request.";
}
?>
```

#### dashboard.php (Protected Page)

```php
<?php
// dashboard.php
session_start();

// Check if user is logged in
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

echo "Welcome, " . htmlspecialchars($_SESSION["username"]) . "!<br>";
echo "<a href='logout.php'>Logout</a>";
?>
```

#### logout.php (End Session)

```php
<?php
// logout.php
session_start();
session_destroy();
header("Location: login.php");
exit;
?>
```

### Explanation

- **Login Form**: Collects username and password, submits to `process_login.php`.
- **Process Login**:
  - Starts a session with `session_start()`.
  - Verifies credentials (simulated here; use a database in practice).
  - Stores `username` and `logged_in` in `$_SESSION` if valid, then redirects to `dashboard.php`.
- **Dashboard**:
  - Checks if the user is logged in using `$_SESSION["logged_in"]`.
  - Displays a welcome message and logout link if authenticated, otherwise redirects to `login.php`.
- **Logout**: Destroys the session with `session_destroy()` and redirects to `login.php`.
- **Security**: Uses `htmlspecialchars()` for output and `exit` after redirects to prevent further execution.

## Key Points for Board Exam

- **Cookies**:
  - Use `setcookie()` to create cookies and `$_COOKIE` to retrieve them.
  - Set expiration time and path for accessibility.
  - Sanitize cookie data when displaying.
- **HTTP Authentication**:
  - Use `WWW-Authenticate` and `401` headers to prompt for credentials.
  - Check `PHP_AUTH_USER` and `PHP_AUTH_PW` for verification.
  - Suitable for simple access control.
- **Sessions**:
  - Start with `session_start()` on every page using sessions.
  - Store data in `$_SESSION` for server-side persistence.
  - Use `session_destroy()` to end sessions securely.
  - Protect pages by checking session variables.

## Tips for Study

- **Practice**:
  - Test the cookie example in a browser and check cookies in developer tools (F12 → Application → Cookies).
  - Run the HTTP authentication script and observe the browser’s login pop-up.
  - Set up the session-based login system in XAMPP and test login/logout functionality.
- **Debugging**:
  - Use `var_dump($_COOKIE)` or `var_dump($_SESSION)` to inspect data.
  - Check `$_SERVER` for authentication variables.
- **Security**:
  - Never store sensitive data in cookies without encryption.
  - Hash passwords (e.g., with `password_hash()`) in a real application.
  - Always call `session_start()` before any output.
- **Visualization**:
  - **Cookies**: Diagram showing browser storing cookie and PHP retrieving it.
  - **HTTP Authentication**: Flowchart of header prompt → user input → PHP verification.
  - **Sessions**: Diagram of session ID in cookie, server-side `$_SESSION` storage, and page protection.
  - On Canva, create a study infographic:
    - **Slide 1**: Overview of Unit 7 with icons for cookies, authentication, and sessions.
    - **Slide 2**: Cookie lifecycle (set → store → retrieve).
    - **Slide 3**: HTTP authentication flow with a mock login pop-up.
    - **Slide 4**: Session-based login system with code snippets and arrows showing redirects.
    - Use Canva’s code block templates or text boxes for key code (e.g., `setcookie()`, `session_start()`).

## Additional Notes

- **Cookie Limitations**: Cookies are limited to 4KB and can be modified by users, so validate cookie data server-side.
- **Session Security**: Use `session_regenerate_id()` after login to prevent session fixation attacks.
- **Real-World Authentication**: Replace hardcoded credentials with a database and use password hashing (`password_hash()`, `password_verify()`).
- **Testing Environment**: Use XAMPP to test these scripts locally. Ensure `session.save_path` is writable in `php.ini`.

---

**Save this README.md** to your study folder for quick reference. View it in Visual Studio Code, GitHub, or a Markdown viewer. Test the code in a PHP environment like XAMPP to see cookies, authentication prompts, and session-based logins in action. For Canva, use the content to create visual aids like flowcharts or code screenshots to reinforce learning. Practice these examples hands-on to master Unit 7 for your board exam. Good luck with your preparation!
