<?php

//default registered email =====> a@gmail.com;
//default registered email =====> Ay@123456;
//default registered user naem =====> ahmad rahhal;
session_start();
// $error = [];
// $error[] = array_diff($error, $error);
$DEFAULT_EMAIL = "a@gmail.com";
$DEFAULT_PASSWORD = "Ay@123456";
$DEFAULT_USERNAME = "ahmad rahhal";



?>


<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=100%, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title>Document</title>
  <style></style>
</head>

<?php

$email = $password = '';


if (isset($_POST['login'])) {
  if (trim($_POST['email']) == $DEFAULT_EMAIL) {
    if (trim($_POST['password']) == $DEFAULT_PASSWORD) {
      $_SESSION['email'] = trim($_POST['email']);
      $_SESSION['username'] = $DEFAULT_USERNAME;
      header("Location: home.php");

    } else {
      $error[] = "كلمة المرور والحساب غير متطابقين";
    }

  } else {
    $error[] = "الايميل غير مسجل";
  }
}

?>

<body dir="rtl">
  <main>
    <div class="container">
      <form action="" method="POST">
        <h3>تسجيل الدخول</h3>


        <?php
        if (isset($error)) {
          foreach ($error as $error) {
            echo '<span class="error-msg">' . $error . '</span>';
          }
        }
        ?>

        <input type="email" name="email" required placeholder="أدخل بريدك الالكتروني" value="<?php if (isset($_POST['email'])) {
          echo $_POST['email'];
        } ?>" />
        <input type="password" name="password" required placeholder="أدخل كلمة السر" />



        <input type="submit" name="login" value="تسجيل الدخول" class="form-btn" />
        <p> ليس لديك حساب؟<a href="register_form.php"> أنشئ حساب</a></p>
      </form>
    </div>
  </main>
</body>

</html>