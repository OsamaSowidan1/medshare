<?php
session_start();
require_once "config.php";
if (isset($_SESSION['user_id']) != "") {
header("Location: dashboard.php");
}
if (isset($_POST['login'])) {
$email    = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$email_error = "Please Enter Valid Email ID";
}
if (strlen($password) < 6) {
$password_error = "Password must be minimum of 6 characters";
}

$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email . "' and password = '" . md5($password) . "'");
if ($row = mysqli_fetch_array($result)) {
$_SESSION['user_id']     = $row['user_id'];
$_SESSION['username']   = $row['username'];
$_SESSION['user_mobile'] = $row['phone'];
$_SESSION['user_email']  = $row['email'];
echo"seccusssss";
header("Location: home.php");
} else {
$error_message = "Incorrect Email or Password!!!";
}
}
?>

<!DOCTYPE html>
<html dir='rtl'>
  <head>
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="css\registration.css">  </head>
  <body>
    <div class="container">
      <h1>تسجيل الدخول</h1>
      <form action="home.php" method="POST">
        <label for="username">الاسم</label>
        <input type="text" id="username" name="email" required>
        <label for="password">كلمه المرور</label>
        <input type="password" id="password" name="password" required>
        <div class="forgot-password">
          <a href="#">نسيت كلمه المرور</a>
        </div>
        <br>
        <input type="submit" value="سجل" name="login">
        <div class="register-link">
          <a href="reg.php">هل لا تمتلك حساب بالفعل؟ سجل من هنا</a>
        </div>
      </form>
    </div>
  </body>
</html>
