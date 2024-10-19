<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "user_system");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if username already exists
    $result = $mysqli->query("SELECT * FROM users WHERE username='$username'");

    if ($result->num_rows > 0) {
        
        $_SESSION['errorDuplicate']= "Username already exists. Please choose another.";
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($mysqli->query($sql) === TRUE) {
            $_SESSION['success']= "Account Creation Successful";
            header("Location:./login.php");
        } else {
            
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&amp;display=swap">
    <link rel="stylesheet" href="./login.css">
</head>
<body>

    <section class="loginContainer">
    <form class="loginForm" action="./register.php" method="POST">
      <h2>Sign Up</h2>
      
      <?php
            if(isset($_SESSION['errorDuplicate']))
            {
                ?><div class="loginField error"><?php echo $_SESSION['errorDuplicate'];?></div>
                <?php
                unset($_SESSION['errorDuplicate']);
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
        <input type="submit" name="register" id="Login" value="Sign Up" class="formSubmit" />
      </div>
      <span class="divider"></span>
      <p class="center">Already registered! <a href="./login.php">Login Now.</a> </p>
    </form>
  </section>
</body>
</html>
