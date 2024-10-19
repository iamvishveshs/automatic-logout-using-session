<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "user_system");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $result = $mysqli->query("SELECT * FROM users WHERE username='$username'");

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            $_SESSION['error']= "Invalid username or password";
        }
    } else {
        $_SESSION['error']="Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&amp;display=swap">
    <link rel="stylesheet" href="./login.css">
</head>
<body>


    <section class="loginContainer">
    <form class="loginForm" action="./login.php" method="POST">
      <h2>Login</h2>
      <?php
      if(isset($_SESSION['error']))
      {
          ?><div class="loginField error"><?php echo $_SESSION['error'];?></div>
          <?php
          unset($_SESSION['error']);
      } 
      elseif(isset($_SESSION['success']))
            {
                ?><div class="loginField success"><?php echo $_SESSION['success'];?></div>
                <?php
                unset($_SESSION['success']);
            } 
            ?>
      <div class="loginField">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="formInput" required="required" />
      </div>

      <div class="loginField">
        <label for="password">Password</label>
        <input type="password" name="password" id="password"  class="formInput" required="required" />
      </div>

      <div class="loginField">
        <input type="submit" name="login" id="Login" value="Login" class="formSubmit" />
      </div>
      <span class="divider"></span>
      <p class="center">Don't have an account! <a href="./register.php">Create Now.</a> </p>
    </form>
  </section>
</body>
</html>