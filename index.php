<?php
session_start();
include('session.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Welcome, " . $_SESSION['username'];?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&amp;display=swap">
    <link rel="stylesheet" href="./login.css">
</head>
<body>

<section class="loginContainer">
    <div class="loginForm">
      <div class="loginField center">
      <h2><?php echo "Welcome, " . $_SESSION['username'];?></h2>
      </div>

      <div class="loginField center">
        <h5>Don't use this window for 10 seconds.</h5>
      <h4 ><span id="countdown"></span>
      </h4>
      </div>

      <div class="loginField center">
        <a href="./logout.php" class="button">Logout</a>
      </div>
      
    </form>
  </section>

<script>
let timeout = <?php echo $timeout; ?>;
let countdown = timeout;
let idleTime = 0;
let pageTitle=document.title;

function updateCountdown() {
    if (idleTime >= 10) {
        countdown--;
        if (countdown <= 0) {
            window.location.href = 'logout.php';
        }
        let minutes = Math.floor(countdown / 60);
        let seconds = countdown % 60;
        if (seconds < 10) {
            seconds = '0' + seconds;
        }
        document.getElementById('countdown').innerText ="Automatic logout in => "+ minutes + ":" + seconds;
        document.title=`Automatic Logout in=> ${minutes} : ${seconds}`;
    } else {
        idleTime++;
    }
}

function resetCountdown() {
    countdown = timeout;
    idleTime = 0;
    document.getElementById('countdown').innerText ="";
    document.title=pageTitle;
}

setInterval(updateCountdown, 1000);

// Reset the countdown on user interaction
document.addEventListener('mousemove', resetCountdown);
document.addEventListener('keypress', resetCountdown);
</script>


</body>
</html>